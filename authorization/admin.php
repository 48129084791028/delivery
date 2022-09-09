<?php
if ( ! isset($_SESSION)) {
    session_start();
}
$id_user = $_SESSION['user']['id'];
if (!isset($_GET['delida'])){
} else {
    // подключение к БД и обработка удаления товара из корзины+
    $id = $_GET['delida'];
    $sql_basket_remove = $link->query("DELETE FROM basket WHERE id=$id"); 
    $redirect = $_SERVER['HTTP_REFERER'] ?? 'redirect-form.html';
    header("Location: $redirect");
}
?>
<div class="user_profile">
 <form action="authorization/handler_form/logout.php">
     <div style="display: flex;">
         <div style="margin: 20px;">
             <p style="margin: 10px 0;">Админ</p>
             <div align="center" style="margin-top: 10px;">
                 <button class="logout custom-button" type="submit">Выйти</button>
             </div>
         </div>
     </div>
 </form>
 </div>
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
        $sql_m      = $link->query("SELECT * FROM `products`");
        $Sum        = 0;
        $sql_basket = $link->query("SELECT * FROM `basket`");
        $sql_s      = $link->query("SELECT * FROM `status`");
        $sql_u      = $link->query("SELECT * FROM `users`");
        $sql_users = $link->query("SELECT * FROM `users`");
        $sql_uo = $link->query("SELECT * FROM `users`");
        $sql_a = $link->query("SELECT * FROM `address`");     
        if (isset($sql_basket)) {
            foreach ($sql_basket as $basket) {
                $a      = $basket['id_product'];
                $stat     = $basket['id_status'];
                $kol    = $basket['number_product'];
                $u     = $basket['id_user'];
                $good_m = [];
                foreach ($sql_m as $product_m) {
                    if ($product_m['id'] == $a) {
                        $good_m = $product_m;
                        break;
                    }
                }
                $adr     = $users_o['id_addr'];
                $good_a = [];
                $good_u = [];
                foreach ($sql_u as $user_n) {
                    if ($user_n['id'] == $u) {
                        $good_u = $user_n;
                        break;
                    }
                    
                }    
                foreach ($sql_a as $address_a) {
                        if ($address_a['id'] == $good_u['id_addr']) {
                        $good_a = $address_a;
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
                        <td><img width="50px" height="50px" src="<?php echo $good_m['imgs']; ?>" /></td>
                        <td><?php  echo $good_u['login']; ?></td>
                        <td><?php  echo $good_m['name']; ?></td>
                        <td> <?php echo $kol; ?> </td>
                        <td><?php echo $good_m['price'] . 'р'; ?></td>
                        <td><?php echo $kol * $good_m['price'] . 'р'; ?></td>
                        <td><?php echo $good_a['address']; ?></td>
                        <td> <select name="change_stat" selected="selected" onchange="location=value">
                            <option disabled selected="selected">
                                <?php echo $good_s['status']; ?></option>
                                <?php $sql_s=$link->query("SELECT * FROM status "); foreach ($sql_s as $stat) :?>
                                    <option value="authorization/admin_ch_s.php?id_stat=<?php echo $stat['id'] ?>&id_zakaz=<?php echo $basket['id'] ?>"><?php echo $stat['status']; ?></option>
                                <?php endforeach ?>
                            </select></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><b><a href="index.php?page=admin&delida=<?php echo $basket['id'];?>">удалить</a></b></td>
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
            </td>
        </tr>
    </table>
</form>

