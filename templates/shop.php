<h1 class="catLogo">Каталог товаров
	<?php
	if (!isset($_GET['id_cat'])) {

	} else {

		// соединяемся с БД и выбираем название категории
		$cat = $_GET['id_cat'];
		$sql_cat=$link->query("SELECT `name` FROM `categories` WHERE `id`= $cat");
		foreach ($sql_cat as $cat):
			echo " → ".$cat['name'];
		endforeach;
	}
	if (array_key_exists('message1', $_SESSION)) {
		echo '<p class="msg"> ' . $_SESSION['message1'] . ' </p>';
	}unset($_SESSION['message1']);

	?>
</h1> 
<div class="shop">
	<div class="shopCat">
		<ul>
			<!-- соединяемся с БД и выбираем все данные из категорий -->
			<?php
			$sql_cat=$link->query("SELECT * FROM `categories`");
			foreach ($sql_cat as $cat): ?>
				<li class="catlileft"><a class="catleft" href="index.php?page=product_cat&id_cat=<?php echo $cat['id']?>" title="<?php echo $cat['name']?>"><?php echo $cat['name']?></a></li>
			<?php endforeach; ?>
			<li><a class="catleft" href="index.php?page=product_cat&id_cat=0">Все</a></li>
		</ul>
	</div>


	<div class="rightBlockShop">
		<div class="right_nav">
			<div class="sort">
				<form action="">
					Сортировка
					<select onchange="location=value">
						<option value="" selected="selected">Сортировка по имени</option>
						<option value="index.php?page=sort&id_sort=1">А-Я</option>
						<option value="index.php?page=sort&id_sort=2">Я-А</option>
					</select>

					<select onchange="location=value">
						<option value="" selected="selected">Сортировка по цене</option>
						<option value="index.php?page=sort&id_sort=3">Сначала дешевле</option>
						<option value="index.php?page=sort&id_sort=4">Сначала дороже</option>
					</select>
				</form>
			</div>
		</div>

		<div class="blockShop">
			<?php foreach ($sql as $good): ?>
				<div class="shopUnit">
					<div class="imageProd">
						<a href="index.php?page=openProduct&id=<?php echo $good['id'] ?>" class="shopUnitMore"><img  width="200px" height="200px" src="<?php echo $good['imgs']; ?>"alt=""> </a> 
					</div>
					<div class="chatacteristicsShop">
						<div class="name">
							<?php echo $good['name'] ?>
						</div>

						<div class="manufacturer">
							<?php echo $good['comp'] ?>
						</div>
						<div class="weight">
							<?php echo $good['weight'] ?>
						</div>
					</div>

					<!-- отображение цены товара -->
					<div class="price" style=" width: 100%; display:flex; justify-content: space-between;"><h4>
						<?php
						$price = $good['price'];
						echo '<a class="Price"> '.$good['price'].'₽ </a>';
						?>
					</h4>

					<div class="actionShop">
						<a href="index.php?page=openProduct&id=<?php echo $good['id'] ?>" class="shopUnitMore">Выбрать</a> 
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>		
</div>