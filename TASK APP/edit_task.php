<?php
include 'config.php';
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM tasks WHERE id = $id");
$task = $result->fetch_assoc();
?>
<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Task</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h2>Edit Task</h2>
    <form action="update_task.php" method="post">
        <input type="hidden" name="id" value="<?= $task['id']; ?>">
        <div class="mb-3">
            <label>Title:</label>
            <input type="text" name="title" class="form-control" value="<?= $task['title']; ?>" required>
        </div>
        <div class="mb-3">
            <label>Description:</label>
            <textarea name="description" class="form-control"><?= $task['description']; ?></textarea>
        </div>
        <div class="mb-3">
            <label>Status:</label>
            <select name="status" class="form-control">
                <option value="Pending" <?= ($task['status'] == 'Pending') ? 'selected' : ''; ?>>Pending</option>
                <option value="In Progress" <?= ($task['status'] == 'In Progress') ? 'selected' : ''; ?>>In Progress</option>
                <option value="Completed" <?= ($task['status'] == 'Completed') ? 'selected' : ''; ?>>Completed</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Due Date:</label>
            <input type="date" name="due_date" class="form-control" value="<?= $task['due_date']; ?>">
        </div>
        <button type="submit" class="btn btn-success">Update Task</button>
    </form>
</div>
</body>
</html>
