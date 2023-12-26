<?php
include_once '../models/User.php';
global $user;
if (isset($_POST['register'])) {
    $picture = $_POST['picture'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $c_password = $_POST['c_password'];

    try {
        if ($password != $c_password) {
            header("Location: ../views/register_view.php?error=passwordDon'tMatch");
        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $user->register($picture, $username, $email, $hashed_password);
            // Redirect or do something on successful registration
            header("Location: ../views/login_view.php");
        }
    } catch (Exception $e) {
        // Handle the exception (e.g., log it, redirect the user, show an error message)
        header("Location: ../views/register_view.php?error=" . urlencode($e->getMessage()));
    }
}
