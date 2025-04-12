<?php
require 'includes/auth.php';
require 'includes/db.php';

if (!isTeacher()) {
    header('Location: student.php');
    exit();
}

// Fetch student details
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM students WHERE id = :id AND teacher_id = :teacher_id");
    $stmt->execute(['id' => $id, 'teacher_id' => $_SESSION['user_id']]);
    $student = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$student) {
        die("Student not found.");
    }
} else {
    header('Location: dashboard.php');
    exit();
}

// Update student details
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $class = $_POST['class'];

    $stmt = $conn->prepare("UPDATE students SET name = :name, email = :email, class = :class WHERE id = :id AND teacher_id = :teacher_id");
    $stmt->execute([
        'name' => $name,
        'email' => $email,
        'class' => $class,
        'id' => $id,
        'teacher_id' => $_SESSION['user_id']
    ]);

    header('Location: dashboard.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Edit Student</h2>
    <form method="POST">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($student['name']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($student['email']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="class" class="form-label">Class</label>
            <input type="text" class="form-control" id="class" name="class" value="<?= htmlspecialchars($student['class']) ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
</body>
</html>