<?php
require 'includes/auth.php';
require 'includes/db.php';

if (!isTeacher()) {
    header('Location: student.php');
    exit();
}

$stmt = $conn->prepare("SELECT * FROM students WHERE teacher_id = :teacher_id");
$stmt->execute(['teacher_id' => $_SESSION['user_id']]);
$students = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center">
        <h2>Welcome, Teacher</h2>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>
    <a href="add_student.php" class="btn btn-success mb-3">Add Student</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Class</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($students as $student): ?>
                <tr>
                    <td><?= $student['name'] ?></td>
                    <td><?= $student['email'] ?></td>
                    <td><?= $student['class'] ?></td>
                    <td>
                        <a href="edit_student.php?id=<?= $student['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="delete_student.php?id=<?= $student['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>