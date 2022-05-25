<?php
session_start();
require_once '../../connect.php';
$full_name        = $_POST['full_name'];
$login            = $_POST['login'];
$email            = $_POST['email'];
$password         = $_POST['password'];
$password_confirm = $_POST['password_confirm'];
$phone            = $_POST['phone'];
$patern_phone = "/^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/";



$check_user       = mysqli_query(
    $link,
    "SELECT * FROM `users` WHERE `login` = '$login' "
);
$check_email       = mysqli_query(
    $link,
    "SELECT * FROM `users` WHERE `email` = '$email' "
);

// обработка ошибки
if (mysqli_num_rows($check_email) > 0) {
    $_SESSION['message'] = 'Почта занята';
    $redirect            = $_SERVER['HTTP_REFERER'] ?? 'redirect-form.html';
    header("Location: $redirect");
    exit();

}


if (!preg_match($patern_tel, $phone)) {
    $err['phone'] = "Неверный формат! (+7(xxx)xxx-xx-xx)";
}




if (mysqli_num_rows($check_user) > 0) {
    $_SESSION['message'] = 'Такой логин уже используется';
    $redirect            = $_SERVER['HTTP_REFERER'] ?? 'redirect-form.html';
    header("Location: $redirect");
    exit();
} else {
    if ($password === $password_confirm) {
        $password = md5($password);
        // загрузка данных о пользователей в БД
        mysqli_query(
            $link,
            "INSERT INTO `users` (`id`, `name`, `login`, `email`, `password`, `phone`, `role`, `address`) VALUES (NULL, '$full_name', '$login', '$email', '$password',  '$phone', null, NULL)"
        );
        $_SESSION['message'] = 'Регистрация прошла успешно!';
    } else {
        $_SESSION['message'] = 'Пароли не совпадают';
    }
    $redirect = $_SERVER['HTTP_REFERER'] ?? 'redirect-form.html';
    header("Location: $redirect");
    exit();
}
