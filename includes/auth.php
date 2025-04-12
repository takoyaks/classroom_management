<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

function isTeacher() {
    return $_SESSION['role'] === 'teacher';
}

function isStudent() {
    return $_SESSION['role'] === 'student';
}
?>