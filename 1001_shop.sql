-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Апр 03 2016 г., 16:18
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
-- Структура таблицы `category__attributes`
--

CREATE TABLE IF NOT EXISTS `category__attributes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_category` int(10) unsigned NOT NULL,
  `parameter` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `default` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category__attributes_id_category_foreign` (`id_category`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=33 ;

--
-- Дамп данных таблицы `category__attributes`
--

INSERT INTO `category__attributes` (`id`, `id_category`, `parameter`, `type`, `default`, `created_at`, `updated_at`) VALUES
(1, 2, 'Гарантия', 'number', '', NULL, NULL),
(2, 2, 'Мощность', 'number', '', NULL, NULL),
(9, 6, 'Язык', 'text', '', NULL, NULL),
(10, 6, 'Автор', 'text', '', NULL, NULL),
(11, 6, 'Количество страниц', 'number', '', NULL, NULL),
(13, 6, 'Предмет', 'select', 'История,Математика,Английский язык,Геометрия', NULL, NULL),
(20, 9, 'Количество рабочих часов', 'text', '', NULL, NULL),
(21, 9, 'Марка', 'select', 'Lenovo,Sumsung,Apple,Alcatel,Nokia', NULL, NULL),
(22, 9, 'Размер экрана', 'text', '', NULL, NULL),
(23, 9, 'Емкость батареи', 'number', '', NULL, NULL),
(25, 10, 'КПД теплоты', 'text', '', NULL, NULL),
(26, 10, 'Размер', 'number', '', NULL, NULL),
(27, 10, 'Кто связал', 'select', 'Бабушка,Мама,Сосед', NULL, NULL),
(28, 10, 'Страна производства', 'select', 'Россия,Канада,Монголия', NULL, NULL),
(30, 11, 'Размер', 'number', '', NULL, NULL),
(31, 11, 'Цвет', 'select', 'Красная,Зеленая,Белая', NULL, NULL),
(32, 11, 'Марка', 'text', '', NULL, NULL);

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Дамп данных таблицы `category__products`
--

INSERT INTO `category__products` (`id`, `title`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Электротовары', '1', '2016-02-29 21:00:00', '0000-00-00 00:00:00'),
(6, 'Учебники', '1', '2016-03-24 16:32:31', '2016-03-24 16:32:31'),
(9, 'Телефоны', '1', NULL, NULL),
(10, 'Шарфы и шапки ', '1', NULL, NULL),
(11, 'Одежда', '1', NULL, NULL);

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
('2016_03_26_185738_create_book__attributes_table', 10),
('2016_03_28_185506_create_category__attributes_table', 11),
('2016_03_29_221105_create_parameters_table', 12),
('2016_04_03_112206_add_column_users_name_role', 13);

-- --------------------------------------------------------

--
-- Структура таблицы `parameters`
--

CREATE TABLE IF NOT EXISTS `parameters` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_category` int(10) unsigned NOT NULL,
  `id_product` int(10) unsigned NOT NULL,
  `id_parameter` int(10) unsigned NOT NULL,
  `data` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `parameters_id_parameter_foreign` (`id_parameter`),
  KEY `parameters_id_product_foreign` (`id_product`),
  KEY `parameters_id_category_foreign` (`id_category`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=63 ;

--
-- Дамп данных таблицы `parameters`
--

INSERT INTO `parameters` (`id`, `id_category`, `id_product`, `id_parameter`, `data`, `created_at`, `updated_at`) VALUES
(4, 2, 25, 1, '2', '2016-03-29 20:10:29', '2016-03-29 20:10:29'),
(5, 2, 25, 2, '251', '2016-03-29 20:10:30', '2016-03-30 12:04:33'),
(7, 2, 29, 1, '3', '2016-03-30 05:26:41', '2016-03-30 05:26:41'),
(8, 2, 29, 2, '200', '2016-03-30 05:26:41', '2016-03-30 05:26:41'),
(9, 6, 30, 9, 'Английский', '2016-03-30 05:33:42', '2016-03-30 05:33:42'),
(10, 6, 30, 10, 'J.Brench', '2016-03-30 05:33:42', '2016-03-30 05:33:42'),
(11, 6, 30, 11, '150', '2016-03-30 05:33:42', '2016-03-30 05:33:42'),
(12, 6, 30, 13, 'Геометрия', '2016-03-30 05:33:42', '2016-03-30 12:22:39'),
(31, 6, 40, 9, 'Русский', '2016-03-30 15:23:13', '2016-03-30 15:23:13'),
(32, 6, 40, 10, 'Хз', '2016-03-30 15:23:13', '2016-03-30 15:23:13'),
(33, 6, 40, 11, '150', '2016-03-30 15:23:13', '2016-03-30 15:23:13'),
(34, 6, 40, 13, 'История', '2016-03-30 15:23:13', '2016-03-30 15:23:13'),
(35, 9, 41, 20, '8', '2016-04-01 18:00:23', '2016-04-01 18:00:23'),
(36, 9, 41, 21, 'Apple', '2016-04-01 18:00:23', '2016-04-01 18:00:23'),
(37, 9, 41, 22, '3,5 дюйма (89 мм)', '2016-04-01 18:00:23', '2016-04-01 18:00:23'),
(38, 9, 41, 23, '1500', '2016-04-01 18:00:23', '2016-04-01 18:00:23'),
(39, 2, 42, 1, '2', '2016-04-02 07:29:08', '2016-04-02 07:29:08'),
(40, 2, 42, 2, '1', '2016-04-02 07:29:08', '2016-04-02 07:29:08'),
(41, 9, 43, 20, '20', '2016-04-02 07:30:35', '2016-04-02 07:30:35'),
(42, 9, 43, 21, 'Nokia', '2016-04-02 07:30:35', '2016-04-02 07:30:35'),
(43, 9, 43, 22, '10x10', '2016-04-02 07:30:35', '2016-04-02 07:30:35'),
(44, 9, 43, 23, '1200', '2016-04-02 07:30:35', '2016-04-02 07:30:35'),
(45, 10, 44, 25, '20', '2016-04-02 07:31:21', '2016-04-02 07:31:21'),
(46, 10, 44, 26, '', '2016-04-02 07:31:21', '2016-04-02 07:31:21'),
(47, 10, 44, 27, 'Бабушка', '2016-04-02 07:31:21', '2016-04-02 07:31:21'),
(48, 10, 44, 28, 'Россия', '2016-04-02 07:31:21', '2016-04-02 07:31:21'),
(49, 6, 45, 9, 'Русский', '2016-04-02 07:32:38', '2016-04-02 07:32:38'),
(50, 6, 45, 10, '', '2016-04-02 07:32:38', '2016-04-02 07:32:38'),
(51, 6, 45, 11, '250', '2016-04-02 07:32:38', '2016-04-02 07:32:38'),
(52, 6, 45, 13, 'Математика', '2016-04-02 07:32:38', '2016-04-02 07:32:38'),
(53, 2, 46, 1, '20', '2016-04-02 07:34:31', '2016-04-02 07:34:31'),
(54, 2, 46, 2, '1200', '2016-04-02 07:34:32', '2016-04-02 07:34:32'),
(55, 2, 47, 1, '3', '2016-04-02 07:35:43', '2016-04-02 07:35:43'),
(56, 2, 47, 2, '1400', '2016-04-02 07:35:43', '2016-04-02 07:35:43'),
(57, 2, 48, 1, '1', '2016-04-02 07:36:59', '2016-04-02 07:36:59'),
(58, 2, 48, 2, '3200', '2016-04-02 07:36:59', '2016-04-02 07:36:59'),
(59, 2, 49, 1, '2', '2016-04-02 07:38:51', '2016-04-02 07:38:51'),
(60, 2, 49, 2, '1400', '2016-04-02 07:38:52', '2016-04-02 07:38:52'),
(61, 2, 50, 1, '3', '2016-04-02 07:39:50', '2016-04-02 07:39:50'),
(62, 2, 50, 2, '1397', '2016-04-02 07:39:50', '2016-04-02 07:39:50');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=51 ;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `id_catalog`, `title`, `mark`, `count`, `description`, `status`, `link_img`, `created_at`, `updated_at`, `recommend`) VALUES
(25, 2, 'Холодильник', 'Иван', 22, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, 'a:1:{i:0;s:21:"/images/product/i.jpg";}', NULL, '2016-04-02 11:36:40', 0),
(29, 2, 'Холодильник -морозильник', 'Bosch', 3, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, 'a:1:{i:0;s:35:"/images/product/02-11-2670728_3.jpg";}', '2016-03-30 05:26:41', '2016-03-30 17:14:32', 0),
(30, 6, 'Englich First', 'First', 3, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, 'a:1:{i:0;s:94:"/images/product/stock-photo-learning-english-concept-book-on-a-wooden-background-218817652.jpg";}', '2016-03-30 05:33:42', '2016-04-02 11:29:14', 1),
(40, 6, 'Вовка из тредивятого царства', 'Вовка', 0, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, 'a:2:{i:0;s:31:"/images/product/hCg4xY9Wtug.jpg";i:1;s:25:"/images/product/img24.jpg";}', '2016-03-30 15:23:13', '2016-03-30 18:17:09', 1),
(41, 9, 'Iphone 4S', 'Apple', 2, 'iPhone 4S (с 2013 года также стал использоваться вариант написания iPhone 4s[4]) — сенсорный смартфон корпорации Apple, пятое поколение смартфонов iPhone. Внешне телефон похож на iPhone 4, но в новой модели улучшена аппаратная часть и обновлено программное обеспечение. Среди основных нововведений: голосовой помощник Siri, новый двухъядерный процессор А5, возможность функционирования в качестве Wi-Fi-роутера, независимость от персонального компьютера и улучшенная камера. Большинством функций можно управлять с помощью голоса.', 1, 'a:2:{i:0;s:26:"/images/product/618188.jpg";i:1;s:25:"/images/product/i (1).jpg";}', '2016-04-01 18:00:23', '2016-04-01 18:00:23', 1),
(42, 2, 'Чайник', 'Тула', 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, 'a:1:{i:0;s:25:"/images/product/i (2).jpg";}', '2016-04-02 07:29:08', '2016-04-02 11:16:54', 1),
(43, 9, 'Nokia 3210', 'Nokia', 5, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, 'a:1:{i:0;s:25:"/images/product/i (3).jpg";}', '2016-04-02 07:30:35', '2016-04-02 07:30:35', 1),
(44, 10, 'Шарф', 'Белоруссия', 19, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, 'a:1:{i:0;s:25:"/images/product/i (4).jpg";}', '2016-04-02 07:31:21', '2016-04-02 07:31:21', 1),
(45, 6, 'Малышам учебник', 'Издательство Росси', 19, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, 'a:1:{i:0;s:84:"/images/product/e9c05e70ba63919db4386557ff316983a7c2b8300a6a9d96ff3c86340a7cc8fe.jpg";}', '2016-04-02 07:32:38', '2016-04-02 07:32:38', 0),
(46, 2, 'Кофемолка', 'Italii', 3, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, 'a:1:{i:0;s:25:"/images/product/i (5).jpg";}', '2016-04-02 07:34:31', '2016-04-02 07:36:09', 1),
(47, 2, 'Микроволновка', 'Indesit', 3, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, 'a:1:{i:0;s:46:"/images/product/kak_ochistit_mikrovolnovku.jpg";}', '2016-04-02 07:35:43', '2016-04-02 07:36:04', 1),
(48, 2, 'Блендер', 'Bosh', 0, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, 'a:1:{i:0;s:25:"/images/product/i (6).jpg";}', '2016-04-02 07:36:59', '2016-04-02 07:36:59', 1),
(49, 2, 'Тостер', 'Bosh', 0, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, 'a:1:{i:0;s:21:"/images/product/i.jpg";}', '2016-04-02 07:38:51', '2016-04-02 07:38:59', 1),
(50, 2, 'Миксер', 'Vs', 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, 'a:1:{i:0;s:33:"/images/product/56bd70c40c44e.jpg";}', '2016-04-02 07:39:50', '2016-04-02 11:17:49', 1);

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
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'Илья', 'agoalofalife@gmail.com', '3128060', 'se33TwcdYsV2Fg1DqdozUSxG0FIlp83ynxB3JqEB36o7MiIURAPsYbSYLrNM', '2016-03-23 18:23:19', '2016-04-03 08:39:43', ''),
(2, 'Иван', 'Ivan@rambler.ru', '$2y$10$smcn20CaWPW5Edc2BKCk0.xOF6AMY9FCkZ7ULa/kTEJ8hFjL5skOu', 'hLxWSocnMAcxBKxz06ZQL0NuBaZOeNDnk4lBk1Kwlr3WvhUCV7xjaHL6l9BI', '2016-04-03 08:42:44', '2016-04-03 10:09:48', 'admin'),
(3, 'Мария', 'masha@yandex.ru', '$2y$10$kJvhXK88IC1nG/KJsmWcT.B4l6ot06.946XPgKEXVvO2nLcaQBM9S', NULL, '2016-04-03 10:15:24', '2016-04-03 10:15:24', '');

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `category__attributes`
--
ALTER TABLE `category__attributes`
  ADD CONSTRAINT `category__attributes_id_category_foreign` FOREIGN KEY (`id_category`) REFERENCES `category__products` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `parameters`
--
ALTER TABLE `parameters`
  ADD CONSTRAINT `parameters_id_category_foreign` FOREIGN KEY (`id_category`) REFERENCES `category__products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `parameters_id_parameter_foreign` FOREIGN KEY (`id_parameter`) REFERENCES `category__attributes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `parameters_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_id_catalog_foreign` FOREIGN KEY (`id_catalog`) REFERENCES `category__products` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
