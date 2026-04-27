<?php
header('Content-Type: application/json; charset=utf-8');
include('../includes/dbconnection.php');

$query = isset($_GET['q']) ? trim($_GET['q']) : '';

if ($query !== '') {
    $stmt = $con->prepare(
        "SELECT id, name, name_vi FROM ingredients
         WHERE name LIKE ? OR name_vi LIKE ?
         ORDER BY name ASC LIMIT 50"
    );
    $like = '%' . $query . '%';
    $stmt->bind_param("ss", $like, $like);
} else {
    $stmt = $con->prepare(
        "SELECT id, name, name_vi FROM ingredients ORDER BY name ASC LIMIT 100"
    );
}

$stmt->execute();
$result = $stmt->get_result();

$ingredients = [];
while ($row = $result->fetch_assoc()) {
    $displayName = $row['name_vi']
        ? $row['name_vi'] . ' / ' . $row['name']
        : $row['name'];
    $ingredients[] = [
        'id'   => intval($row['id']),
        'name' => $displayName,
    ];
}
$stmt->close();

echo json_encode($ingredients, JSON_UNESCAPED_UNICODE);
