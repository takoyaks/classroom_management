<?php
// Start session
session_start();

// Check if the user is already logged in
if (isset($_SESSION['user_id'])) {
    // Redirect to the appropriate dashboard based on the user's role
    if ($_SESSION['role'] === 'teacher') {
        header('Location: dashboard.php');
    } elseif ($_SESSION['role'] === 'student') {
        header('Location: student.php');
    }
    exit();
}

// If not logged in, redirect to the login page
header('Location: login.php');
exit();
?>