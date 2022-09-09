<?php
session_start();
require_once '../connect.php';
$id_user = $_SESSION['user']['id'];
$full_name        = $_POST['full_name'];
$login            = $_POST['login'];
$email            = $_POST['email'];
$phone            = $_POST['phone'];
$ilogin = $_SESSION['user']['login'];
$iemail = $_SESSION['user']['email'];
$check_user       = mysqli_query(
    $link,
    "SELECT * FROM `users` WHERE `login` != '$login' "
);
$check_email       = mysqli_query(
    $link,
    "SELECT * FROM `users` WHERE `email` != '$email' "
);
if (!isset($_GET['save'])) {
        mysqli_query($link,"UPDATE `users` SET `name` = '$full_name', `login` = '$login', `email` = '$email', `phone` = '$phone' WHERE `users`.`id` = $id_user");        
    }

header('Location: ../../../index.php?page=login');
exit();
?>

