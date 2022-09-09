<?php
session_start();
require_once '../connect.php';
$name_adr = $_POST['name_adr'];
$address = $_POST['address'];
$id_user = $_SESSION['user']['id'];
if (!isset($_GET['save'])) {
    mysqli_query(
        $link,
        "INSERT INTO `address` (`id`, `id_user`, `name_adr`, `address`) VALUES (NULL,'$id_user', '$name_adr', '$address')"
    );
}
$redirect = $_SERVER['HTTP_REFERER'] ?? 'redirect-form.html';
header("Location: $redirect");
exit();
?>


