-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 27 2022 г., 15:55
-- Версия сервера: 8.0.24
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `delivery`
--

-- --------------------------------------------------------

--
-- Структура таблицы `address`
--

CREATE TABLE `address` (
  `id` int NOT NULL,
  `id_user` int NOT NULL,
  `name_adr` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `address`
--

INSERT INTO `address` (`id`, `id_user`, `name_adr`, `address`) VALUES
(5, 25, 'вфцв', 'цфвцф'),
(6, 25, 'jtyjtyj', 'thrtjtyj'),
(7, 25, '4124214', '144124'),
(8, 27, 'egor', 'egogogogogoog'),
(9, 27, 'eeeeee', 'eeeeeeeeee');

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE `basket` (
  `id` int NOT NULL,
  `id_user` int NOT NULL,
  `id_product` int NOT NULL,
  `number_product` int NOT NULL,
  `id_status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `basket`
--

INSERT INTO `basket` (`id`, `id_user`, `id_product`, `number_product`, `id_status`) VALUES
(31, 25, 2, 1, 2),
(32, 25, 3, 2, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`) VALUES
(1, 'Роллы', 'imgs\\cat1.png'),
(2, 'Пицца', 'imgs\\cat2.png'),
(3, 'Напитки', 'imgs\\cat3.png');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(120) NOT NULL,
  `category` int NOT NULL,
  `comp` varchar(200) NOT NULL,
  `imgs` varchar(20) NOT NULL,
  `price` int NOT NULL,
  `weight` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `comp`, `imgs`, `price`, `weight`) VALUES
(1, 'Фудзияма\r\n', 1, 'Рис, лосось, кунжут, сыр, огурец, икра лососевая', 'imgs\\01.jpg', 380, '265 г.'),
(2, 'Аризона', 1, 'Рис, кунжут, снежный краб, огурец, сыр сливочный', 'imgs\\02.jpg', 275, '265 г.'),
(3, 'Филадельфия с огурцом', 1, 'Рис, лосось, огурец, сыр сливочный', 'imgs\\03.jpg', 335, '250 г.'),
(4, 'Горячий ролл Маэстро', 1, 'Рис, тигровые креветки, сыр сливочный, помидор, огурец', 'imgs\\04.jpg', 365, '330 г.'),
(5, 'Канада', 1, 'Рис, сыр сливочный, огурец, угорь', 'imgs\\05.jpg', 370, '265 г.'),
(6, 'Горячий ролл Филадельфия хот', 1, 'Рис, лосось, сыр сливочный, огурец', 'imgs\\06.jpg', 360, '330 г.'),
(7, 'Бонито', 1, 'Рис, сыр, огурец, угорь, тунцовая стружка, соус унаги', 'imgs\\07.jpg', 340, '260 г.'),
(8, 'Горячий ролл Майами', 1, '5 шт. угорь, сыр, огурец, рис\r\n5 шт. бекон, сыр, огурец, рис', 'imgs\\08.jpg', 370, '330 г.'),
(9, 'ролл Калифорния', 1, 'Рис, огурец, сыр сливочный, креветка, снежный краб, нори', 'imgs\\09.jpg', 360, '250 г.'),
(10, 'Эби чиз', 1, 'Рис, креветка, сыр сливочный, огурец', 'imgs\\010.jpg', 320, '260 г.'),
(11, 'Соевый соус', 1, '', 'imgs\\011.jpg', 10, ''),
(12, 'Васаби', 1, '', 'imgs\\012.jpg', 7, ''),
(13, 'Имбирь', 1, '', 'imgs\\013.jpg', 10, ''),
(14, 'Карбонара', 2, 'Бекон, сыры чеддер и пармезан, моцарелла, томаты, красный лук, чеснок, соус альфредо, итальянские травы', 'imgs\\11.jpg', 719, '630 г.'),
(15, 'Овощи и грибы', 2, 'Шампиньоны, томаты, сладкий перец, красный лук, кубики брынзы, моцарелла, томатный соус, итальянские травы', 'imgs\\12.jpg', 629, '670 г.'),
(16, 'Ветчина и сыр', 2, 'Ветчина, моцарелла, соус альфредо', 'imgs\\13.jpg', 479, '470 г.'),
(17, 'Пепперони', 2, 'Пикантная пепперони, увеличенная порция моцареллы, томатный соус', 'imgs\\14.jpg', 629, '580 г.'),
(18, 'Гавайская', 2, 'Ветчина, ананасы, моцарелла, томатный соус', 'imgs\\15.jpg', 629, '650 г.'),
(19, 'Четыре сыра', 2, 'Сыр блю чиз, сыры чеддер и пармезан, моцарелла, соус альфредо', 'imgs\\16.jpg', 719, '570 г.'),
(20, 'Двойной цыпленок', 2, 'Цыпленок, моцарелла, соус альфредо', 'imgs\\17.jpg', 479, '540 г.'),
(21, 'Маргарита', 2, 'Увеличенная порция моцареллы, томаты, итальянские травы, томатный соус', 'imgs\\18.jpg', 529, '640 г.'),
(22, 'Ветчина и грибы', 2, 'Ветчина, шампиньоны, увеличенная порция моцареллы, томатный соус', 'imgs\\19.jpg', 529, '620 г.'),
(23, 'Газированный напиток Sprite ', 3, '', 'imgs\\21.jpg', 100, '0.5 л.'),
(24, 'Чай Lipton', 3, '', 'imgs\\22.jpg', 100, '0.5 л.'),
(25, 'Газированный напиток Pepsi', 3, '', 'imgs\\23.jpg', 100, '0.5 л.');

-- --------------------------------------------------------

--
-- Структура таблицы `review`
--

CREATE TABLE `review` (
  `id` int NOT NULL,
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `text_review` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Структура таблицы `status`
--

CREATE TABLE `status` (
  `id` int NOT NULL,
  `status` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `status`
--

INSERT INTO `status` (`id`, `status`) VALUES
(1, 'принят'),
(2, 'готовят'),
(3, 'в доставке'),
(4, 'доставлен');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `login` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `role` tinyint(1) DEFAULT '0',
  `id_addr` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `login`, `email`, `password`, `phone`, `role`, `id_addr`) VALUES
(25, 'Igor Prigari', 'igor', 'igorprigarin2002@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '89527717069', NULL, NULL),
(26, 'admin', 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'admin', 1, 7),
(27, 'egor', 'egor', 'egor@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '12412449494', NULL, 8);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `address`
--
ALTER TABLE `address`
ADD PRIMARY KEY (`id`),
ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
ADD PRIMARY KEY (`id`),
ADD KEY `id_product` (`id_product`),
ADD KEY `id_user` (`id_user`),
ADD KEY `status` (`id_status`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
ADD PRIMARY KEY (`id`),
ADD KEY `category` (`category`);

--
-- Индексы таблицы `review`
--
ALTER TABLE `review`
ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `status`
--
ALTER TABLE `status`
ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
ADD PRIMARY KEY (`id`),
ADD KEY `id_addr` (`id_addr`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `address`
--
ALTER TABLE `address`
MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `basket`
--
ALTER TABLE `basket`
MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `review`
--
ALTER TABLE `review`
MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `status`
--
ALTER TABLE `status`
MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `address`
--
ALTER TABLE `address`
ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `basket`
--
ALTER TABLE `basket`
ADD CONSTRAINT `basket_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`),
ADD CONSTRAINT `basket_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
ADD CONSTRAINT `basket_ibfk_3` FOREIGN KEY (`id_status`) REFERENCES `status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_addr`) REFERENCES `address` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
