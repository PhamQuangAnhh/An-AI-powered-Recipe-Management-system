<?php
/**
 * Data Migration Script
 * 
 * Migrates existing recipe ingredients from comma-separated string
 * (recipeIngredients column) to normalized tables (ingredients + recipe_ingredients).
 * 
 * This script should be run ONCE after the database schema has been updated.
 * After successful migration, the recipeIngredients column can be dropped.
 * 
 * Usage: php migrate_ingredients.php
 */

require_once __DIR__ . '/includes/dbconnection.php';
require_once __DIR__ . '/includes/ai-helper.php';

echo "=== Ingredient Migration Script ===\n\n";

// Fetch all recipes that still have data in recipeIngredients
$result = mysqli_query($con, "SELECT id, recipeTitle, recipeIngredients FROM recipes WHERE recipeIngredients IS NOT NULL AND recipeIngredients != ''");

if (!$result) {
    die("Error querying recipes: " . mysqli_error($con) . "\n");
}

$totalRecipes = mysqli_num_rows($result);
echo "Found {$totalRecipes} recipes to migrate.\n\n";

if ($totalRecipes === 0) {
    echo "Nothing to migrate. All recipes already use the new structure.\n";
    exit(0);
}

$migratedCount = 0;
$failedCount = 0;

while ($row = mysqli_fetch_assoc($result)) {
    $recipeId = $row['id'];
    $title = $row['recipeTitle'];
    $rawIngredients = $row['recipeIngredients'];
    
    echo "Processing recipe #{$recipeId}: {$title}\n";
    
    // Split comma-separated ingredients
    $ingredients = array_filter(array_map('trim', explode(',', $rawIngredients)));
    
    if (empty($ingredients)) {
        echo "  ⚠ No ingredients found, skipping.\n\n";
        continue;
    }
    
    echo "  Found " . count($ingredients) . " ingredients\n";
    
    // Try AI processing
    echo "  Calling AI for normalization + calorie calculation...\n";
    $aiResult = processIngredients($ingredients);
    
    if ($aiResult !== false) {
        // AI success
        saveIngredientsToDb($con, $recipeId, $aiResult);
        echo "  ✅ Migrated with AI! Total calories: {$aiResult['totalCalories']}\n";
        foreach ($aiResult['ingredients'] as $ing) {
            echo "     - {$ing['original']} → {$ing['canonicalName']} ({$ing['quantityGrams']}{$ing['standardUnit']}, {$ing['caloriesPer100g']} cal/100g)\n";
        }
        $migratedCount++;
    } else {
        // AI failed — fallback: store ingredients as-is without normalization
        echo "  ⚠ AI unavailable, using fallback (no normalization)...\n";
        
        foreach ($ingredients as $item) {
            $item = trim($item);
            if (empty($item)) continue;
            
            $itemEscaped = mysqli_real_escape_string($con, $item);
            
            // Check if ingredient exists
            $checkResult = mysqli_query($con, "SELECT id FROM ingredients WHERE LOWER(name) = LOWER('{$itemEscaped}')");
            if ($checkResult && mysqli_num_rows($checkResult) > 0) {
                $ingRow = mysqli_fetch_assoc($checkResult);
                $ingredientId = $ingRow['id'];
            } else {
                mysqli_query($con, "INSERT INTO ingredients (name) VALUES ('{$itemEscaped}')");
                $ingredientId = mysqli_insert_id($con);
            }
            
            mysqli_query($con, "INSERT INTO recipe_ingredients (recipe_id, ingredient_id, quantityOriginal) VALUES ({$recipeId}, {$ingredientId}, '{$itemEscaped}')");
        }
        
        echo "  ✅ Migrated with fallback (no calories).\n";
        $migratedCount++;
    }
    
    echo "\n";
    
    // Rate limit safety: wait 2 seconds between AI calls
    sleep(2);
}

echo "=== Migration Complete ===\n";
echo "Total: {$totalRecipes} | Migrated: {$migratedCount} | Failed: {$failedCount}\n\n";

// Verify
$ingredientCount = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) as cnt FROM ingredients"))['cnt'];
$mappingCount = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) as cnt FROM recipe_ingredients"))['cnt'];
echo "Verification:\n";
echo "  ingredients table: {$ingredientCount} records\n";
echo "  recipe_ingredients table: {$mappingCount} mappings\n";

echo "\n⚡ After verifying the migration is correct, you can drop the old column:\n";
echo "   ALTER TABLE recipes DROP COLUMN recipeIngredients;\n";
