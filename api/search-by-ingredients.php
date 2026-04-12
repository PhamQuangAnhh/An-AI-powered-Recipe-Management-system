<?php
/**
 * API Endpoint: Search Recipes by Ingredient IDs
 * 
 * GET /api/search-by-ingredients.php?ids=1,2,3
 * Returns recipes that contain ALL specified ingredients
 */
header('Content-Type: application/json; charset=utf-8');
include('../includes/dbconnection.php');

$idsParam = isset($_GET['ids']) ? trim($_GET['ids']) : '';

if (empty($idsParam)) {
    echo json_encode([]);
    exit;
}

// Sanitize IDs
$ids = array_map('intval', explode(',', $idsParam));
$ids = array_filter($ids, function($id) { return $id > 0; });

if (empty($ids)) {
    echo json_encode([]);
    exit;
}

$idList = implode(',', $ids);
$idCount = count($ids);

// Find recipes that contain ALL the specified ingredients
$sql = "SELECT r.id, r.recipeTitle, r.recipePicture, r.recipePrepTime, r.recipeYields, r.totalCalories, r.postingDate
        FROM recipes r
        JOIN recipe_ingredients ri ON r.id = ri.recipe_id
        WHERE ri.ingredient_id IN ($idList)
        GROUP BY r.id
        HAVING COUNT(DISTINCT ri.ingredient_id) = $idCount
        ORDER BY r.postingDate DESC";

$result = mysqli_query($con, $sql);

$recipes = [];
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $recipes[] = [
            'id' => intval($row['id']),
            'title' => $row['recipeTitle'],
            'picture' => $row['recipePicture'],
            'prepTime' => intval($row['recipePrepTime']),
            'yields' => intval($row['recipeYields']),
            'totalCalories' => intval($row['totalCalories']),
            'postingDate' => $row['postingDate']
        ];
    }
}

echo json_encode($recipes, JSON_UNESCAPED_UNICODE);
