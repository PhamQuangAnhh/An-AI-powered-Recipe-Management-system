<?php
/**
 * API Endpoint: Search Ingredients
 * Returns JSON list of ingredients for the searchable multi-select dropdown.
 * 
 * GET /api/search-ingredients.php?q=<search_term>
 * Returns: [{"id": 1, "name": "flour"}, ...]
 */
header('Content-Type: application/json; charset=utf-8');
include('../includes/dbconnection.php');

$query = isset($_GET['q']) ? trim($_GET['q']) : '';

if ($query !== '') {
    $escaped = mysqli_real_escape_string($con, $query);
    $result = mysqli_query($con, "SELECT id, name FROM ingredients WHERE name LIKE '%$escaped%' ORDER BY name ASC LIMIT 50");
} else {
    // Return all ingredients if no search term
    $result = mysqli_query($con, "SELECT id, name FROM ingredients ORDER BY name ASC LIMIT 100");
}

$ingredients = [];
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $ingredients[] = [
            'id' => intval($row['id']),
            'name' => $row['name']
        ];
    }
}

echo json_encode($ingredients, JSON_UNESCAPED_UNICODE);
