<?php
	include_once("path.php");
	include_once("app/database/database.php");
	
	$sql = ("SELECT * FROM category, maincategory WHERE category.id_mainCategory = maincategory.id_mainCategory and maincategory.name_mainCategory = 'Сувенирная печать'");
	$query = $pdo->prepare($sql);
	$query->execute();
	dbCheckError($query);
	$souvenir = $query->fetchAll();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:regular,500,600,700,800&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="assets/css/style.css">
		<link rel="shortcut icon" href="assets/img/mainblock/logo-icon.ico" type="image/x-icon">
		<title>Сувенирная печать</title>
    </head>
    <body>
        <div class="wrapper">
            <?php include("app/include/header.php")?> 
            <main class="pageCategory">
				<div class="mt9"></div>
				<?php foreach ($souvenir as $key => $category): ?>
                <a href="<?=$category['linkCategory'];?>.php" class="link__download">
					<div class="product__body1 _cont1">
						<div class="product__column1">
							<article class="product__item1 item-product1">
								<div class="item-product__content1">
									<div>
										<h4 class="item-product__title"><?=$category['name_category'];?></h4>
									</div>
								</div>
								<div class="item-product__image _ibg">
									<img src="assets/img/<?=$category['image_category'];?>" alt="<?=$category['name_category'];?>">
								</div>
							</article>
						</div>
					</div>
				</a>
				<?php endforeach; ?>
            </main>
			<div class="mt5"></div>
            <?php include("app/include/footer.php")?>
        </div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<script src="assets/js/script.js"></script>
    </body>
</html>
