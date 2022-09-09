<?php

session_start();
require_once 'connect.php';
$add_product = $_SESSION['add_product'];
$id_user     = (int)$_SESSION['user']['id'];
$sql_users = $link->query("SELECT * FROM `users`");
$sql_address = $link->query("SELECT * FROM `address`");
// обработка добавления продукта в корзину, добавление значений корзины в БД с проверкой условий
if (isset($_SESSION['user'] )) {
    foreach ($sql_address as $address) {
        foreach ($sql_users as $users) {
           if ($users['id']== $_SESSION['user']['id'] ) {
            if ($address['id'] == $users['id_addr']) {
                $addr      = $address['address'];
            } 
        }
    }
}
if ($addr != null){
    foreach ($add_product as $key => $value) {
        $id_product     = $key;
        $number_product = (int)$value;
        mysqli_query(
            $link,
            "INSERT INTO `basket` (`id`, `id_user`, `id_product`, `number_product`,`id_status`) VALUES (NULL, '$id_user', '$id_product', '$number_product','1')"
        );
    }
    unset($_SESSION['add_product']);
    header('Location: index.php?page=profile');

} else {
    $_SESSION['message1'] = 'Для оформления заказа добавьте адрес!';
    $redirect = $_SERVER['HTTP_REFERER'] ?? 'redirect-form.html';
    header("Location: $redirect");
    exit;
}
} else {
    $_SESSION['message'] = 'Для оформления заказа авторизуйтесь!';
    header("Location: index.php?page=profile");
}


