<?php
include 'config.php';

$stmt = $conn->prepare("SELECT * FROM posts ORDER BY created_at DESC LIMIT 10");
$stmt->execute();
$result = $stmt->get_result();

$trending_posts = [];
while ($row = $result->fetch_assoc()) {
    $trending_posts[] = $row;
}

echo json_encode($trending_posts);

$stmt->close();
$conn->close();
?>
