<!DOCTYPE html>
<html lang="ru">
<head>
    
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@100;300;400;500;700;800;900&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="styles/footer.css">
	<link rel="stylesheet" type="text/css" href="styles/header.css">
	<link rel="stylesheet" type="text/css" href="styles/main.css">
	<link rel="stylesheet" type="text/css" href="styles/page.css">
	<link rel="stylesheet" type="text/css" href="styles/shop.css">
	<link rel="stylesheet" type="text/css" href="styles/openProduct.css">
	<link rel="stylesheet" type="text/css" href="authorization/css/main.css">
	<script src="https://kit.fontawesome.com/2239b16057.js" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
	<script src="scripts/basket.js"></script>
	<script src="scripts/jquery.js"></script>
	<script src="scripts/site.js"></script>
	<link rel="stylesheet" href="styles/basket.css">
	<script
	src="https://code.jquery.com/jquery-3.6.0.js"></script>
	
	<link rel="shortcut icon" href="/imgs/icon.ico" type="image/x-icon">
	
	<script>
		$(document).ready(function(){
			$('#icon').click(function(){
				$('ul').toggleClass('show');
			});
		});
	</script>
	<title>PopFood</title>
</head>
<body>
	<nav>
		<a class="navbar-brand" href="index.php?page=index"><img src="imgs/logo1.jpg" alt=" " class="d-inline-block align-text-bottom "></a>
		<ul>
			<li><a class="headerA" href="index.php?page=index"><i class="iconNav fa-solid fa-house"></i>Главная</a></li>
			<li><a class="headerA" href="index.php?page=shop"><i class="iconNav fa-solid fa-shop"></i>Меню</a></li>
			<li><a class="headerA" href="#openModal"> <i class="iconNav fa-solid fa-basket-shopping"></i> Корзина</a></li>
			<li><a class="headerA" href="index.php?page=login"><i class="iconNav fa-solid fa-user"></i>Личный Кабинет</a></li>
		</ul>
		<label id="icon">
			<i class="fas fa-bars"></i>
		</label>
	</nav>