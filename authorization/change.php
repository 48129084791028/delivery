<?php

session_start();
if (!$_SESSION['user']) {
  require 'templates/footer.php';
  exit();
}
$user_id = $_SESSION['user']['id'];


if (!isset($_GET['save'])){

} else {
    // подключение к БД и обработка удаления товара из корзины
    $id = $_GET['save'];
    $sql_profile_save = $link->query("DELETE FROM basket WHERE id=$id"); 
    header('Location: '.'index.php?page=profile');
}
?>

<div class="user_profile">
 <div style="display: flex;">
     <div style="margin-top: 20px;">
         
         <p style="margin: 10px 0;">Имя: </p>
         <input type="text" name="login" maxlength="20" placeholder="<?= $_SESSION['user']['name'] ?>">
         
         <p style="margin: 10px 0;">Электронная почта: </p>
         <input type="text" name="email" maxlength="20" placeholder="<?= $_SESSION['user']['email'] ?>">
         
         
         <p style="margin: 10px 0;">Номер телефона: </p>
         <input type="text" name="phone" maxlength="20" placeholder="<?= $_SESSION['user']['phone'] ?>">

         <p style="margin: 10px 0;">Старый пароль: </p>
         <input type="text" name="password_old" maxlength="20" placeholder="<?= $_SESSION['user']['password'] ?>">

         <p style="margin: 10px 0;">Новый пароль: </p>
         <input type="text" name="password_new" maxlength="20">

         <p style="margin: 10px 0;">Повторите новый пароль: </p>
         <input type="text" name="password_new" maxlength="20">

         <p></p>
         <a href="index.php?page=profile">Сохранить</a>
         <a href="index.php?page=profile">Отмена</a>

         <div align="center" style="margin-top: 10px;">
             
         </div>
     </div>
 </div>
</form>





