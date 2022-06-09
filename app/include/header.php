<?php
	include_once("path.php");
	
	if(isset($_SESSION['id_user'])){
		$personalUser = (selectAll('users', ['id_user' => $_SESSION['id_user']]));
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="https://fonts.googleapis.com/css?family=Montserrat:regular,500,600,700,800&display=swap" rel="stylesheet" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	</head>
	<div id="popupEntry" class="popup">
		<div class="popup__body">
			<div class="popup__content">
				<form class="box boxx popup-link" method="post">
					<div class="errorMessage">
						<h2 class="errorMessageEnt"><br></h2>
					</div>
					<h1>Введите email</h1>
					<input type="text" name="emailEnt" placeholder="введите email">
					<h1>Введите пароль</h1>
					<input type="password" name="password" placeholder="введите пароль">
					<input class="buttonEntry" type="submit" name="button-log" value="Войти">
					<a href="#popupRegistration" class="button__back popup-link">
						<h4 class="btnBox">Регистрация</h4>
					</a>
					<a href="index.php" class="btnBox close-popup">Назад</a>
				</form>
			</div>
		</div>
	</div>	
	<div id="popupRegistration" class="popup">
		<div class="popup__body">
			<div class="popup__content">
				<form class="box popup-link" method="post">
					<div class="errorMessage">
						<h2 class="errorMessageReg"><br></h2>
					</div>
					<h1>Введите имя*</h1>
					<input type="text" name="login" placeholder="введите имя">
					<h1>Введите email*</h1>
					<input type="text" name="emailReg" placeholder="введите email">
					<h1>Введите пароль*</h1>
					<input type="password" name="passFirst" placeholder="введите пароль">
					<h1>Повторите пароль*</h1>
					<input type="password" name="passSecond" placeholder="повторите пароль">
					<div class="checkbox">
						<input id="formAgreement" type="checkbox" name="agreement">
						<label for="formAgreement" class="form_label text"><span>Я даю согласие на обработку персональных данных в соответствии с <a href="privacyPolicy.php">условиями</a></span></label><br><br>
					</div>
					<input class="buttonReg" type="submit" name="button-reg" value="Зарегистрироваться">
					<a href="#popupEntry" class="button__back popup-link">
						<h4 class="btnBox">Войти</h4>
					</a>
					<a href="index.php" class="close-popup btnBox">Назад</a>
				</form>
			</div>
		</div>
	</div>
	<div id="popupPersonalAcc" class="popup">
		<div class="popup__body">
			<div class="popup__content">
				<?php foreach ($personalUser as $key => $personal): ?>
					<div class="box boxx" method="post">
						<div class="errorMessage">
							<h2 class="errorMessage"><br></h2>
						</div>
						<h1>Ваше имя</h1><br>
						<p><?=$personal['username'];?></p>
						<a class="btnBox popup-link" href="#redName">Изменить имя</a>
						<h1>Ваш email</h1><br>
						<p><?=$personal['email'];?></p>
						<a class="btnBox popup-link" href="#redEmail">Изменить email</a>
						<a class="btnBox popup-link" href="#redPass">Изменить пароль</a>
						<a href="index.php" class="btnBox close-popup">Назад</a>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
	<div id="redName" class="popup">
		<div class="popup__body">
			<div class="popup__content">
				<form class="box popup-link" method="post">
					<div class="errorMessage">
						<h2 class="errorMessageRedName"><br></h2>
					</div>
					<h1>Введите новое имя</h1>
					<input type="text" name="redName" placeholder="введите новое имя">
					<input class="buttonRedName" type="submit" name="buttonRedName" value="Изменить">
					<a href="#" class="btnBox close-popup">Назад</a>
				</form>
			</div>
		</div>
	</div>
	<div id="redEmail" class="popup">
		<div class="popup__body">
			<div class="popup__content">
				<form class="box popup-link" method="post">
					<div class="errorMessage">
						<h2 class="errorMessageRedEmail"><br></h2>
					</div>
					<h1>Введите новый email</h1>
					<input type="text" name="redEmail" placeholder="введите новый email">
					<input class="buttonRedEmail" type="submit" name="buttonRedEmail" value="Изменить">
					<a href="#" class="btnBox close-popup">Назад</a>
				</form>
			</div>
		</div>
	</div>
	<div id="redPass" class="popup">
		<div class="popup__body">
			<div class="popup__content">
				<form class="box" method="post">
					<div class="errorMessage">
						<h2 class="errorMessageRedPass"><br></h2>
					</div>
					<h1>Введите старый пароль</h1>
					<input type="password" name="oldPass" placeholder="введите старый пароль">
					<h1>Введите новый пароль</h1>
					<input type="password" name="newPass1" placeholder="введите новый пароль">
					<h1>Введите пароль повторно</h1>
					<input type="password" name="newPass2" placeholder="введите пароль повторно">
					<input class="buttonRedPass" type="submit" name="buttonRedPass" value="Изменить">
					<a href="#" class="btnBox close-popup">Назад</a>
				</form>
			</div>
		</div>
	</div>
	<div id="errorMessage" class="popup">
		<div class="popup__body">
			<div class="popup__content">
				<div class="box">
					<h2 class="errorMessage">Войдите или зарегистрируйтесь для оформления заказа!</h2>
					<div class="mt3"></div>
					<a href="#" class="btnBox close-popup">Назад</a>
				</div>
			</div>
		</div>
	</div>
	<header class="header">
            <div class="upward" onclick="scrollTopTop()"></div>
            <div class="header__container _container">
                <a href="<?php echo BASE_URL?>" class="header__logo">
                    <img class="logo-icon" src="assets/img/mainblock/logo-icon.svg" alt="icon">
                    ПАПИРУС
                </a>
				<div class="header__burger">
					<span></span>
				</div>
                <nav class="header__menu menu">
                    <ul class="menu__list">
                        <li class="menu__item">
                            <a href="<?php echo BASE_URL?>" class="menu__link">Главная</a>
                        </li>
                        <li class="menu__item">
                            <a href="<?php echo BASE_URL . "products.php"?>" class="menu__link">Продукция</a>
                        </li>
                        <li class="menu__item">
                            <a href=""  onclick="scrollDownDown()" class="menu__link remove-hash">Контакты</a>
                        </li>
                        <li class="menu__item">
                            <?php if(isset($_SESSION['id_user'])):?>
							<p class="menu__link header__username"><?=$personal['username'];?></p>
                            <ul class="menu__ul">
                                <?php if($_SESSION['admin']):?>
                                <li><a class="menu__link" href="<?php echo BASE_URL . "admin/admin.php"?>">Админ панель</a></li>
                                <?php endif;?>
								<li><a class="menu__link popup-link" href="#popupPersonalAcc">Личный кабинет</a></li>
								<li><a class="menu__link" href="<?php echo BASE_URL . "orders.php"?>">Заказы</a></li>
                                <li><a class="menu__link" href="<?php echo BASE_URL . "logout.php"?>">Выход</a></li>
                            </ul>
                            <?php else:?>
                            <a href="#popupEntry" class="menu__link popup-link">Войти</a>
                            <ul class="menu__ul">
                                <li><a href="#popupRegistration" class="menu__link popup-link">Зарегистрироваться</a></li>
                            </ul>
                            <?php endif;?>
                        </li>
                    </ul>
                </nav>
            </div>
			<div class="wrapper"></div>
		</header>
	<script src="../../assets/js/script.js"></script>
</html>