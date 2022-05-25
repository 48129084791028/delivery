<?php

session_start();

// подключение к БД и выборка из таблицы пользователи данных, которые соответствуют введенным
require_once '../../connect.php';
$login      = $_POST['login'];
$password   = md5($_POST['password']);
$check_user = mysqli_query($link, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");

if (mysqli_num_rows($check_user) > 0) {

    $user             = mysqli_fetch_assoc($check_user);

    $_SESSION['user'] = [
        "id"        => $user['id'],
        "name"      => $user['name'],
        "email"     => $user['email'],
        "phone"     => $user['phone'],
        "role"      => $user['role']
    ];
    if ($_SESSION['user']['role'] == "0" || $_SESSION['user']['role'] == null) {
        header('Location: ../../index.php?page=profile');
    } else if ($_SESSION['user']['role'] == "1") {
        header('Location: ../../index.php?page=admin');
    }
} else {
    $_SESSION['message'] = 'Неверный логин или пароль';
    header('Location: ../../../index.php?page=login');
}
?>
<pre>
    <?php
    print_r($check_user);
    print_r($user);
    ?>
</pre>