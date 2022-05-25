<?php
session_start();
unset($_SESSION['user']);
header('Location: ../../index.php?page=logout');

// переход на страницу авторизации
header('Location: ../../index.php?page=index');
exit();
