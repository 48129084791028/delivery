<?php
session_start();
require_once '../connect.php';
$message = $_POST['message'];
$name = $_POST['name'];
$email = $_POST['email'];



if (!isset($_GET['send'])) {
    mysqli_query(
        $link,
        "INSERT INTO `review` (`id`,`name`,`email`, `text_review`) VALUES (NULL,'$name', '$email','$message')"
    );
}
$redirect = $_SERVER['HTTP_REFERER'] ?? 'redirect-form.html';
header("Location: $redirect");
exit();
?>


