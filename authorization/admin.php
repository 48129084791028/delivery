<?php

if ( ! isset($_SESSION)) {
    session_start();
}
$id_user = $_SESSION['user']['id'];


if (!isset($_GET['delid'])){

} else {
    // подключение к БД и обработка удаления товара из корзины+
    $id = $_GET['delid'];
    $sql_basket_remove = $link->query("DELETE FROM basket WHERE id=$id"); 
    $redirect = $_SERVER['HTTP_REFERER'] ?? 'redirect-form.html';
    header("Location: $redirect");
    exit();
}
?>
Админ
<div class="user_profile">
   <form action="authorization/handler_form/logout.php">
       <div style="display: flex;">
           <div style="margin-top: 20px;">
               
               <p style="margin: 10px 0;">Имя: <?= $_SESSION['user']['name'] ?></p>

               
               <p style="margin: 10px 0;">Электронная почта: <?= $_SESSION['user']['email'] ?></p>
               
               
               <p style="margin: 10px 0;">Номер телефона: <?= $_SESSION['user']['phone'] ?></p>
               
               

               <div align="center" style="margin-top: 10px;">
                   <button class="logout custom-button" type="submit">Выйти</button>
               </div>
           </div>
       </div>
   </form>


   <form>
       




       <table class="tableProfile">


        <tr>
            <td></td>
            <td style="font-size: 20px;"><b>Пользователь</b></td>
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
        $Sum        = 0;
        $sql_basket = $link->query("SELECT * FROM `basket`");
        $sql_s      = $link->query("SELECT * FROM `status`");
        $sql_u      = $link->query("SELECT * FROM `users`");
        
        

        if (isset($sql_basket)) {
            foreach ($sql_basket as $basket) {
                // заполнение корзины данными
                $status1      = $link->query("SELECT status FROM 'status' WHERE id = 1");
                
                $a      = $basket['id_product'];
                $stat     = $basket['status'];
                $u     = $basket['id_user'];
                $kol    = $basket['number_product'];
                $good_m = [];
                foreach ($sql_m as $product_m) {
                    if ($product_m['id'] == $a) {
                        $good_m = $product_m;
                        break;
                    }
                }
                $good_u = [];
                foreach ($sql_u as $user_n) {
                    if ($user_n['id'] == $u) {
                        $good_u = $user_n;
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
                    </td><!-- вывод названия товаров, общей суммы и кнопки удалить из заказа -->


                    


                    <td><?php  echo $good_u['login']; ?></td>



                    <td><?php  echo $good_m['name']; ?></td>
                    <td> <?php echo $kol; ?> </td>
                    <td><?php echo $good_m['price'] . 'р'; ?></td>
                    <td><?php echo $kol * $good_m['price'] . 'р'; ?></td>
                    <td></td>
                    <td> <select name="user_profile_color_1">
                        <option value="1"><?php echo $good_s['status']; ?></option>
                        <option value="2">Синий</option>
                    </select></td>
                    <td><b><a href="index.php?page=profile&delid=<?php echo $basket['id'];?>">удалить</a></b></td>
                </tr>
                <?php

                
                
                
            }
        }
        ?>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            


                    <!-- Изменяется статус на готовим, переход на другую страницу где 
                    отображается статус и нет кнопки Заказать


                -->
                
            </td>
        </tr>
    </table>
    
</form>

