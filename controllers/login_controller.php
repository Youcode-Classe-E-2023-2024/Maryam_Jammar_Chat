<?php

global $user, $row;
if(isset($_POST['login'])){
    extract($_POST);
    echo $email;
    try {
        if ($user->login($email, $password)) {
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['picture'] = $row['picture'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['password'] = $row['password'];

            header('Location: index.php?page=room');
        }
    } catch (Exception $e) {
        header("Location: index.php?error={$e->getMessage()}&&page=login");
    }


}