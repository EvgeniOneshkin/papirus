<?php
	include_once("path.php");
	include_once("app/database/database.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="https://fonts.googleapis.com/css?family=Montserrat:regular,500,600,700,800&display=swap" rel="stylesheet" />
		<link rel="stylesheet" href="assets/css/style.css">
		<link rel="shortcut icon" href="assets/img/mainblock/logo-icon.ico" type="image/x-icon">
		<title>Папирус</title>
	</head>
	<body>
		<div class="wrapper">
			<?php include("app/include/header.php");?>
			<main class="page__index">
				<div class="page__main-block main-block">
					<div class="main-block__container _container">
					<div class="mt9"><br></div>
						<div class="main-block__body">
							<h1 class="main-block__title _anim-items _anim-no-hide">О компании</h1>
							<div class="main-block__text _anim-items _anim-no-hide">
								К любым, даже небольшим заказам, мы стараемся найти творческий подход: разработать оригинальный дизайн, выбрать оптимальный метод печати и отделки, помочь заказчику сэкономить. 
							</div>
							<div class="main-block__buttons _anim-items _anim-no-hide">
								<a href="products.php" class="main-block__button main-block__button_orange">Услуги</a>
							</div>
						</div>
					</div>
					<div class="main-block__image _ibg">
						<img src="assets/img/mainblock/cover.jpg" alt="cover">
					</div>
				</div>
				<section class="page__services services">
					<div class="services__container _container">
						<div class="services__body">
							<div class="services__column">
								<div class="services__item item-service">
									<div class="item-service__icon"><img src="assets/img/services/01.svg" alt="Клиентоориентированность"></div>
									<h3 class="item-service__title">Направленность
										на клиента</h3>
									<div class="item-service__text">Всегда поможем грамотным советом. </div>
								</div>
							</div>
							<div class="services__column">
								<div class="services__item item-service">
									<div class="item-service__icon"><img src="assets/img/services/02.svg" alt="Качественные материалы"></div>
									<h3 class="item-service__title">Качественные материалы</h3>
									<div class="item-service__text">Мы не экономим на расходниках, используем только проверенные бренды. </div>
								</div>
							</div>
							<div class="services__column">
								<div class="services__item item-service item-service_green">
									<div class="item-service__icon"><img src="assets/img/services/03.svg" alt="Сроки"></div>
									<h3 class="item-service__title">Сроки</h3>
									<div class="item-service__text">Изготовление продукции от 1 дня</div>
								</div>
							</div>
						</div>
					</div>
				</section>
				</section>
				<section class="page__practice practice">
					<div class="practice__container _container">
						<div class="practice__header header-block">
							<h2 class="header-block__title">Как мы работаем?</h2>
							<div class="header-block__sub-title">
								Каждый заказ - это последовательность процессов, выполняемых по определенным правилам.<br>Ознакомьтесь с каждым этапом, чтобы сделать взаимодействие понятным и эффективным.
							</div>
						</div>
						<div class="practice__body">
							<div class="practice__column">
								<article class="practice__item item-practice">
									<div class="item-practice__content">
										<div href="" class="item-practice__link">
											<h4 class="item-practice__title">Этап 1</h4>
											<h4 class="item-practice__title">ПРЕДЛОЖЕНИЕ</h4>
										</div>
										<div class="item-practice__text">
											Выясняем стоящие перед Вами задачи, обсуждаем сроки изготовления и нюансы, подготавливаем коммерческое предложение.
										</div>
									</div>
									<div class="item-practice__image _ibg">
										<img src="assets/img/practice/01.jpg" alt="ПРЕДЛОЖЕНИЕ">
									</div>
								</article>
							</div>
							<div class="practice__column">
								<article class="practice__item item-practice">
									<div class="item-practice__content">
										<div class="item-practice__link">
											<h4 class="item-practice__title">Этап 2</h4>
											<h4 class="item-practice__title">ЗАДАНИЕ</h4>
										</div>
										<div class="item-practice__text">
											Формируем техническое задание, подготавливаем пробный экземпляр, бронируем ресурсы для изготовления продукции.
										</div>
									</div>
									<div href="" class="item-practice__image _ibg">
										<img src="assets/img/practice/02.jpg" alt="ЗАДАНИЕ">
									</div>
								</article>
							</div>
							<div class="practice__column">
								<article class="practice__item item-practice">
									<div class="item-practice__content">
										<div class="item-practice__link">
											<h4 class="item-practice__title">Этап 3</h4>
											<h4 class="item-practice__title">ОПЛАТА</h4>
										</div>
										<div class="item-practice__text">
											В стандартной ситуации для запуска заказа в работу требуется 100% предоплата. Иной порядок может быть согласован в договоре.
										</div>
									</div>
									<div href="" class="item-practice__image _ibg">
										<img src="assets/img/practice/03.jpg" alt="ОПЛАТА">
									</div>
								</article>
							</div>
							<div class="practice__column">
								<article class="practice__item item-practice">
									<div class="item-practice__content">
										<div href="" class="item-practice__link">
											<h4 class="item-practice__title">Этап 4</h4>
											<h4 class="item-practice__title">ПРОИЗВОДСТВО</h4>
										</div>
										<div class="item-practice__text">
											На данном этапе не рекомендуется вносить изменения в заказ. В противном случае могут быть увеличены сроки производства.
										</div>
									</div>
									<div href="" class="item-practice__image _ibg">
										<img src="assets/img/practice/04.jpg" alt="ПРОИЗВОДСТВО">
									</div>
								</article>
							</div>
							<div class="practice__column">
								<article class="practice__item item-practice">
									<div class="item-practice__content">
										<div href="" class="item-practice__link">
											<h4 class="item-practice__title">Этап 5</h4>
											<h4 class="item-practice__title">ДОСТАВКА</h4>
										</div>
										<div class="item-practice__text">
											Готовый заказ можно забрать самостоятельно из нашего офиса в течение 7 дней или заказать курьерскую доставку в удобное для Вас время.
										</div>
									</div>
									<div href="" class="item-practice__image _ibg">
										<img src="assets/img/practice/05.jpg" alt="ДОСТАВКА">
									</div>
								</article>
							</div>
							<div class="practice__column">
								<article class="practice__item item-practice">
									<div class="item-practice__content">
										<div href="" class="item-practice__link">
											<h4 class="item-practice__title">Этап 6</h4>
											<h4 class="item-practice__title">ДОКУМЕНТЫ</h4>
										</div>
										<div class="item-practice__text">
										При получении заказа необходимо подписать закрывающие документы. Для этого необходимо иметь доверенность или печать.
										</div>
									</div>
									<div href="" class="item-practice__image _ibg">
										<img src="assets/img/practice/06.jpg" alt="ДОКУМЕНТЫ">
									</div>
								</article>
							</div>
						</div>
					</div>
				</section>
				<section class="page__whoweare whoweare">
					<div class="whoweare__container _container">
						<div class="whoweare__header header-block">
							<h2 class="header-block__title">Отличная типография в Челябинске</h2>
							<div class="header-block__sub-title">
								Компания Папирус - это современная экспресс типография в Челябинске, которая предалгает широкий спектр полиграфических услуг. Здесь можно заказать изготовление и печать рекламных и деловых материалов, от визиток и лаферов до каталогов и сертификатов. Мы предлагаем выгодные условия как для частных лиц и компания, заказывающих недорогую печатную продукцию, так и для клиентов, которым необходима полиграфия премиум-класса. Оформить заказ можно и на штучное производство, и на выпуск большого тиража.
							</div>
						</div>
						<div class="whoweare__body">
							<div class="whoweare__content">
								<div class="whoweare__top">
									<h2 class="whoweare__title">Преимущества полиграфии Папирус</h2>
									<div class="whoweare__text">Наш центр успешно работает на рынке полиграфических услуг с 2002 года, <br> и за это время мы накопили солидный опыт по изготовлению любых объемов печатных материалов, <br> реализации самых сложных проектов. Обращаясь к нам, вы оцените следующие плюсы сотрудничества:</div>
								</div>
								<div class="whoweare__items">
									<div class="whoweare__item item-whoweare">
										<div class="item-whoweare__icon">
											<img src="assets/img/whoweare/icons/01.svg" alt="">
										</div>
										<div class="item-whoweare__body">
											<div class="item-whoweare__title">Хорошее качество продукции.</div>
											<div class="header-block__sub-title">Мы используем импортное оборудование, обеспечивающее прекрасную контрастность <br> и четкость при печати, отсутствие искажений и дефектов. Качество нашей продукции <br> подтверждает лучший рейтинг среди типографий Екатеринбурга на основе более чем <br> 50 положительных отзывов от реальных клиентов.</div>
										</div>
									</div>
									<div class="whoweare__item item-whoweare">
										<div class="item-whoweare__icon">
											<img src="assets/img/whoweare/icons/01.svg" alt="">
										</div>
										<div class="item-whoweare__body">
											<div class="item-whoweare__title">Изготовление любых объемов.</div>
											<div class="header-block__sub-title">У нас доступно как поштучное, так и многотиражное производство.</div>
										</div>
									</div>
									<div class="whoweare__item item-whoweare">
										<div class="item-whoweare__icon">
											<img src="assets/img/whoweare/icons/01.svg" alt="">
										</div>
										<div class="item-whoweare__body">
											<div class="item-whoweare__title">Огромный выбор форм печати.</div>
											<div class="header-block__sub-title">Вы можете заказать листовки, календари, плакаты, наклейки, ярлыки, блокноты и десятки <br> других видов полиграфических товаров.</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
				</section>
				<section class="page__getintouch getintouch">
					<div class="getintouch__container _container">
						<div class="getintouch__header header-block">
							<h2 class="header-block__title">Как с нами связаться</h2>
							<div class="header-block__sub-title">
								Вы можете связаться с нами по пследующим контактам
							</div>
						</div>
						<div class="getintouch__items">
							<div class="getintouch__item item-getintouch">
								<div class="item-getintouch__icon">
									<img src="assets/img/getintouch/01.svg" alt="getintouch">
								</div>
								<div class="item-getintouch__emails">
									<div id="copytext1" class="item-getintouch__email" >+7(351)2‒646‒346</div>
								</div>
								<button onclick="copytext('#copytext1')" class="item-getintouch__button">Скопировать</button>
							</div>
							<div class="getintouch__item item-getintouch item-getintouch_active">
								<div class="item-getintouch__icon">
									<img src="assets/img/getintouch/02.svg" alt="getintouch">
								</div>
								<div class="item-getintouch__emails">
									<div id="copytext2" class="item-getintouch__email">Энтузиастов, 2; ​19 офис;<br>1 этаж; Центральный район,<br>Челябинск, 454080</div>
								</div>
								<button onclick="copytext('#copytext2')" class="item-getintouch__button">Скопировать</button>
							</div>
							<div class="getintouch__item item-getintouch">
								<div class="item-getintouch__icon">
									<img src="assets/img/getintouch/03.svg" alt="getintouch">
								</div>
								<div class="item-getintouch__emails">
									<a href="mailto:npopapirus@gmail.com" id="copytext3" class="item-getintouch__email">npopapirus@gmail.com</a>
								</div>
								<button onclick="copytext('#copytext3')" class="item-getintouch__button">Скопировать</button>
							</div>
						</div>
					</div>
				</section>
		</div>
			</main>
			<?php include("app/include/footer.php");?>
		</div>
		<script src="assets/js/script.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	</body>
</html>