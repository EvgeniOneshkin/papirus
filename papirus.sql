-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Июн 09 2022 г., 20:17
-- Версия сервера: 8.0.29
-- Версия PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `papirus`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id_category` int NOT NULL,
  `name_category` varchar(120) CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  `linkCategory` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image_category` varchar(120) CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  `id_mainCategory` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id_category`, `name_category`, `linkCategory`, `image_category`, `id_mainCategory`) VALUES
(1, 'Цифровая печать', 'digitalPrinting', 'polygraphy/01.jpg', 1),
(2, 'Визитки', 'visitCards', 'polygraphy/02.jpg', 1),
(3, 'Листовки и буклеты', 'flyers', 'polygraphy/03.jpg', 1),
(4, 'Календари', 'calendars', 'polygraphy/04.jpg', 1),
(5, 'Брошюры, каталоги', 'brochures', 'polygraphy/05.jpg', 1),
(6, 'Блокноты', 'notebooks', 'polygraphy/06.jpg', 1),
(7, 'Наклейки', 'stickers', 'polygraphy/07.jpg', 1),
(8, 'Грамоты, сертификаты', 'certificates', 'polygraphy/08.jpg', 1),
(9, 'Открытки', 'postcards', 'polygraphy/09.jpg', 1),
(10, 'Кружки', 'cups', 'souvenir/01.jpg', 2),
(11, 'Футболки', 'tshirts', 'souvenir/02.jpg', 2),
(12, 'Толстовки, свитшоты', 'hoodies', 'souvenir/03.jpg', 2),
(13, 'Бейсболки', 'baseballСap', 'souvenir/04.jpg', 2),
(14, 'Подушки', 'pillows', 'souvenir/05.jpg', 2),
(15, 'Пазлы', 'puzzles', 'souvenir/06.jpg', 2),
(16, 'Тарелки', 'plates', 'souvenir/07.jpg', 2),
(17, 'Магниты', 'magnets', 'souvenir/08.jpg', 2),
(18, 'Чехлы для телефонов', 'phoneCases', 'souvenir/09.jpg', 2),
(19, 'Печать на баннере', 'banners', 'largeFormat/01.jpg', 3),
(20, 'Печать на плёнке', 'tapes', 'largeFormat/02.jpg', 3),
(21, 'Плакаты, постеры', 'posters', 'largeFormat/03.jpg', 3),
(22, 'Таблички, стенды', 'stands', 'largeFormat/04.jpg', 3),
(23, 'Штендеры', 'pillars', 'largeFormat/05.jpg', 3),
(24, 'Транспаранты', 'constrictions', 'largeFormat/06.jpg', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `maincategory`
--

CREATE TABLE `maincategory` (
  `id_mainCategory` int NOT NULL,
  `name_mainCategory` varchar(120) CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  `image_mainCategory` varchar(120) CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  `link_nameCategory` varchar(120) CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `maincategory`
--

INSERT INTO `maincategory` (`id_mainCategory`, `name_mainCategory`, `image_mainCategory`, `link_nameCategory`) VALUES
(1, 'Полиграфия', 'products/01.jpg', 'polygraphy'),
(2, 'Сувенирная печать', 'products/02.jpg', 'souvenir'),
(3, 'Широкоформатная печать', 'products/03.jpg', 'largeFormat');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id_order` int NOT NULL,
  `quantity` int NOT NULL,
  `description_order` mediumtext CHARACTER SET utf8mb3 COLLATE utf8_general_ci,
  `price_order` int NOT NULL,
  `pattern_order` varchar(120) CHARACTER SET utf8mb3 COLLATE utf8_general_ci DEFAULT NULL,
  `delivery` varchar(120) CHARACTER SET utf8mb3 COLLATE utf8_general_ci DEFAULT NULL,
  `created_order` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_user` int NOT NULL,
  `id_product` int NOT NULL,
  `id_orderStatus` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id_order`, `quantity`, `description_order`, `price_order`, `pattern_order`, `delivery`, `created_order`, `id_user`, `id_product`, `id_orderStatus`) VALUES
(168, 57, 'Необходимо распечатать шаблон в цветном формате.', 1197, '7_1654805280_ГОТОВЫЙ ОТЧЕТ КУРСОВОЙ РАБОТЫ.08.06.2022.pdf', 'Самовывоз', '2022-06-09 20:08:00', 7, 1, 6),
(169, 150, 'Черный фон, белый текст', 630, '', 'Труда 34а 52', '2022-06-09 20:09:36', 7, 6, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `orderstatus`
--

CREATE TABLE `orderstatus` (
  `id_orderStatus` int NOT NULL,
  `name_orderStatus` varchar(120) CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `orderstatus`
--

INSERT INTO `orderstatus` (`id_orderStatus`, `name_orderStatus`) VALUES
(1, 'В обработке'),
(2, 'Ожидает отправки'),
(3, 'Передан в служду доставки'),
(4, 'Готов к получению'),
(5, 'Возврат'),
(6, 'Успешно'),
(7, 'Отменен');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id_product` int NOT NULL,
  `name_product` varchar(120) CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  `description_product` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8_general_ci DEFAULT NULL,
  `price_product` int NOT NULL,
  `image_product` varchar(120) CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  `id_category` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id_product`, `name_product`, `description_product`, `price_product`, `image_product`, `id_category`) VALUES
(1, 'Печать А4', NULL, 35, '01.jpg', 1),
(2, 'Печать А3', NULL, 60, '02.jpg', 1),
(3, 'МИНИ', 'Цветной постер А4, календарные блоки.', 270, '01.jpg', 4),
(4, 'МИДИ', 'Цветной постер А4, 1 рекламное поле, календарные блоки.', 310, '02.jpg', 4),
(5, 'МАКСИ', 'Цветной постер А4, 3 рекламных поля, календарные блоки.', 340, '03.jpg', 4),
(6, 'КАРМАННЫЕ', 'Формат 100х70 мм, бумага 300 гр., 2-х сторонняя ламинация на выбор.', 7, '04.jpg', 4),
(7, 'ДОМИКИ', 'Цифровая печать 4+0, бумага 200 г/м2 - 12 листов, пружина металл, формат А4.', 370, '05.jpg', 4),
(8, 'ПЕРЕКИДНЫЕ А4', 'Цифровая печать 4+0, бумага 200 г/м2 - 12 листов, пружина металл, ригель, формат А4.', 320, '06.jpg', 4),
(9, 'ПЕРЕКИДНЫЕ А3', 'Цифровая печать 4+0, бумага 200 г/м2 - 12 листов, пружина металл, ригель, формат А3.', 467, '07.jpg', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_user` int NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  `created_user` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_user`, `admin`, `username`, `email`, `password`, `created_user`) VALUES
(7, 0, 'root', 'root@mail.ru', '$2y$10$46JMkJNj6tPb1dbc/J2c/.lLpfLjrDDR/3aeUhKqivyIF.cldePw.', '2022-06-08 19:14:36');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`),
  ADD KEY `id_mainCategory` (`id_mainCategory`);

--
-- Индексы таблицы `maincategory`
--
ALTER TABLE `maincategory`
  ADD PRIMARY KEY (`id_mainCategory`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_orderStatus` (`id_orderStatus`);

--
-- Индексы таблицы `orderstatus`
--
ALTER TABLE `orderstatus`
  ADD PRIMARY KEY (`id_orderStatus`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `id_category` (`id_category`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `maincategory`
--
ALTER TABLE `maincategory`
  MODIFY `id_mainCategory` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT для таблицы `orderstatus`
--
ALTER TABLE `orderstatus`
  MODIFY `id_orderStatus` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`id_mainCategory`) REFERENCES `maincategory` (`id_mainCategory`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`id_orderStatus`) REFERENCES `orderstatus` (`id_orderStatus`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
