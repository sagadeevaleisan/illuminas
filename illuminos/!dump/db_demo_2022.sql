-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 24 2023 г., 22:44
-- Версия сервера: 5.7.38
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `db_demo_2022`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`category_id`, `category`) VALUES
(1, 'Фильмы'),
(2, 'Сериалы');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `number` int(11) DEFAULT NULL,
  `status` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reason` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`order_id`, `product_id`, `user_id`, `number`, `status`, `reason`, `created_at`, `updated_at`) VALUES
(17, 5, 2, 1387869029, 'Новый', NULL, '2022-02-17 07:15:08', '2023-11-24 16:22:03');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `name` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` int(11) NOT NULL,
  `genre` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opisanie` varchar(700) COLLATE utf8mb4_unicode_ci NOT NULL,
  `actors` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`product_id`, `name`, `rating`, `year`, `genre`, `category`, `path`, `video`, `opisanie`, `actors`, `created_at`) VALUES
(3, 'Нулевой пациент', '7.1', 2022, 'детектив', 'Сериалы', 'asset\\img\\1.png', 'asset/video/Нулевой пациент _ Трейлер _ PREMIER.mp4', 'Врач в Элисте сталкивается с первой вспышкой ВИЧ в СССР. Один из лучших российских сериалов', 'Никита Ефремов, Аскар Ильясов, Павел Майков, Евгений Стычкин, Елизавета Шакира, Виктория Агалакова, Евгения Манджиева, Игорь Гордин, Сейдулла Молдаханов, Иван Добронравов', '2022-02-16 06:58:58'),
(5, 'Дьявольский судья', '8.4', 2021, 'криминал,детектив', 'Сериалы', 'asset\\img\\3.png', 'asset/video/ТРЕЙЛЕР __ Дьявольский судья __ дорама(1).mp4', 'Врач в Элисте сталкивается с первой вспышкой ВИЧ в СССР. Один из лучших российских сериалов', 'Никита Ефремов, Аскар Ильясов, Павел Майков, Евгений Стычкин, Елизавета Шакира, Виктория Агалакова, Евгения Манджиева, Игорь Гордин, Сейдулла Молдаханов, Иван Добронравов', '2022-02-16 06:58:58'),
(6, 'Детектив снов', '9.1', 2021, 'детектив', 'Сериалы', 'asset\\img\\2.png', '', '', 'Никита Ефремов, Аскар Ильясов, Павел Майков, Евгений Стычкин, Елизавета Шакира, Виктория Агалакова, Евгения Манджиева, Игорь Гордин, Сейдулла Молдаханов, Иван Добронравов', '2022-02-16 06:58:58'),
(7, 'Отель элеон', '9.3', 2021, 'комедия, драма', 'Сериалы', 'asset\\img\\4.png', '', '', 'Никита Ефремов, Аскар Ильясов, Павел Майков, Евгений Стычкин, Елизавета Шакира, Виктория Агалакова, Евгения Манджиева, Игорь Гордин, Сейдулла Молдаханов, Иван Добронравов', '2022-02-16 06:58:58'),
(8, 'ВандаВижн', '9.2', 2020, 'фэнтези, драма', 'Сериалы', 'asset\\img\\10.png', '', '', 'Никита Ефремов, Аскар Ильясов, Павел Майков, Евгений Стычкин, Елизавета Шакира, Виктория Агалакова, Евгения Манджиева, Игорь Гордин, Сейдулла Молдаханов, Иван Добронравов', '2022-02-16 06:58:58'),
(9, 'Локи', '8.0', 2020, 'фэнтези, драма', 'Сериалы', 'asset\\img\\6.png', '', '', 'Никита Ефремов, Аскар Ильясов, Павел Майков, Евгений Стычкин, Елизавета Шакира, Виктория Агалакова, Евгения Манджиева, Игорь Гордин, Сейдулла Молдаханов, Иван Добронравов', '2022-02-16 06:58:58'),
(10, 'Шерлок холмс', '8.7', 2020, 'детектив', 'Фильмы', 'asset\\img\\12.png', '', '', 'Никита Ефремов, Аскар Ильясов, Павел Майков, Евгений Стычкин, Елизавета Шакира, Виктория Агалакова, Евгения Манджиева, Игорь Гордин, Сейдулла Молдаханов, Иван Добронравов', '2022-02-16 06:58:58'),
(11, '8 миля', '9.5', 2019, 'драма', 'Фильмы', 'asset\\img\\11.png', 'asset/video/8 миля _ 8 Mile — Русский трейлер (2002).mp4', 'Детройт, 1995 год. Блестящая и многообещающая политика индустриального развития города терпит крах и приводит к хаосу и неразберихе, что в результате выливается в один из самых серьезных в американской истории конфликтов между белым и цветным населением. Люди, мирно жившие рядом, оказались по разные стороны баррикад.', 'Эминем,\nКим Бейсингер,\nБриттани Мерфи,\nМекхай Файфер,\nИвэн Джонс,\nОмар Бенсон Миллер,\nДе’Анджело Уилсон,\nЮджин Бирд,\nТэрин Мэннинг,\nЛарри Хадсон', '2022-02-16 06:58:58'),
(12, 'Поехавшая', '7.1', 2019, 'комедия, мелодрамма', 'Фильмы', 'asset\\img\\7.png', '', '', 'Никита Ефремов, Аскар Ильясов, Павел Майков, Евгений Стычкин, Елизавета Шакира, Виктория Агалакова, Евгения Манджиева, Игорь Гордин, Сейдулла Молдаханов, Иван Добронравов', '2022-02-16 06:58:58'),
(22, 'Джокер', '8.4', 2019, 'драма, криминал', 'Фильмы', 'asset\\img\\5.png', '', '', 'Никита Ефремов, Аскар Ильясов, Павел Майков, Евгений Стычкин, Елизавета Шакира, Виктория Агалакова, Евгения Манджиева, Игорь Гордин, Сейдулла Молдаханов, Иван Добронравов', '2022-02-16 06:58:58'),
(23, 'Тор рагнарек', '8.9', 2019, 'фэнтези', 'Фильмы', 'asset\\img\\9.png', '', '', 'Никита Ефремов, Аскар Ильясов, Павел Майков, Евгений Стычкин, Елизавета Шакира, Виктория Агалакова, Евгения Манджиева, Игорь Гордин, Сейдулла Молдаханов, Иван Добронравов', '2022-02-16 06:58:58'),
(24, 'Живая сталь', '9.8', 2019, 'боевик', 'Фильмы', 'asset\\img\\8.png', '', '', 'Никита Ефремов, Аскар Ильясов, Павел Майков, Евгений Стычкин, Елизавета Шакира, Виктория Агалакова, Евгения Манджиева, Игорь Гордин, Сейдулла Молдаханов, Иван Добронравов', '2022-02-16 06:58:58');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patronymic` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `name`, `surname`, `patronymic`, `login`, `email`, `password`, `role`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', 'admin@ds', 'admin', 'admin'),
(2, 'ads', 'asfd', 'sdfa', 'qwe', 'saad@as', '123', 'client');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
