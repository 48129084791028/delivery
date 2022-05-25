<?php
session_start();
require_once '../connect.php';
$name_adr = $_POST['name_adr'];
$address = $_POST['address'];


if (!isset($_GET['save'])) {
    mysqli_query(
        $link,
        "INSERT INTO `address` (`id`,`name_adr`, `address`) VALUES (NULL,'$name_adr', '$address')"
    );
}
$redirect = $_SERVER['HTTP_REFERER'] ?? 'redirect-form.html';
header("Location: $redirect");
exit();
?>


