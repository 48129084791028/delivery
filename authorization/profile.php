<?php
session_start();
if (!$_SESSION['user']) {
  require 'authorization/login.php';
  require 'footer.php';
  exit();
}
$id_user = $_SESSION['user']['id'];
if (array_key_exists('message1', $_SESSION)) {
    echo '<p class="msg"> ' . $_SESSION['message1'] . ' </p>';
}unset($_SESSION['message1']); 
$sql_user = $link->query("SELECT * FROM `users` where `id`=$id_user");
foreach ($sql_user as $user):
 ?>
 <div class="user_profile">
   <form action="authorization/handler_form/logout.php">
       <div style="display: flex;">
           <div style="margin: 20px;">

               <p style="margin: 10px 0;">Имя: <?php echo $user['name']; ?></p>


               <p style="margin: 10px 0;">Электронная почта: <?php echo $user['email']; ?></p>


               <p style="margin: 10px 0;">Номер телефона: <?php echo $user['phone']; ?></p>

               <a href="index.php?page=change">Редактировать профиль</a>
               <p></p>
               <a href="index.php?page=address">Выбор адреса</a>
               <p></p>
               <a href="index.php?page=reviews">Отзыв</a>

               <div align="center" style="margin-top: 10px;">
                   <button class="logout custom-button" type="submit">Выйти</button>
               </div>
           </div>
       </div>
   </form>
</div>
<?php endforeach ?>
<form>
   <table class="tableProfile">
    <h2 style="font-size: 40px;">Ваши Заказы</h2>
    <tr>
        <td></td>
        <td style="font-size: 20px;"><b>Название блюда</b></td>
        <td style="font-size: 20px;"><b>Количество</b></td>
        <td style="font-size: 20px;"><b>Цена за шт.</b></td>
        <td style="font-size: 20px;"><b>Итого</b></td>
        <td style="font-size: 20px;"><b>Адрес</b></td>
        <td style="font-size: 20px;"><b>Статус</b></td>
        <td></td>
    </tr>
    <?php
    // подключение к БД и получение их нее данных для корзины
    $sql_m      = $link->query("SELECT * FROM `products`");
    $sql_s      = $link->query("SELECT * FROM `status`");
    $Sum        = 0;
    $sql_basket = $link->query("SELECT * FROM `basket`");
    $sql_users = $link->query("SELECT * FROM `users`");
    $sql_address = $link->query("SELECT * FROM `address`");
    if (isset($sql_basket)) {
        foreach ($sql_basket as $basket) {
            // заполнение корзины данными
            if ($basket['id_user'] == $id_user) {
                $a      = $basket['id_product'];              
                $stat     = $basket['id_status'];
                $kol    = $basket['number_product'];
                $good_m = [];
                foreach ($sql_m as $product_m) {
                    if ($product_m['id'] == $a) {
                        $good_m = $product_m;
                        break;
                    }
                } 
                $good_s = [];
                foreach ($sql_s as $status) {
                    if ($status['id'] == $stat) {
                        $good_s = $status;
                        break;
                    }
                }
                foreach ($sql_address as $address) {
                    foreach ($sql_users as $users) {
                     if ($users['id']== $_SESSION['user']['id'] ) {
                        if ($address['id'] == $users['id_addr']) {
                            $addr      = $address['address'];
                        } 
                    }
                }
            }
            ?>
            <tr>
                <td>
                    <img width="50px" height="50px" src="<?php echo $good_m['imgs']; ?>" />
                </td>
                <td><?php 
                // вывод названия товаров, общей суммы и кнопки удалить из заказа
                echo $good_m['name']; 
            ?></td>
            <td> <?php echo $kol; ?> </td>
            <td><?php echo $good_m['price'] . 'р'; ?></td>
            <td><?php echo $kol * $good_m['price'] . 'р'; ?></td>

            <td><?php echo $addr; ?></td>


            <td> <?php echo $good_s['status']; ?> </td>
        </tr>
        <?php

        // функция подсчета общей суммы товаров
        $Sum += $kol * $good_m['price'];
    }
}
}
?>
<tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td align="right" colspan="5"><b> <?php echo 'Всего: ' . $Sum ?></b><b> руб.</b>
            </td>
        </tr>
    </table>
    
</form>



