<?php
session_start();
if ($_SESSION['user']) {
  if ($_SESSION['user']['role'] == "0" || $_SESSION['user']['role'] == null) {
    require 'profile.php';
} else if ($_SESSION['user']['role'] == "1") {
    require 'admin.php';
}
require 'templates/footer.php';
exit();
}
?>
<div class="avtor">
    <form action="authorization/handler_form/signin.php" method="post">
        <label>Логин</label>
        <input type="text" id="login" name="login" placeholder="Введите свой логин">
        <label>Пароль</label>
        <input type="password" id="password" name="password" placeholder="Введите пароль">
        <button id="submit" type="submit">Войти</button>
        <p>
            У вас нет аккаунта? - <a href="index.php?page=register">Зарегистрируйтесь</a>!
        </p>
        <?php
        // вывод сообщения об ошибке
        if (array_key_exists('message', $_SESSION)) {
            echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
        }
        unset($_SESSION['message']);
        ?>
    </form>
</div>

