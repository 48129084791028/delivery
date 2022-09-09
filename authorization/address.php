<?php
session_start();
if (!$_SESSION['user']) {
  require 'templates/footer.php';
  exit();
}
$id_user = $_SESSION['user']['id'];
require_once 'connect.php';
$id_addr = $_POST['id_addr'];
?>
<form>
    <div class="user_profile">
     <form action="authorization/handler_form/logout.php">
         <div style="display: flex;">
             <div style="margin: 20px;">
                 <a style="margin: 10px 0;" href="">Выбрать адрес доставки:</a>
                 <p style="margin: 10px 0;"></p>
                 <?php  
                 $sql_address = $link->query("SELECT * FROM `address` WHERE `id_user`= '$id_user'");
                 $sql_userso = $link->query("SELECT * FROM `users`");
                 $sql_addresso = $link->query("SELECT * FROM `address`");
                 foreach ($sql_addresso as $addresso) {
                    foreach ($sql_userso as $userso) {
                        if ($userso['id']== $_SESSION['user']['id'] ) {
                            if ($addresso['id'] == $userso['id_addr']) {
                                $addro      = $addresso['address'];
                            } 
                        }
                    }
                }                   
                if (isset($sql_address)) {
                    foreach ($sql_address as $users) {
                        $addr     = $users['id'];
                        $good_a = [];
                        foreach ($sql_address as $address) {
                            if ($address['id_user'] == $addr) {
                                $good_a = $address;
                                break;
                            }
                        }
                    }

                }
                ?>
                <td> <select name="change_stat" selected="selected" onchange="location=value">
                    <option disabled selected="selected">
                        <?php echo $addro; ?></option>
                        <?php foreach ($sql_address as $addr) : ?>
                            <option value="authorization/address_ch.php?id_addr=<?php echo $addr['id'] ?>&id_auser=<?php echo $addr['id_user'] ?>"><?php echo $addr['address']; ?></option>
                        <?php endforeach ?>
                    </select></td>
                </div>
            </div>
        </div>
    </form>
    <form action="authorization/address_add.php" method="POST">
        <div class="address_card">
         <div style="display: flex;">
             <div style="margin: 20px;">         
                 <a style="margin: 10px 0;" href="">Добавить новый адрес доставки:</a>
                 <p style="margin: 10px 0;">Название: </p>
                 <input type="text" name="name_adr" maxlength="20" placeholder="Дом">             
                 <p style="margin: 10px 0;">Адрес: </p>
                 <textarea name="address" rows="10" cols="50" minlength="10" maxlength="35" placeholder="Улица, дом, корпус, квартира"></textarea>
                 <p></p>
                 <button type="submit" name="save">Добавить</button>
                 <a href="index.php?page=profile">Назад</a>
                 <div align="center" style="margin-top: 10px;">
                 </div>           
             </div>
         </div>
     </div>
 </form>


 