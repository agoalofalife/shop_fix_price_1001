-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Мар 27 2016 г., 21:37
-- Версия сервера: 5.5.47-0ubuntu0.14.04.1
-- Версия PHP: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `1001_shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `book__attributes`
--

CREATE TABLE IF NOT EXISTS `book__attributes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_product` int(10) unsigned NOT NULL,
  `author` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `language` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `genre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `number_pages` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `book__attributes_id_product_foreign` (`id_product`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `book__attributes`
--

INSERT INTO `book__attributes` (`id`, `id_product`, `author`, `language`, `genre`, `number_pages`, `created_at`, `updated_at`) VALUES
(1, 8, 'Иванов', 'Русский', 'История', 250, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `category__products`
--

CREATE TABLE IF NOT EXISTS `category__products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8 NOT NULL,
  `field_attributes` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Дамп данных таблицы `category__products`
--

INSERT INTO `category__products` (`id`, `title`, `status`, `created_at`, `updated_at`, `slug`, `field_attributes`) VALUES
(2, 'Электротовары', '1', '2016-02-29 21:00:00', '0000-00-00 00:00:00', 'electric', ''),
(4, 'Компоненты 	для Arduino', '1', '2016-03-24 14:34:48', '2016-03-24 14:34:48', '', ''),
(6, 'Учебники', '1', '2016-03-24 16:32:31', '2016-03-24 16:32:31', 'book', ''),
(7, 'Автомобили', '1', NULL, NULL, 'auto', 'a:3:{i:0;a:3:{i:0;s:9:"Цвет ";i:1;s:4:"text";i:2;s:5:"color";}i:1;a:3:{i:0;s:6:"Тип";i:1;s:8:"textarea";i:2;s:4:"Type";}s:20:"Марка авто ";a:2:{s:10:"Аудио";s:5:"audio";s:10:"Митцу";s:5:"Mitsu";}}'),
(8, 'Котики', '1', '2016-03-27 14:31:43', '2016-03-27 14:31:43', 'cate', 'a:2:{i:0;a:3:{i:0;s:12:"Шерсть";i:1;s:4:"text";i:2;s:3:"mex";}s:17:"Цвет глаз";a:2:{s:14:"Зеленый";s:5:"green";s:15:"Голубой ";s:4:"blue";}}');

-- --------------------------------------------------------

--
-- Структура таблицы `electric__attributes`
--

CREATE TABLE IF NOT EXISTS `electric__attributes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_product` int(10) unsigned NOT NULL,
  `power` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `guarantee` float NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `electric__attributes_id_product_foreign` (`id_product`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `electric__attributes`
--

INSERT INTO `electric__attributes` (`id`, `id_product`, `power`, `guarantee`, `type`, `created_at`, `updated_at`) VALUES
(1, 9, '220 ВТ ', 2, 'Бытовые', NULL, NULL),
(2, 3, '2000 ВТ', 5, 'Строительные', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_03_23_211304_create_drinks_table', 1),
('2016_03_24_072823_create_column_id_category_in_table_drinks', 2),
('2016_03_24_073435_create_category__products_table', 3),
('2016_03_24_074435_add_type_key_in_table_drinks', 4),
('2016_03_24_081020_add_unsigned_drinks', 5),
('2016_03_24_081246_alter_drinks_relations', 6),
('2016_03_24_115048_create_products_table', 7),
('2016_03_24_115849_alter_products_relations', 7),
('2016_03_25_111215_add_column_products', 8),
('2016_03_25_200755_create_electric__attributes_table', 9),
('2016_03_26_185738_create_book__attributes_table', 10);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_catalog` int(10) unsigned NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mark` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `count` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `link_img` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `recommend` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `products_id_catalog_foreign` (`id_catalog`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `id_catalog`, `title`, `mark`, `count`, `description`, `status`, `link_img`, `created_at`, `updated_at`, `recommend`) VALUES
(3, 2, 'Бензопила', 'Инокентий', 10, 'Отличная пила для тех, кого все достали!', 1, 'a:2:{i:0;s:28:"/images/product/chainsaw.png";i:1;s:28:"/images/product/chainsaw.png";}', NULL, '2016-03-26 16:42:55', 0),
(8, 6, 'История истории', 'Издательство Россия', 150, 'Ну так се,ниче не понятно', 1, '', NULL, NULL, 0),
(9, 2, 'Чайник', 'Bosh', 20, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias autem, consectetur cumque dignissimos doloremque eligendi est exercitationem explicabo id illum in laborum minus porro, quae quod ut velit, voluptatibus voluptatum?\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Alias autem, consectetur cumque dignissimos doloremque eligendi est exercitationem explicabo id illum in laborum minus porro, quae quod ut velit, voluptatibus voluptatum?', 1, 'a:2:{i:0;s:32:"/images/product/чайник.png";i:1;s:28:"/images/product/chainsaw.png";}', NULL, NULL, 0),
(11, 2, 'Кофеварка', 'Bosh', 32, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias autem, consectetur cumque dignissimos doloremque eligendi est exercitationem explicabo id illum in laborum minus porro, quae quod ut velit, voluptatibus voluptatum?\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Alias autem, consectetur cumque dignissimos doloremque eligendi est exercitationem explicabo id illum in laborum minus porro, quae quod ut velit, voluptatibus voluptatum?', 1, 'a:2:{i:0;s:38:"/images/product/кофеварка.png";i:1;s:28:"/images/product/chainsaw.png";}', NULL, NULL, 0),
(12, 7, 'Ламборджини', 'Ламборджини', 1, 'Тут надо просто попробывать', 1, '', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Илья', 'agoalofalife@gmail.com', '$2y$10$4Zutd8uJMb4hVB7Pi4J7UuJlZwD/vRgghgmYPzqC8BanosD9XQ.nS', 'zcufOXLvqqYtt4y9uPKTdk6SY46M43CWlq9tyeRo85jSoSjbJZbo0Gx0RSGW', '2016-03-23 18:23:19', '2016-03-23 18:29:26');

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `book__attributes`
--
ALTER TABLE `book__attributes`
  ADD CONSTRAINT `book__attributes_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `electric__attributes`
--
ALTER TABLE `electric__attributes`
  ADD CONSTRAINT `electric__attributes_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_id_catalog_foreign` FOREIGN KEY (`id_catalog`) REFERENCES `category__products` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
