-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 08 2022 г., 19:14
-- Версия сервера: 5.7.29-log
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `garden`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `url` varchar(100) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `url`, `name`) VALUES
(1, '../web/image/1648211087_category.jpg', 'Рассада');

-- --------------------------------------------------------

--
-- Структура таблицы `completed_order`
--

CREATE TABLE `completed_order` (
  `id` int(11) NOT NULL,
  `id_payment` int(5) NOT NULL,
  `id_shop` int(5) NOT NULL,
  `total_price` int(10) NOT NULL,
  `name_user` text NOT NULL,
  `surname_user` text NOT NULL,
  `date` datetime NOT NULL,
  `id_delivery` int(5) NOT NULL,
  `note` int(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `adress` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `id_product` int(100) NOT NULL,
  `url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `id_delivery`
--

CREATE TABLE `id_delivery` (
  `id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` varchar(300) NOT NULL,
  `price` int(10) NOT NULL,
  `image` varchar(100) NOT NULL,
  `id_shop` int(10) NOT NULL,
  `id_subcategory` int(10) NOT NULL,
  `count` int(50) NOT NULL,
  `price_opt` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `price`, `image`, `id_shop`, `id_subcategory`, `count`, `price_opt`) VALUES
(1, 'Тюльпан', 'Красивый', 10, '/web/image/1648223649_product.jpg', 1, 1, 200, 7),
(2, 'Лилия', 'Дорогая ', 60, '/web/image/1648233552_product.jpg', 1, 1, 300, 45),
(3, 'Лилия', 'Дорогая ', 60, '/web/image/1648233825_product.jpg', 1, 1, 300, 45),
(4, 'Лилия', 'Дорогая ', 60, '/web/image/1648233859_product.jpg', 1, 1, 300, 45),
(5, 'новый шкаф', 'Дорогая ', 60, '/web/image/1648233939_product.jpg', 1, 1, 300, 45),
(6, 'ЛобелияНОвая', 'Дорогая ', 60, '/web/image/1648479431_product.png', 1, 1, 300, 45),
(7, 'ЛобелияНОвая', 'Дорогая ', 60, '/web/image/1648479443_product.png', 1, 1, 300, 45),
(8, 'ЛобелияНОвая', 'Дорогая ', 60, '/web/image/1648479457_product.png', 1, 1, 300, 45),
(9, 'ЛобелияНОвая', 'Дорогая ', 60, '/web/image/1648479474_product.png', 1, 1, 300, 45),
(10, 'ЛобелияНОвая', 'Дорогая ', 60, '/web/image/1648479487_product.png', 1, 1, 300, 45),
(11, 'товар', 'Красивый', 60, '/web/image/1648479518_product.png', 1, 1, 300, 7),
(12, 'другой товар', 'Дорогая ', 10, '/web/image/1648479596_product.jpg', 1, 1, 200, 7);

-- --------------------------------------------------------

--
-- Структура таблицы `products_order`
--

CREATE TABLE `products_order` (
  `id` int(11) NOT NULL,
  `id_product` int(100) NOT NULL,
  `count` int(100) NOT NULL,
  `id_order` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'admin');

-- --------------------------------------------------------

--
-- Структура таблицы `shop`
--

CREATE TABLE `shop` (
  `id` int(11) NOT NULL,
  `adress` varchar(100) NOT NULL,
  `phone` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `shop`
--

INSERT INTO `shop` (`id`, `adress`, `phone`) VALUES
(1, 'Ленинградская область, Всеволожский район ,поселок. Романовка, шоссе Дорога Жизни, д. 64.', '+7 (999) 999 - 99 - 99'),
(2, 'Ж/Д ДУНАЙ', '+7 (905) 267 - 12 - 77');

-- --------------------------------------------------------

--
-- Структура таблицы `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `id_parent` int(100) NOT NULL,
  `url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `subcategories`
--

INSERT INTO `subcategories` (`id`, `name`, `id_parent`, `url`) VALUES
(1, 'Цветы ', 1, '../web/image/1648219196_subcategory.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` text NOT NULL,
  `password` varchar(100) NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `id_role`) VALUES
(1, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `completed_order`
--
ALTER TABLE `completed_order`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `id_delivery`
--
ALTER TABLE `id_delivery`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products_order`
--
ALTER TABLE `products_order`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `completed_order`
--
ALTER TABLE `completed_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `id_delivery`
--
ALTER TABLE `id_delivery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `products_order`
--
ALTER TABLE `products_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `shop`
--
ALTER TABLE `shop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
