<?php
session_start();
if (!$_SESSION['user']) {
  require 'templates/footer.php';
  exit();
}
$user_id = $_SESSION['user']['id'];
 if (array_key_exists('message4', $_SESSION)) {
                echo '<p class="msg"> ' . $_SESSION['message4'] . ' </p>';
            }unset($_SESSION['message4']);
?>
<form action="authorization/reviews_add.php" method="POST">
    <div class="user_profile">
        <center>
           <div style="text-align: center;">
               <div style="text-align: center;">
                <p style="margin: 10px 0;">Имя: </p>
                <input type="text" name="name" maxlength="20" placeholder="<?= $_SESSION['user']['name'] ?>">
                <p style="margin: 10px 0;">Электронная почта: </p>
                <input type="text" name="email" maxlength="20" placeholder="<?= $_SESSION['user']['email'] ?>">
                <p style="margin: 10px 0;">Отзыв: </p>
                <textarea name="message" rows="10" cols="50"></textarea>
                <p></p>
                <button type="submit" name="send" >Отправить </button>
            </div>
        </div>
    </center>
</div>
</form>




