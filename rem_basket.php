<?php
session_start();
$id = $_GET['remId'];
unset($_SESSION['add_product'][$id]);
// переход к предыдущему окну
$redirect = $_SERVER['HTTP_REFERER'] ?? 'redirect-form.html';
header("Location: $redirect");
?>