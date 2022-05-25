<?php

session_start();
if (!$_SESSION['user']) {
  require 'templates/footer.php';
  exit();
}
$user_id = $_SESSION['user']['id'];

?>
<form action="authorization/address_add.php" method="POST">
    <div class="user_profile">
     <div style="display: flex;">
         <div style="margin-top: 20px;">
             
             <p style="margin: 10px 0;">Название: </p>
             <input type="text" name="name_adr" maxlength="20" placeholder="Дом">
             
             <p style="margin: 10px 0;">Адрес: </p>
             <textarea name="address" rows="10" cols="50" placeholder="Улица, дом, корпус, квартира"></textarea>
             

             <p></p>
             <button type="submit" name="save" href="<?= $previous ?>">Сохранить </button>
             <a href="index.php?page=profile_index">Отмена</a>

             <div align="center" style="margin-top: 10px;">

                <table class="tableProfile">


                    <tr>
                        <td></td>
                        <td style="font-size: 20px;"><b>Название адреса</b></td>
                        <td style="font-size: 20px;"><b>Адрес</b></td>

                        <td></td>
                    </tr>
                    <?php

        // подключение к БД и получение их нее данных для корзины
                    $sql_m      = $link->query("SELECT * FROM `products`");
                    $sql_s      = $link->query("SELECT * FROM `status`");
                    $Sum        = 0;
                    $sql_basket = $link->query("SELECT * FROM `basket`");
                    if (isset($sql_basket)) {
                        foreach ($sql_basket as $basket) {
                // заполнение корзины данными
                            if ($basket['id_user'] == $id_user) {
                                $a      = $basket['id_product'];
                                
                                $stat     = $basket['status'];
                //    $sql_stat      = $link->query("SELECT * FROM `status` WHERE `id` = $status");


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

                                <td></td>
                                <td> <?php echo $good_s['status']; ?> </td>
                                <td><b><a href="index.php?page=profile&delid=<?php echo $basket['id'];?>">удалить</a></b></td>
                            </tr>
                            <?php


                        }
                    }
                }
                ?>

            </table>
            
        </div>
    </div>
</div>
</form>





