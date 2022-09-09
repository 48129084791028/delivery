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
        <input type="text" name="full_name" minlength="3" maxlength="12" required placeholder="Имя">
        <label>Логин</label>
        <input type="text" name="login" minlength="4" maxlength="12" required placeholder="Логин">
        <label>Почта</label>
        <input type="email" name="email" minlength="8" maxlength="30" required placeholder="ivanov@mail.ru">
        <label>Телефон</label>
        <input type="text" name="phone" minlength="11" maxlength="11" required placeholder="81234567890" pattern="[0-9]{11}">
        <label>Пароль</label>
        <input type="password" name="password" minlength="4" maxlength="20" required placeholder="Пароль">
        <label>Подтверждение пароля</label>
        <input type="password" name="password_confirm" minlength="4" maxlength="20" required placeholder="Подтвердите пароль">
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

