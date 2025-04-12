<?php
require 'includes/auth.php';
require 'includes/db.php';

if (!isTeacher()) {
    header('Location: student.php');
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM students WHERE id = :id AND teacher_id = :teacher_id");
    $stmt->execute(['id' => $id, 'teacher_id' => $_SESSION['user_id']]);
}

header('Location: dashboard.php');
exit();
?>