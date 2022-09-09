<?php
session_start();
if (!$_SESSION['user']) {
  require 'templates/footer.php';
  exit();
}
$c = (int)$_SESSION['user']['id'];;
if (array_key_exists('message2', $_SESSION)) {
    echo '<p class="msg"> ' . $_SESSION['message2'] . ' </p>';
}unset($_SESSION['message2']);
$sql_c=$link->query("SELECT * FROM users where `id` = '$c'");
foreach ($sql_c as $user):
    ?>
    <form action="authorization/change_ch.php" method="POST">
        <div class="change_table">
         <div style="display: flex;">
             <div style="margin: 20px;">
                 <p style="margin: 10px 0;">Имя: </p>
                 <input type="text" name="full_name" minlength="3" maxlength="20" value="<?= $user['name'] ?>">
                 <p style="margin: 10px 0;">Логин: </p>
                 <input type="text" name="login" minlength="4" maxlength="20" value="<?= $user['login'] ?>">
                 <p style="margin: 10px 0;">Электронная почта: </p>
                 <input type="text" name="email" minlength="8" maxlength="40" value="<?= $user['email'] ?>">                  
                 <p style="margin: 10px 0;">Номер телефона: </p>
                 <input type="text" name="phone" minlength="11" maxlength="11" value="<?= $user['phone'] ?>">
                 <p></p>
                 <button type="submit" name="save" >Сохранить</button>
                 <a href="index.php?page=profile">Назад</a>
                 <div align="center" style="margin-top: 10px;">        
                 </div>
             </div>
         </div>
     </form>
 <?php endforeach ?>






