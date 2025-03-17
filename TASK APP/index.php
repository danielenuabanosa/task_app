<?php
session_start();
include 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$search = isset($_GET['search']) ? $_GET['search'] : '';
$priority = isset($_GET['priority']) ? $_GET['priority'] : '';

$sql = "SELECT * FROM tasks WHERE user_id = " . $_SESSION['user_id'];

if (!empty($search)) {
    $sql .= " AND title LIKE '%$search%'";
}

if (!empty($priority)) {
    $sql .= " AND priority = '$priority'";
}

$result = $conn->query($sql);  // Move this line here
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Task Manager</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
<div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Task Manager</h2>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>
</div>


<div class="container mt-4">
    <a href="add_task.php" class="btn btn-primary mb-3">Add New Task</a>
    <form method="get" class="row g-3 mb-3">
    <div class="col-md-8">
        <input type="text" name="search" class="form-control" placeholder="Search tasks">
    </div>

    <div class="col-md-4">
        <button type="submit" class="btn btn-primary w-100">Search & Filter</button>
    </div>
</form>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Status</th>
                <th>Due Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id']; ?></td>
                <td><?= $row['title']; ?></td>
                <td><?= $row['description']; ?></td>
                <td><?= $row['status']; ?></td>
                <td><?= $row['due_date']; ?></td>
                <td>
                    <a href="edit_task.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="delete_task.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?');">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
</body>
</html>
