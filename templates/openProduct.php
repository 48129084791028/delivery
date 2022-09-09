<div class="mainBlockContentOP">
    <div class="topBlockOP">
        <p id="openedProduct-name">
            <?php echo $good['name']; 
            
            if (array_key_exists('message1', $_SESSION)) {
                echo '<p class="msg"> ' . $_SESSION['message1'] . ' </p>';
            }unset($_SESSION['message1']);
            
            ?>
        </p>
    </div>
    <div class="blockTovar">
        <div class="blockTovarChild">
            <div class="topBlock">
                <div class="leftTopBlock">
                 <img   src="<?php echo $good['imgs']; ?>"alt="">
             </div>
             <div class="rightTopBlock">
                
                <div class="contMan">
                    <table class="tableCountMan">
                        <tr><td class="tabCoun">Ингредиенты:</td>
                            <td><?php echo $good['comp']; ?></td>
                        </tr>
                        <tr><td class="tabMan">Вес: </td>
                            <td><?php echo $good['weight']; ?></td>
                        </tr>
                        <tr><td class="tabPrice">Цена:</td>
                            <td><?php $price = $good['price']; echo '<a class="Price"> '.$good['price'].'₽ </a>';?></td>  
                        </tr>
                    </table>
                </div>
                <form id="form1" name="form1" action="add_cart.php" method="post">
                    <div class="input-group quantity_goods">
                        <input type="button" value="-" id="button_minus">
                        <!-- обработчик количества товаров-->
                        <input onchange="location=value" type="text" step="1" min="1"
                        max="10" id="num_count" name="quantity" value="1"
                        title="Qty">
                        <input type="button" value="+" id="button_plus">
                    </div>
                    <!-- начало невидимой части формы -->
                    <input type="hidden" name="product_id"
                    value="<?php echo $good['id'] ?>"/>
                    <!-- конец невидимой части формы -->
                    <input class='add_to_cart' type="submit" value="В корзину"
                    name="submit">
                    <td><a href="index.php?page=shop">Назад</a></td>
                </form>
            </div>
        </div>  
    </div>  
</div>
<!-- обработчик событий для счетчика количества товаров -->
<script>
    const numCount = document.getElementById('num_count');
    const plusBtn = document.getElementById('button_plus');
    const minusBtn = document.getElementById('button_minus');
    plusBtn.onclick = function () {
        let qty = parseInt(numCount.value);
        qty = qty + 1;
        numCount.value = qty;
    }
    minusBtn.onclick = function () {
        let qty = parseInt(numCount.value);
        if (qty > 1) {
            qty = qty - 1;
        }
        numCount.value = qty;
    }
</script>