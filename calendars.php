<?php
    include_once("path.php");
	include_once("app/database/database.php");
	
	$sql = ("SELECT  id_product, name_product, description_product, price_product, image_product, products.id_category, category.name_category
	FROM products, category
	WHERE products.id_category = category.id_category and category.name_category = 'Календари'");
	$query1 = $pdo->prepare($sql);
    $query1->execute();
    dbCheckError($query1);
    $infoProduct = $query1->fetchAll();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:regular,500,600,700,800&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="assets/css/style.css">
		<link rel="shortcut icon" href="assets/img/mainblock/logo-icon.ico" type="image/x-icon">
		<title>Календари</title>
    </head>
    <body>
        <div class="wrapper">
            <?php include("app/include/header.php")?> 
            <main class="pageCalendars">
                <div class="productspage__header headerproducts-block">
					<br>
                    <h2 class="header-block-product-pageCalendars">Печать календарей</h2> 
                </div>
				<?php foreach ($infoProduct as $key => $infProducts): ?>
                <div class="product__body-calendars _cont1">
                    <div class="product__column1">
                        <article class="product__item1 item-product1">
                            <div class="item-product__content1">
                                <div>
                                    <h4 class="item-product__title"><?=$infProducts['name_product'];?></h4>
                                    <div class="item-practice__text1">
                                        1-9 шт. - <?=$infProducts['price_product'];?>&#8381/шт<br>
                                        10-19 шт. - <?=$infProducts['price_product'] - ($infProducts['price_product'] / 100 * 10);?>&#8381/шт<br>
                                        20-29 шт. - <?=$infProducts['price_product'] - ($infProducts['price_product'] / 100 * 20);?>&#8381/шт<br>
                                        30-50 шт. - <?=$infProducts['price_product'] - ($infProducts['price_product'] / 100 * 30);?>&#8381/шт<br>
                                        <br>
                                        Описание: <?=$infProducts['description_product'];?>
                                        <br>
                                        <br>
                                        <br>
										<?php if(isset($_SESSION['id_user'])):?>
                                        <a href="#popup<?= $infProducts['id_product']; ?>" class="btn fourth popup-link">Заказать</a>
                                        <?php else:?>
										<a href="#errorMessage" class="btn fourth popup-link">Заказать</a>
										<?php endif;?>
                                    </div>
                                </div>
                            </div>
                            <div href="" class="item-product__image _ibg">
                                <img src="assets/img/calendars/<?=$infProducts['image_product'];?>" alt="МИНИ">
                            </div>
                        </article>
                    </div>
				</div>
				<?php endforeach; ?>
            </main>
            <?php foreach ($infoProduct as $key => $infProducts): ?>

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
			<div class="mt5"></div>
            <?php include("app/include/footer.php")?>
        </div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<script src="assets/js/script.js"></script>
    </body>
</html>
