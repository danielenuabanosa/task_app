<?php
session_start();
include 'config.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Check if task ID is provided in the URL
if (isset($_GET['id'])) {
    $task_id = intval($_GET['id']);  // Convert to integer to prevent SQL injection
    $user_id = $_SESSION['user_id']; // Get logged-in user's ID

    // SQL to delete the task belonging to the logged-in user
    $sql = "DELETE FROM tasks WHERE id = ? AND user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $task_id, $user_id);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Task deleted successfully!";
    } else {
        $_SESSION['error'] = "Error deleting task.";
    }

    $stmt->close();
    $conn->close();
}

// Redirect back to index.php
header("Location: index.php");
exit();
?>
