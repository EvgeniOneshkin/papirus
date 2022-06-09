<?php
	include_once "path.php";
	include_once "app/database/database.php";
	
	$sql = ("SELECT products.name_product, quantity, description_order, price_order, pattern_order, created_order, delivery, name_orderStatus
	FROM orders, products, users, orderstatus
	WHERE orders.id_product = products.id_product AND orders.id_user = users.id_user AND orders.id_orderStatus = orderstatus.id_orderStatus AND users.id_user = " . $_SESSION['id_user']);
	$query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
	$ordersUser = $query->fetchAll();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:regular,500,600,700,800&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="assets/css/style.css">
		<link rel="shortcut icon" href="assets/img/mainblock/logo-icon.ico" type="image/x-icon">
		<title>Заказы</title>
    </head>
    <body>
        <div class="wrapper">
            <?php include("app/include/header.php")?>
            <main class="pageOrders">
                <div class="productspage__header headerproducts-block">
				<div class="main-block__container _container">
					<div class="mt9"></d>
					
                    <h2 class="header-block-product-page">Ваши заказы</h2>
                </div>
                <section>
					<div class="order-users">
						<div class="">
							<div class="table-responsive__order">
								<?php foreach ($ordersUser as $key => $order): ?>
									<table class="table-orders">
										<tr class="table-orders__title">
											<th class="table-orders__th">Название продукта</th>
											<th class="table-orders__th">Количество</th>
											<th class="table-orders__th">Описание</th>
											<th class="table-orders__th">Цена</th>
											<th class="table-orders__th">Шаблон</th>
											<th class="table-orders__th">Способ получения</th>
											<th class="table-orders__th">Статус заказа</th>
											<th class="table-orders__th">Дата заказа</th>
										</tr>
										<tr class="table-orders__text">
											<td class="table-orders__td"><a href="#popupinf<?=$order['name_product'];?>" class="popup-link link__download"><div class="table-orders__hiding"><?=$order['name_product'];?></div></a></td>
											<td class="table-orders__td"><a href="#popupinf<?=$order['quantity'];?>" class="popup-link link__download"><div class="table-orders__hiding"><?=$order['quantity'];?></div></a></td>
											<td class="table-orders__td"><a href="#popupinf<?=$order['description_order'];?>" class="popup-link link__download"><div class="table-orders__hiding"><?=$order['description_order'];?></div></a></td>
											<td class="table-orders__td"><a href="#popupinf<?=$order['price_order'];?>" class="popup-link link__download"><div class="table-orders__hiding"><?=$order['price_order'];?>&#8381</div></a></td>
											<td class="table-orders__td"><a href="#popupinf<?=$order['pattern_order'];?>" class="popup-link link__download">
												<div class="table-orders__hiding">
													<?=$order['pattern_order'];?>
												</div>
												<br>
												<a href="<?php
												if($order['pattern_order'] === ''){
													echo '';
												}
												else{
													echo 'assets/img/download/' . $order['pattern_order'];
												}
												?>" class="table-orders__hiding link__download" download="<?php
												if($order['pattern_order'] === ''){
													echo '';
												}
												else{
													echo 'assets/img/download/' . $order['pattern_order'];
												}
												?>">
													<?php
												if($order['pattern_order'] === ''){
													echo '';
												}
												else{
													echo 'Скачать';
												}
												?>
												</a>
											</a>
											</td>
											<td class="table-orders__td"><a href="#popupinf<?=$order['delivery'];?>" class="popup-link link__download"><div class="table-orders__hiding"><?=$order['delivery'];?></div></a></td>
											<td class="table-orders__td"><a href="#popupinf<?=$order['name_orderStatus'];?>" class="popup-link link__download"><div class="table-orders__hiding"><?=$order['name_orderStatus'];?></div></a></td>
											<td class="table-orders__td"><a href="#popupinf<?=$order['created_order'];?>" class="popup-link link__download"><div class="table-orders__hiding"><?=$order['created_order'];?></div></a></td>
										</tr>
									</table>
								<?php endforeach; ?>
							</div>
						</div>
					</div>
				</section>
				<?php foreach ($ordersUser as $key => $order): ?>
				<div id="popupinf<?=$order['name_product'];?>" class="popup">
					<div class="popup__body">
						<div class="popup__content">
							<div class="box">
								<h1>Имя продукта:</h1>
								<div class="mt3"></div>
								<h1><?=$order['name_product'];?></h1>
								<div class="mt3"></div>
								<a href="#" class="button__x close-popup">Назад</a>
							</div>
						</div>
					</div>
				</div>
				<div id="popupinf<?=$order['quantity'];?>" class="popup">
					<div class="popup__body">
						<div class="popup__content">
							<div class="box">
							<h1>Количество:</h1>
								<div class="mt3"></div>
								<h1><?=$order['quantity'];?></h1>
								<div class="mt3"></div>
								<a href="#" class="button__x close-popup">Назад</a>
							</div>
						</div>
					</div>
				</div>
				<div id="popupinf<?=$order['description_order'];?>" class="popup">
					<div class="popup__body">
						<div class="popup__content">
							<div class="box">
								<h1>Описание:</h1>
								<div class="mt3"></div>
								<h1><?=$order['description_order'];?></h1>
								<div class="mt3"></div>
								<a href="#" class="button__x close-popup">Назад</a>
							</div>
						</div>
					</div>
				</div>
				<div id="popupinf<?=$order['price_order'];?>" class="popup">
					<div class="popup__body">
						<div class="popup__content">
							<div class="box">
								<h1>Цена:</h1>
								<div class="mt3"></div>
								<h1><?=$order['price_order'];?>&nbsp руб.</h1>
								<div class="mt3"></div>
								<a href="#" class="button__x close-popup">Назад</a>
							</div>
						</div>
					</div>
				</div>
				<div id="popupinf<?=$order['pattern_order'];?>" class="popup">
					<div class="popup__body">
						<div class="popup__content">
							<div class="box">
								<h1>Шаблон:</h1>
								<div class="mt3"></div>
								<h1><?=$order['pattern_order'];?></h1>
								<div class="mt3"></div>
								<a href="#" class="button__x close-popup">Назад</a>
							</div>
						</div>
					</div>
				</div>
				<div id="popupinf<?=$order['delivery'];?>" class="popup">
					<div class="popup__body">
						<div class="popup__content">
							<div class="box">
								<h1>Способ получения:</h1>
								<div class="mt3"></div>
								<h1><?=$order['delivery'];?></h1>
								<div class="mt3"></div>
								<a href="#" class="button__x close-popup">Назад</a>
							</div>
						</div>
					</div>
				</div>
				<div id="popupinf<?=$order['created_order'];?>" class="popup">
					<div class="popup__body">
						<div class="popup__content">
							<div class="box">
								<h1>Дата заказа:</h1>
								<div class="mt3"></div>
								<h1><?=$order['created_order'];?></h1>
								<div class="mt3"></div>
								<a href="#" class="button__x close-popup">Назад</a>
							</div>
						</div>
					</div>
				</div>
				<div id="popupinf<?=$order['name_orderStatus'];?>" class="popup">
					<div class="popup__body">
						<div class="popup__content">
							<div class="box">
								<h1>Статус заказа:</h1>
								<div class="mt3"></div>
								<h1><?=$order['name_orderStatus'];?></h1>
								<div class="mt3"></div>
								<a href="#" class="button__x close-popup">Назад</a>
							</div>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
            </main>
			<div class="mt9"></div>
            <?php include("app/include/footer.php")?>
        </div>
        <script src="assets/js/script.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    </body>
</html>
