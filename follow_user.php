<?php
include 'config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_POST['user_id'];
    $follower_id = $_SESSION['user_id'];

    $stmt = $conn->prepare("INSERT INTO followers (user_id, follower_id) VALUES (?, ?)");
    $stmt->bind_param("ii", $user_id, $follower_id);

    if ($stmt->execute()) {
        echo "User followed successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
}
?>
