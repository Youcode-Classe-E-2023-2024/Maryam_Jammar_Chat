<?php
include_once '../models/User.php';
session_start();
global $user, $row;
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($user->login($email, $password)){
        $_SESSION['picture'] = $row['picture'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['password'] = $row['password'];

        header('Location: ../views/room_view.php');
    }



}