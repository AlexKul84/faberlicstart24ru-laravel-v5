-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Апр 08 2021 г., 10:52
-- Версия сервера: 5.7.33-cll-lve
-- Версия PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `faberlic_start24`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE `articles` (
  `id` int(10) UNSIGNED NOT NULL,
  `title_article` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `category_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keywords` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `catalogs`
--

CREATE TABLE `catalogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `catalogs`
--

INSERT INTO `catalogs` (`id`, `title`, `text`, `link`, `img`, `alt`) VALUES
(1, 'Основной каталог Фаберлик № 05/2021 (29.03 – 11.04)', 'Каталог Фаберлик Россия 5 периода 2021 г. Действие цен каталога с 29 марта по 11 апреля 2021 года. Все цены указаны в российских рублях. После регистрации будет доступна скидка 20% от цен указанных в каталоге и подарок за первый заказ.\r\n', 'https://new.faberlic.com/ru/catalog/showcover?catalogId=RU_TJ_TM_05_2021&sponsornumber=706401503', '{\"max\":\"catalog2.jpg\"}\r\n', 'Действующий каталог Фаберлик'),
(4, 'Беларусь Каталог Florange весна-лето 2021', 'Каталог Флоранж весна-лето 2021. В каталоге представлены модели нижнего белья для женщин премиального качества. Все цены указаны в российских рублях. Посмотреть все модели можно на сайте Фаберлик после регистрации.', 'https://new.faberlic.com/ru/catalog/showcover?catalogId=Florange_spring_21&sponsornumber=706401503', '{\"max\":\"Flo_spring_2021-1.jpg\"}', 'Каталог нижнего белья Флоранж'),
(5, 'Каталог DЭНАС 2020 Faberlic', 'Дэнас-терапия - медицинская технология, самодеятельный раздел физиотерапии, применяется в домашних условиях и в условиях медицинских учреждений.', 'https://new.faberlic.com/ru/catalog/showcover?catalogId=Denas_2020_1&sponsornumber=706401503', '{\"max\":\"Denas-2020-01.jpg\"}', 'Каталог DЭНАС 2020 Faberlic'),
(6, 'Каталог Wellness 2020 Faberlic', 'Продукты Wellness для тех, кто хочет похудеть комфортно, вкусно и при этом получая весь спектр полезных веществ.', 'https://new.faberlic.com/ru/catalog/showcover?catalogId=Wellness_2020_1&sponsornumber=706401503', '{\"max\":\"Wellness-2020.jpg\"}', 'Каталог Wellness 2020 Faberlic');

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `keywords` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `title`, `parent_id`, `alias`, `created_at`, `updated_at`, `keywords`, `meta_desc`) VALUES
(1, 'Обзоры/Акции/Новости', 0, 'blog', NULL, NULL, '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `article_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `user_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `filters`
--

CREATE TABLE `filters` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `filters`
--

INSERT INTO `filters` (`id`, `title`, `alias`, `created_at`, `updated_at`) VALUES
(1, 'Brand Identity', 'brand-identity', '2020-09-13 08:48:25', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `menus`
--

INSERT INTO `menus` (`id`, `title`, `path`, `parent`, `created_at`, `updated_at`) VALUES
(2, 'ОБЗОРЫ/АКЦИИ/НОВОСТИ', 'http://faberlic-start24.ru/articles', 0, '2020-12-25 12:23:45', NULL),
(6, 'КАТАЛОГИ', 'http://faberlic-start24.ru/catalogs', 0, '2020-12-25 12:23:45', NULL),
(7, 'ЛИЧНЫЙ КАБИНЕТ', 'http://faberlic-start24.ru/lichniy-kabinet', 0, '2020-12-25 12:23:45', NULL),
(8, 'ОПЛАТА И ДОСТАВКА', 'http://faberlic-start24.ru/oplata', 0, '2020-12-25 12:23:45', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_09_13_061823_create_articles_table', 1),
(4, '2020_09_13_062405_create_portfolios_table', 1),
(5, '2020_09_13_062640_create_filters_table', 1),
(6, '2020_09_13_062918_create_comments_table', 1),
(7, '2020_09_13_063325_create_sliders_table', 1),
(8, '2020_09_13_063454_create_menus_table', 1),
(9, '2020_09_13_063616_create_categories_table', 1),
(10, '2020_09_13_064903_change_articles_table', 1),
(11, '2020_09_13_065628_change_comments_table', 1),
(12, '2020_09_13_082937_change_portfolios_table', 2),
(13, '2020_10_16_194003_change__articles__table2', 3),
(14, '2020_10_17_055503_change__categories__table2', 4),
(15, '2020_10_17_121023_change_portfolios_table2', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `sliders`
--

CREATE TABLE `sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `img` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `descr` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `sliders`
--

INSERT INTO `sliders` (`id`, `img`, `descr`, `title`, `created_at`, `updated_at`) VALUES
(1, 'catalog.jpg', '<p class=\"text_slider\"><span style=\"color:#000\">Каталог №5 Faberlic для России. Действие каталога с 29 марта по 11 апреля 2021 года. Смотрите онлайн по ссылке.</span>\r\n</p>\r\n<p><a href=\"https://new.faberlic.com/ru/catalog/flash?sponsornumber=706401503\" onclick=\"ym(69596722,\'reachGoal\',\'CATALOGLINK\'); return true;\" class=\"btn btn-beetle-bus-goes-jamba-juice-4 btn-more-link\">СМОТРЕТЬ КАТАЛОГ</a></p>', '<h2 style=\"color:#C7291C\">Смотрите онлайн бесплатно <br />Каталог №5 Faberlic Россия</h2>', NULL, NULL),
(2, 'lichniykabinet.jpg', '<p class=\"text_slider\">Регистрация в Faberlic - это мгновенная скидка для покупателя + подарки и участие в акциях и программах Faberlic!</p>\r\n<p class=\"text_slider\">Регистрация быстрая, бесплатная и не требует паспортных данных</p>\r\n<p><a href=\"https://faberlic.com/register?sponsornumber=706401503&lang=ru&r=1000318652091\" onclick=\"ym(69596722,\'reachGoal\',\'REGISTRATION\'); return true;\" class=\"btn btn-beetle-bus-goes-jamba-juice-4 btn-more-link\">ЗАРЕГЕСТРИРОВАТЬСЯ</a></p>\r\n', '<h2 style=\"color:#fff\">Личный кабинет <span>FABERLIC</span></h2>\r\n', NULL, NULL),
(3, 'akciya.jpg', '<p class=\"text_slider\"><span style=\"color:#000\">Получи подарок за регистрацию в следующем заказе!</span></p>\r\n<p><a href=\"https://new.faberlic.com/welcome?_ga=2.42301541.1530137035.1605348184-1758650694.1558543304&sponsornumber=706401503\" onclick=\"ym(69596722,\'reachGoal\',\'LENDINGAKCIYA\'); return true;\" class=\"btn btn-beetle-bus-goes-jamba-juice-4 btn-more-link\">ЗАБРАТЬ ПОДАРОК!</a></p>\r\n', '<h2 style=\"color:#C7291C\">30 рублей + стиральный порошок в подарок за первый заказ!</h2>\r\n', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Юлия Куликова', 'user@mail.ru', NULL, '$2y$10$rdsoev7ipSd4OAIdbfdvj.q7a0IfOMOEgkpUWl7FHBpqnMRqW.XXy', 'IINLqzVAnALzRNH8mfvzJdxPWZSD7gXNs1Lr4sP3BQiIFDR6U4Wmb8XwMfuN', '2020-09-13 05:36:53', '2020-09-13 05:36:53');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `articles_alias_unique` (`alias`),
  ADD KEY `articles_user_id_foreign` (`user_id`),
  ADD KEY `articles_category_id_foreign` (`category_id`);

--
-- Индексы таблицы `catalogs`
--
ALTER TABLE `catalogs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_alias_unique` (`alias`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_article_id_foreign` (`article_id`),
  ADD KEY `comments_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `filters`
--
ALTER TABLE `filters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `filters_alias_unique` (`alias`);

--
-- Индексы таблицы `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `catalogs`
--
ALTER TABLE `catalogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `filters`
--
ALTER TABLE `filters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `articles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`),
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
