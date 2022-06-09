<?php
	include_once("path.php");
	include_once("app/database/database.php");

	$sql = ("SELECT  id_product, name_product, description_product, price_product, image_product, products.id_category, category.name_category
	FROM products, category
	WHERE products.id_category = category.id_category and category.name_category = 'Цифровая печать'");
	$query1 = $pdo->prepare($sql);
	$query1->execute();
	dbCheckError($query1);
	$infoProduct = $query1->fetchAll();
?>
<!DOCTYPE html>
<html>
	<div class="page">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="https://fonts.googleapis.com/css?family=Montserrat:regular,500,600,700,800&display=swap" rel="stylesheet" />
		<link rel="stylesheet" href="assets/css/style.css">
		<link rel="shortcut icon" href="assets/img/mainblock/logo-icon.ico" type="image/x-icon">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<title>Цифровая печать</title>
	</head>
	<body class="">
        <?php include("app/include/header.php")?>
		<div class="productspage__header headerproducts-block">
			<div class="mt9"></div>
			<h2 class="header-block-product-page">Цифровая печать</h2>
		</div>
		<?php foreach ($infoProduct as $key => $infProducts) : ?>
			<main class="">
				<form action="digitalPrinting.php" method="post">
					<section class="">
						<div class="_container">
							<div class="product-page__body">
								<div class="product-page__column">
									<article class="item-product-page">
										<div class="item-product-page__content">
											<div>
												<h3 class="item-product-page__title"><?= $infProducts['name_product']; ?></h3>
												<h4 class="item-product-page__title">бумага 80гр.</h4>
											</div>
										</div>
										<div class="item-product-page__image _ibg1 item-product-page__image1">
											<img src="assets/img/productPage/<?= $infProducts['image_product']; ?>" alt="ПРЕДЛОЖЕНИЕ">
										</div>
									</article>
								</div>
								<div class="product-page__column">
									<div class="product-page__item item-service">
										<div class="table-responsive">
											<table class="table__products">
												<tr>
													<th class="products__th">Тираж</th>
													<th class="products__th">Стоимость</th>
													<th class="products__th">Экономия</th>
													<th class="products__th"></th>
												</tr>
												<tr>
													<td class="products__td">От 1 до 5 шт</td>
													<td class="products__td"><?= $infProducts['price_product']; ?>&#8381/шт</td>
													<td class="products__td"></td>
													<td class="products__td">
													<?php if(isset($_SESSION['id_user'])):?>
													<a href="#popup<?= $infProducts['id_product']; ?>" class="btn fourth popup-link">Заказать</a>
													<?php else:?>
													<a href="#errorMessage" class="btn fourth popup-link">Заказать</a>
													<?php endif;?>
													</td>
												</tr>
												<tr>
													<td class="products__td">От 6 до 10 шт</td>
													<td class="products__td"><?= $infProducts['price_product'] - ($infProducts['price_product'] / 100 * 10); ?>&#8381/шт</td>
													<td class="products__td">10%</td>
													<td class="products__td">
													<?php if(isset($_SESSION['id_user'])):?>
													<a href="#popup<?= $infProducts['id_product']; ?>" class="btn fourth popup-link">Заказать</a>
													<?php else:?>
													<a href="#errorMessage" class="btn fourth popup-link">Заказать</a>
													<?php endif;?>
													</td>
												</tr>
												<tr>
													<td class="products__td">От 11 до 30 шт</td>
													<td class="products__td"><?= $infProducts['price_product'] - ($infProducts['price_product'] / 100 * 20); ?>&#8381/шт</td>
													<td class="products__td">20%</td>
													<td class="products__td">
													<?php if(isset($_SESSION['id_user'])):?>
													<a href="#popup<?= $infProducts['id_product']; ?>" class="btn fourth popup-link">Заказать</a>
													<?php else:?>
													<a href="#errorMessage" class="btn fourth popup-link">Заказать</a>
													<?php endif;?>
													</td>
												</tr>
												<tr>
													<td class="products__td">От 31 до 50 шт</td>
													<td class="products__td"><?= $infProducts['price_product'] - ($infProducts['price_product'] / 100 * 30); ?>&#8381/шт</td>
													<td class="products__td">30%</td>
													<td class="products__td">
													<?php if(isset($_SESSION['id_user'])):?>
													<a href="#popup<?= $infProducts['id_product']; ?>" class="btn fourth popup-link">Заказать</a>
													<?php else:?>
													<a href="#errorMessage" class="btn fourth popup-link">Заказать</a>
													<?php endif;?>
													</td>
												</tr>
												<tr>
													<td class="products__td">От 50 до 100 шт</td>
													<td class="products__td"><?= $infProducts['price_product'] - ($infProducts['price_product'] / 100 * 40); ?>&#8381/шт</td>
													<td class="products__td">40%</td>
													<td class="products__td">
													<?php if(isset($_SESSION['id_user'])):?>
													<a href="#popup<?= $infProducts['id_product']; ?>" class="btn fourth popup-link">Заказать</a>
													<?php else:?>
													<a href="#errorMessage" class="btn fourth popup-link">Заказать</a>
													<?php endif;?>
													</td>
												</tr>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>
				</form>

			</main>
		<?php endforeach; ?>
		<?php foreach ($infoProduct as $key => $infProducts) : ?>
			<div id="popup<?= $infProducts['id_product'];?>" class="popup">
			<a href="#header" class="popup__area"></a>
				<div class="popup__body">
					<div class="popup__content">
						<form class="box" method="post" enctype="multipart/form-data">
							<div class="errorMessage">
								<h2 class="errorMessageOrder"><br></h2>
							</div>
							<p class="text">Мы свяжемся с вами по электронной почте.</p>
							<p class="text">Оплата происходит при получении товара!</p>
							<h1 class="test"><?= $infProducts['name_category']; ?></h1><br>
							<h1 class="test"><?= $infProducts['name_product']; ?></h1><br>
							<h1>Введите количество</h1>
							<input type="text" name="quantity<?= $infProducts['id_product'];?>" placeholder="введите количество">
							<h1>Описание</h1>
							<textarea class="description" type="text" name="description_order<?= $infProducts['id_product'];?>" value="" placeholder="необязательно"></textarea>
							<h1>Шаблон</h1><br>
							<input id="file<?= $infProducts['id_product'];?>" class="text" type="file" name="file<?= $infProducts['id_product'];?>">
							<p class="text">Доставка выполняется при заказе от 500руб.</p>
							<select name="" class="drop_down" id="drop_down">
								<option value="choose">Самовывоз</option>
								<option value="other">Доставка</option>
							</select>
							<input type="text" name="delivery<?= $infProducts['id_product'];?>" class="other_input" id="other" placeholder="Введите адрес" />
							<br id="otherBR" class="other_br"/>
							<input class="buttonOrder<?= $infProducts['id_product'];?>" type="submit" name="buttonOrder<?= $infProducts['id_product'];?>" value="ЗАКАЗАТЬ">
							<a  href="#" class="button__x close-popup">Назад</a>
						</form>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
        <?php include("app/include/footer.php")?>
        <script src="assets/js/script.js"></script>
		
	</body>
	</div>
