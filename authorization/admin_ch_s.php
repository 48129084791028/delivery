<?php
require_once '../connect.php';
$id_stat = (int)$_GET['id_stat'];
$id_zakaz = (int)$_GET['id_zakaz'];
mysqli_query($link,"UPDATE `basket` SET `id_status` = '$id_stat' WHERE `id` = $id_zakaz");
$redirect = $_SERVER['HTTP_REFERER'] ?? 'redirect-form.html';
header("Location: $redirect");
?>

