<?php
include 'config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];
    $content = $_POST['content'];
    $image_url = ""; // Handle image upload logic

    $stmt = $conn->prepare("INSERT INTO posts (user_id, content, image_url) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $user_id, $content, $image_url);

    if ($stmt->execute()) {
        echo "Post created successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
}
?>
