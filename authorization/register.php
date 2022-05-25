<?php

if ( ! isset($_SESSION)) {
    session_start();
}
if (array_key_exists('user', $_SESSION)) {
    require 'profile.php';
    exit();
}
?>
<div class="avtor">
    <form action="authorization/handler_form/signup.php" method="post" enctype="multipart/form-data">
        <label>Имя</label>
        <input type="text" name="full_name" maxlength="20" placeholder="Имя">
        <label>Логин</label>
        <input type="text" name="login" maxlength="20" placeholder="Логин">
        <label>Почта</label>
        <input type="email" name="email" maxlength="40" placeholder="ivanov@mail.ru">
        <label>Телефон</label>
        <input type="text" name="phone" maxlength="20" placeholder="+7(xxx)xxx-xx-xx">
        <label>Пароль</label>
        <input type="password" name="password" maxlength="20"placeholder="Пароль">
        <label>Подтверждение пароля</label>
        <input type="password" name="password_confirm" maxlength="20" placeholder="Подтвердите пароль">
        <button type="submit">Зарегистрироваться</button>
        <p>
            У вас уже есть аккаунт? - <a href="index.php?page=login">авторизируйтесь!</a>
        </p>
        <?php
        // сообщение об ошибке
        if (array_key_exists('message', $_SESSION)) {
            echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
        }
        unset($_SESSION['message']);
        ?>
    </form>
</div>
