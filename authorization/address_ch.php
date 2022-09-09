<?php
require_once '../connect.php';
$id_addr = (int)$_GET['id_addr'];
$id_auser= (int)$_GET['id_auser'];
mysqli_query($link,"UPDATE `users` SET `id_addr` = '$id_addr' WHERE `id` = '$id_auser'");
$redirect = $_SERVER['HTTP_REFERER'] ?? 'redirect-form.html';
header("Location: $redirect");
?>

