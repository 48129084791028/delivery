<?php
session_start();
require 'connect.php';
require 'templates/header.php';
?>
<link rel=”icon” href=”/imgs/icon.ico” type=”image/x-icon”>
<div id="content">
	<?php
	require('connect.php');

		// подключение к БД, выборка товаров
	if(!isset($_SESSION['sql'])) {
		$_SESSION['sql']="SELECT * FROM `products`";
	}
	$sql_text=$_SESSION['sql'];
	$sql=$link->query($sql_text);

	$page = $_GET['page'];

		// Главная страница
	if(!isset($page) || $page === "index"){
		require ('templates/main.php');
	} 

		// Каталог
	elseif ($page === "shop"){
		$sql=$link->query("SELECT * FROM products");
		require('templates/shop.php');
	} 

		// Категории товаров
	elseif($page=='product_cat') {
		$idg= $_GET['id_cat'];
		if($idg == 0){
			$_SESSION['sql'] = "SELECT * FROM `products`";
		} else {
			$_SESSION['sql'] = "SELECT * FROM `products` WHERE `category`= $idg";}
			$sql_text= $_SESSION['sql'];
			$sql= $link->query($sql_text);
			require ('templates/shop.php');
		}

   		// Сортировка
		elseif ($page == 'sort') {
			$idg= $_GET['id_sort'];
			if($idg == 1){
				$sql_text.=" ORDER BY `name`";
			} elseif($idg == 2){
				$sql_text.=" ORDER BY `name` DESC";
			} elseif($idg == 3){
				$sql_text.=" ORDER BY `price` ASC";
			} elseif($idg == 4){
				$sql_text.=" ORDER BY `price` DESC";
			}
			$sql= $link->query($sql_text);
			require ('templates/shop.php');
		}

	 	// Страница товара
		elseif ($page == 'openProduct') {
			$idg= $_GET['id'];
			$good = [];
			$_SESSION['sql']="SELECT * FROM `products`";
			$sql_text=$_SESSION['sql'];
			$sql=$link->query($sql_text);
			foreach ($sql as $product) {
				if($product['id'] == $idg){
					$good = $product;
					break;	
				}	
			}
			require ('templates/openProduct.php');
		}

		elseif($page=='register') {
			require ('authorization/register.php');			
		} 
		elseif($page=='login') {
			require ('authorization/login.php');				
		}  elseif($page=='profile') {
			require ('authorization/profile.php');				
		} elseif($page=='admin') {
			require ('authorization/admin.php');				
		} elseif($page=='change') {	
			require ('authorization/change.php');
		} elseif($page=='reviews') {	
			require ('authorization/reviews.php');
		} else if ($page === 'address') {
			require 'authorization/address.php';
		}

		?>
	</div>

	<?php
	require('templates/footer.php');
	?>

