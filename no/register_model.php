<?php
echo('salam');
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
$user->register($picture, $username, $email, $hashed_password);

