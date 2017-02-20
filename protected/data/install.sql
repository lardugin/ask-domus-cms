-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Фев 20 2017 г., 14:48
-- Версия сервера: 5.6.31
-- Версия PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `ask-domus`
--

-- --------------------------------------------------------

--
-- Структура таблицы `accordion`
--

CREATE TABLE `accordion` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `accordion_items`
--

CREATE TABLE `accordion_items` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `accordion_id` int(11) DEFAULT NULL,
  `accordion_order` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `type` int(11) NOT NULL DEFAULT '0',
  `link` varchar(255) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `ordering` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `ordering` int(11) NOT NULL,
  `params` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `preview_text` text,
  `detail_text` text,
  `active` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `ordering` int(11) NOT NULL DEFAULT '1',
  `root` int(11) NOT NULL,
  `lft` int(11) NOT NULL,
  `rgt` int(11) NOT NULL,
  `level` smallint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `title`, `alias`, `description`, `ordering`, `root`, `lft`, `rgt`, `level`) VALUES
(1, 'Квартиры', 'kvartiry', '', 1, 1, 1, 2, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `diplom`
--

CREATE TABLE `diplom` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `preview` varchar(255) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT '500'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `diplom`
--

INSERT INTO `diplom` (`id`, `title`, `preview`, `sort`) VALUES
(1, '1', '1_77e05ffdb697.jpg', 500),
(2, '2', '2_3cd9e0bc1afe.jpg', 500),
(3, '3', '3_e317f02cb815.jpg', 500),
(4, '4', '4_c2614f907484.jpg', 500),
(5, '5', '5_6e00fd736550.jpg', 500),
(6, '6', '6_b8e419d8f308.jpg', 500),
(7, '7', '7_3b19e6565957.jpg', 500),
(8, '8', '8_c1cccc0a8b25.jpg', 500),
(9, '9', '9_0fdcebfd1e77.jpg', 500),
(10, '10', '10_7be51e414f27.jpg', 500),
(11, '11', '11_153c45ef420b.jpg', 500);

-- --------------------------------------------------------

--
-- Структура таблицы `dorder`
--

CREATE TABLE `dorder` (
  `id` int(11) NOT NULL COMMENT 'Id',
  `customer_data` text COMMENT 'Customer data',
  `order_data` longtext COMMENT 'Order data',
  `comment` text COMMENT 'Comment',
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Create time',
  `completed` tinyint(1) DEFAULT '0' COMMENT 'Is completed',
  `paid` tinyint(1) DEFAULT '0' COMMENT 'Is paid',
  `hash` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `eav_attribute`
--

CREATE TABLE `eav_attribute` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` smallint(6) NOT NULL,
  `fixed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `eav_value`
--

CREATE TABLE `eav_value` (
  `id` int(11) NOT NULL,
  `id_attrs` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `intro` text NOT NULL,
  `text` text NOT NULL,
  `enable_preview` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `preview` varchar(255) NOT NULL,
  `publish` tinyint(1) NOT NULL DEFAULT '1',
  `alias` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `event`
--

INSERT INTO `event` (`id`, `title`, `intro`, `text`, `enable_preview`, `created`, `preview`, `publish`, `alias`) VALUES
(1, 'Мы обновили сайт', 'Художник и архитектор Алдана Феррер Гарсия из Бруклина придумал уникальные окна для таких квартир, в которых есть недостаток естественного освещения. Свои окна он назвал More Sky, что в переводе означает «больше неба». Придуманные им инновационные окна увеличивают доступ солнечного света, а кроме этого в комнатах появляется ещё и больше свежего воздуха.', '<p>Художник и архитектор Алдана Феррер Гарсия из Бруклина придумал уникальные окна для таких квартир, в которых есть недостаток естественного освещения. Свои окна он назвал More Sky, что в переводе означает &laquo;больше неба&raquo;. Придуманные им инновационные окна увеличивают доступ солнечного света, а кроме этого в комнатах появляется ещё и больше свежего воздуха.</p>\r\n<p>Художник и архитектор Алдана Феррер Гарсия из Бруклина придумал уникальные окна для таких квартир, в которых есть недостаток естественного освещения. Свои окна он назвал More Sky, что в переводе означает &laquo;больше неба&raquo;. Придуманные им инновационные окна увеличивают доступ солнечного света, а кроме этого в комнатах появляется ещё и больше свежего воздуха.</p>', 0, '2017-02-20 13:03:06', '52dd32159d26.jpg', 1, 'my-obnovili-sajjt');

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE `feedback` (
  `id` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `feedback_callback`
--

CREATE TABLE `feedback_callback` (
  `id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL COMMENT 'Create time',
  `completed` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Is completed',
  `name` varchar(255) DEFAULT NULL COMMENT 'Имя:',
  `email` varchar(255) DEFAULT NULL COMMENT 'E-mail:',
  `phone` varchar(128) DEFAULT NULL COMMENT 'Телефон'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `feedback_callback`
--

INSERT INTO `feedback_callback` (`id`, `created`, `completed`, `name`, `email`, `phone`) VALUES
(2, '2017-02-20 17:04:50', 0, NULL, NULL, '321');

-- --------------------------------------------------------

--
-- Структура таблицы `feedback_callback1`
--

CREATE TABLE `feedback_callback1` (
  `id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL COMMENT 'Create time',
  `completed` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Is completed',
  `phone` varchar(255) DEFAULT NULL COMMENT 'Ваш Телефон'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `feedback_callback2`
--

CREATE TABLE `feedback_callback2` (
  `id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL COMMENT 'Create time',
  `completed` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Is completed',
  `phone` varchar(255) DEFAULT NULL COMMENT 'Ваш Телефон'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `feedback_callback2`
--

INSERT INTO `feedback_callback2` (`id`, `created`, `completed`, `phone`) VALUES
(1, '2017-02-20 17:06:31', 0, '2321312');

-- --------------------------------------------------------

--
-- Структура таблицы `file`
--

CREATE TABLE `file` (
  `id` int(11) NOT NULL,
  `model` varchar(20) NOT NULL,
  `item_id` int(11) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `description` text NOT NULL,
  `ordering` int(11) NOT NULL,
  `preview_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `gallery_img`
--

CREATE TABLE `gallery_img` (
  `id` int(11) NOT NULL,
  `image_order` int(11) NOT NULL DEFAULT '1',
  `gallery_id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `model` varchar(255) DEFAULT NULL,
  `item_id` int(11) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `ordering` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `image`
--

INSERT INTO `image` (`id`, `model`, `item_id`, `filename`, `description`, `ordering`) VALUES
(1, 'product', 1, 'oMTFTYJZ.jpg', '', 1),
(2, 'product', 1, 'spz5NxS4.jpg', '', 1),
(3, 'product', 1, 'b9CuhAgv.jpg', '', 1),
(4, 'product', 1, 'kHMG5PE8.jpg', '', 1),
(5, 'product', 1, 'GPOoU4LD.jpg', '', 1),
(6, 'product', 1, 'YjsnyZnM.jpg', '', 1),
(7, 'product', 1, 'UStoJlek.jpg', '', 1),
(8, 'product', 1, 'hgCceY74.jpg', '', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `link`
--

CREATE TABLE `link` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'model',
  `options` varchar(255) NOT NULL DEFAULT '',
  `seo_a_title` varchar(255) NOT NULL DEFAULT '',
  `ordering` int(11) NOT NULL DEFAULT '1',
  `default` tinyint(1) NOT NULL DEFAULT '0',
  `hidden` tinyint(1) NOT NULL DEFAULT '0',
  `parent_id` int(11) DEFAULT NULL,
  `system` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `menu`
--

INSERT INTO `menu` (`id`, `title`, `type`, `options`, `seo_a_title`, `ordering`, `default`, `hidden`, `parent_id`, `system`) VALUES
(1, 'Главная', 'model', '{"model":"page","id":"1"}', '', 1, 1, 1, NULL, 0),
(2, 'Новости', 'model', '{"model":"event"}', '', 1, 0, 0, 17, 0),
(3, 'Портфолио', 'model', '{"model":"shop"}', '', 4, 0, 0, NULL, 0),
(4, 'Отзывы на товар', 'model', '{"model":"review"}', '', -1, 0, 1, NULL, 1),
(5, 'Фотогалерея', 'model', '{"model":"gallery"}', '', 8, 0, 1, NULL, 0),
(6, 'Обратный звонок', 'model', '{"model":"feedback","id":"callback"}', '', -1, 0, 1, NULL, 1),
(8, 'Услуги и цены', 'model', '{"model":"page","id":"2"}', '', 3, 0, 0, NULL, 0),
(9, 'Дизайн интерьера', 'model', '{"model":"page","id":"3"}', '', 1, 0, 0, 8, 0),
(10, 'Ремонт и отделка', 'model', '{"model":"page","id":"4"}', '', 2, 0, 0, 8, 0),
(11, 'Авторский надзор', 'model', '{"model":"page","id":"5"}', '', 3, 0, 0, 8, 0),
(12, 'Комплектация', 'model', '{"model":"page","id":"6"}', '', 4, 0, 0, 8, 0),
(13, 'Декорирование', 'model', '{"model":"page","id":"7"}', '', 5, 0, 0, 8, 0),
(14, 'Проектирование', 'model', '{"model":"page","id":"8"}', '', 6, 0, 0, 8, 0),
(15, 'Остались вопросы', 'model', '{"model":"feedback","id":"callback1"}', '', -1, 0, 1, NULL, 1),
(16, 'Обсудить проект', 'model', '{"model":"feedback","id":"callback2"}', '', -1, 0, 1, NULL, 1),
(17, 'О компании', 'model', '{"model":"page","id":"9"}', '', 2, 0, 0, NULL, 0),
(18, 'Наша команда', 'model', '{"model":"page","id":"10"}', '', 2, 0, 0, 17, 0),
(19, 'Дипломы и грамоты', 'model', '{"model":"page","id":"11"}', '', 3, 0, 0, 17, 0),
(20, 'Вопрос-Ответ', 'model', '{"model":"question"}', '', 4, 0, 0, 17, 0),
(21, 'Отзывы', 'model', '{"model":"reviews"}', '', 5, 0, 0, 17, 0),
(22, 'Сотрудничество', 'model', '{"model":"page","id":"12"}', '', 5, 0, 0, NULL, 0),
(23, 'Наши партнёры', 'model', '{"model":"page","id":"13"}', '', 1, 0, 0, 22, 0),
(24, 'Поставщикам', 'model', '{"model":"page","id":"14"}', '', 2, 0, 0, 22, 0),
(25, 'Советы', 'model', '{"model":"page","id":"15"}', '', 6, 0, 0, NULL, 0),
(26, 'Контакты', 'model', '{"model":"page","id":"16"}', '', 7, 0, 0, NULL, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `metadata`
--

CREATE TABLE `metadata` (
  `id` int(11) NOT NULL,
  `owner_name` varchar(50) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_key` text NOT NULL,
  `meta_desc` text NOT NULL,
  `meta_h1` varchar(255) DEFAULT NULL,
  `a_title` varchar(255) DEFAULT NULL,
  `priority` float DEFAULT NULL,
  `lastmod` varchar(255) DEFAULT NULL,
  `changefreq` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `metadata`
--

INSERT INTO `metadata` (`id`, `owner_name`, `owner_id`, `meta_title`, `meta_key`, `meta_desc`, `meta_h1`, `a_title`, `priority`, `lastmod`, `changefreq`) VALUES
(1, 'page', 2, '', '', '', '', NULL, NULL, '2017-02-20', 'always'),
(2, 'page', 3, '', '', '', '', NULL, NULL, '2017-02-20', 'always'),
(3, 'page', 4, '', '', '', '', NULL, NULL, '2017-02-20', 'always'),
(4, 'page', 5, '', '', '', '', NULL, NULL, '2017-02-20', 'always'),
(5, 'page', 6, '', '', '', '', NULL, NULL, '2017-02-20', 'always'),
(6, 'page', 7, '', '', '', '', NULL, NULL, '2017-02-20', 'always'),
(7, 'page', 8, '', '', '', '', NULL, NULL, '2017-02-20', 'always'),
(8, 'category', 1, '', '', '', '', '', NULL, '2017-02-20', 'always'),
(9, 'product', 1, '', '', '', '', NULL, NULL, '2017-02-20', 'always'),
(10, 'page', 9, '', '', '', '', NULL, NULL, '2017-02-20', 'always'),
(11, 'page', 10, '', '', '', '', NULL, NULL, '2017-02-20', 'always'),
(12, 'page', 11, '', '', '', '', NULL, NULL, '2017-02-20', 'always'),
(13, 'page', 12, '', '', '', '', NULL, NULL, '2017-02-20', 'always'),
(14, 'page', 13, '', '', '', '', NULL, NULL, '2017-02-20', 'always'),
(15, 'page', 14, '', '', '', '', NULL, NULL, '2017-02-20', 'always'),
(16, 'page', 15, '', '', '', '', NULL, NULL, '2017-02-20', 'always'),
(17, 'page', 16, '', '', '', '', NULL, NULL, '2017-02-20', 'always'),
(18, 'event', 1, '', '', '', '', NULL, NULL, '2017-02-20', 'always');

-- --------------------------------------------------------

--
-- Структура таблицы `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `products` text NOT NULL,
  `payment` text NOT NULL,
  `payment_complete` tinyint(1) NOT NULL DEFAULT '0',
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `page`
--

CREATE TABLE `page` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `blog_id` int(11) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `intro` text NOT NULL,
  `text` mediumtext NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `view_template` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `page`
--

INSERT INTO `page` (`id`, `parent_id`, `blog_id`, `alias`, `title`, `intro`, `text`, `created`, `modified`, `view_template`) VALUES
(1, 0, 0, 'index', 'Главная', '', '<p>Сайт находится в разработке</p>', '2017-02-20 13:03:06', '2017-02-20 13:03:06', NULL),
(2, 0, 0, 'uslugi-i-ceny', 'Услуги и цены', '', '', '2017-02-20 14:01:04', '0000-00-00 00:00:00', ''),
(3, 0, 0, 'dizajjn-interera', 'Дизайн интерьера', '', '', '2017-02-20 14:01:15', '0000-00-00 00:00:00', ''),
(4, 0, 0, 'remont-i-otdelka', 'Ремонт и отделка', '', '', '2017-02-20 14:01:23', '0000-00-00 00:00:00', ''),
(5, 0, 0, 'avtorskijj-nadzor', 'Авторский надзор', '', '', '2017-02-20 14:01:33', '0000-00-00 00:00:00', ''),
(6, 0, 0, 'komplektacija', 'Комплектация', '', '', '2017-02-20 14:01:41', '0000-00-00 00:00:00', ''),
(7, 0, 0, 'dekorirovanie', 'Декорирование', '', '', '2017-02-20 14:01:49', '0000-00-00 00:00:00', ''),
(8, 0, 0, 'proektirovanie', 'Проектирование', '', '', '2017-02-20 14:01:57', '0000-00-00 00:00:00', ''),
(9, 0, 0, 'o-kompanii', 'О компании', '', '', '2017-02-20 17:10:57', '0000-00-00 00:00:00', ''),
(10, 0, 0, 'nasha-komanda', 'Наша команда', '', '<p>В т.ч. выдачу ЭП, подбор закупок, анализ аукционной и конкурсной документации, подготовку первых и вторых частей заявок, оказываем юридическое сопровождение и предоставляем интересы в органах надзора, а также содействуем в финансовом обеспечении на всех этапах.</p>\r\n<p>Разрабатываем документацию и проводим закупки для государственных и муниципальных заказчиков, в т.ч. техническую часть, проект контракта, план закупок, протоколы, а также ведем представительство интересов заказчика в УФАС (ФАС РФ).</p>\r\n<p><strong>Осуществляем тендерное</strong> обслуживание участников и сопровождение заказчиков в рамках 223-ФЗ и 44-ФЗ.</p>\r\n<h3>Курьерист - это скорая курьерская помощь.</h3>\r\n<p>В т.ч. выдачу ЭП, подбор закупок, анализ аукционной и конкурсной документации, подготовку первых и вторых частей заявок, оказываем юридическое сопровождение и предоставляем интересы в органах надзора, а также содействуем в финансовом обеспечении на всех этапах.</p>\r\n<p>Уважаемые коллеги, обращаем ваше внимание, что мы зафиксировали ряд компаний и недобросовестных конкурентов, которые представляются сотрудниками нашей <em>компании и предлагают "серые" банковские гарантии!</em></p>\r\n<p>Подготовить рабочее место может практически любой опытный системный администратор. Компании, не имеющие в штате подобного сотрудника, вынуждены прибегать к сторонней помощи.</p>', '2017-02-20 17:11:20', '2017-02-20 17:53:47', 'team'),
(11, 0, 0, 'diplomy-i-gramoty', 'Дипломы и грамоты', '', '<p>В т.ч. выдачу ЭП, подбор закупок, анализ аукционной и конкурсной документации, подготовку первых и вторых частей заявок, оказываем юридическое сопровождение и предоставляем интересы в органах надзора, а также содействуем в финансовом обеспечении на всех этапах.</p>\r\n<p>Разрабатываем документацию и проводим закупки для государственных и муниципальных заказчиков, в т.ч. техническую часть, проект контракта, план закупок, протоколы, а также ведем представительство интересов заказчика в УФАС (ФАС РФ).</p>\r\n<p><strong>Осуществляем тендерное</strong> обслуживание участников и сопровождение заказчиков в рамках 223-ФЗ и 44-ФЗ.</p>\r\n<h3>Курьерист - это скорая курьерская помощь.</h3>\r\n<p>В т.ч. выдачу ЭП, подбор закупок, анализ аукционной и конкурсной документации, подготовку первых и вторых частей заявок, оказываем юридическое сопровождение и предоставляем интересы в органах надзора, а также содействуем в финансовом обеспечении на всех этапах.</p>\r\n<p>Уважаемые коллеги, обращаем ваше внимание, что мы зафиксировали ряд компаний и недобросовестных конкурентов, которые представляются сотрудниками нашей <em>компании и предлагают "серые" банковские гарантии!</em></p>\r\n<p>Подготовить рабочее место может практически любой опытный системный администратор. Компании, не имеющие в штате подобного сотрудника, вынуждены прибегать к сторонней помощи.</p>', '2017-02-20 17:11:33', '2017-02-20 18:44:51', 'diplom'),
(12, 0, 0, 'sotrudnichestvo', 'Сотрудничество', '', '', '2017-02-20 17:12:39', '0000-00-00 00:00:00', ''),
(13, 0, 0, 'nashi-partnjory', 'Наши партнёры', '', '', '2017-02-20 17:12:51', '0000-00-00 00:00:00', ''),
(14, 0, 0, 'postavshhikam', 'Поставщикам', '', '', '2017-02-20 17:13:00', '0000-00-00 00:00:00', ''),
(15, 0, 0, 'sovety', 'Советы', '', '', '2017-02-20 17:13:10', '0000-00-00 00:00:00', ''),
(16, 0, 0, 'kontakty', 'Контакты', '', '', '2017-02-20 17:13:19', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `alt_title` varchar(500) NOT NULL,
  `link_title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(15,2) DEFAULT NULL,
  `notexist` tinyint(1) NOT NULL DEFAULT '0',
  `sale` tinyint(1) NOT NULL DEFAULT '0',
  `ordering` int(11) NOT NULL DEFAULT '1',
  `new` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `hit` tinyint(1) DEFAULT NULL,
  `in_carousel` tinyint(1) DEFAULT NULL,
  `hidden` tinyint(1) DEFAULT NULL,
  `on_shop_index` tinyint(1) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `category_id`, `code`, `alias`, `title`, `alt_title`, `link_title`, `description`, `price`, `notexist`, `sale`, `ordering`, `new`, `created`, `hit`, `in_carousel`, `hidden`, `on_shop_index`, `brand_id`) VALUES
(1, 1, '', 'ljubercy', 'Люберцы', '', '', '', '0.00', 0, 0, 0, 0, '2017-02-20 14:32:17', 0, NULL, 0, 1, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `product_review`
--

CREATE TABLE `product_review` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `mark` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `text` mediumtext NOT NULL,
  `ts` timestamp NOT NULL,
  `ip` int(11) NOT NULL,
  `published` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `question`
--

INSERT INTO `question` (`id`, `username`, `question`, `answer`, `published`, `created`, `email`) VALUES
(1, 'Андрей', 'Зачем нужен дизайн интерьера?', 'Дизайн-проект интерьера помогает правильно и рационально организовать пространство. В ходе проектирования вы точно поймете чего хотите и в результате получите интерьер, который отражает ваш характер, а так же, отвечает всем требованиям к удобству. \r\n<br><br>\r\nВ проект интерьера включена смета всех отделочных материалов и мебели, что помогает заранее прогнозировать стоимость ремонтно-отделочных работ и позволяет избежать внезапных переплат, которые нельзя учесть без понимания всей картины предстоящих работ.', 1, '2017-02-20 18:15:19', ''),
(3, 'Андрей', 'Что такое 3D визуализация?', 'Это фотореалистичные 3D модели интерьера и экстерьера, выполненные на основе планировочных решений. Они позволяют ярко и реалистично увидеть экстерьер и интерьер со всех возможных ракурсов и со множеством деталей. \r\n<br><br>\r\n3D визуализация позволяет рассмотреть не общую концепцию, а интерьер в деталях. Вплоть до того, какой фактуры ткань будет использоваться на диване и какое освещение будет в ванной.', 1, '2017-02-20 18:30:31', ''),
(4, 'Андрей', 'Что такое авторский надзор?', 'Авторский надзор – это контроль дизайнером полного соответствия идеи фактической ее реализации. Часто возникают вопросы, которые касаются общей концепции проекта. Порой они влекут за собой целую цепочку изменений. Дизайнер с легкостью принимает решения без ущерба стилистике.', 1, '2017-02-20 18:32:08', ''),
(5, 'Андрей', 'Что такое комплектация проекта?', 'Это один из этапов реализации проекта, на котором происходит подбор, согласование, оплата, доставка и монтаж всех отделочных материалов и предметов интерьера. На этом этапе, специалисты отдела комплектации проводят подбор всех позиций от сантехники и радиаторов, до светового оборудования, текстиля и даже декоративных аксессуаров. \r\n<br><br>\r\nБлагодаря партнерским контрактам и обширной базе поставщиков, мы экономим нашим клиентам до 50% от стоимости каждой позиции.', 1, '2017-02-20 18:32:20', ''),
(6, 'Андрей', 'Как долго разрабатывается дизайн-проект?', 'В нашей студии минимальные по Москве сроки разработки дизайн-проектов, они составляют 29 рабочих дней за проект квартиры площадью 70 м 2. Сроки разработки интерьеров большей площади могут отличаться в зависимости от метража и выбранного стиля. Их вы можете уточнить у наших дизайнеров по телефону +7 (495) 220-38-44', 1, '2017-02-20 18:32:28', '');

-- --------------------------------------------------------

--
-- Структура таблицы `related_category`
--

CREATE TABLE `related_category` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `image_enable` tinyint(1) DEFAULT NULL,
  `preview_text` text,
  `detail_text` text,
  `publish_date` date DEFAULT NULL,
  `published` tinyint(1) DEFAULT NULL,
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `comment` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `sale`
--

CREATE TABLE `sale` (
  `id` int(11) NOT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `preview` varchar(32) DEFAULT NULL,
  `enable_preview` tinyint(1) DEFAULT NULL,
  `preview_text` text,
  `text` text,
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `preview` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT '500'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `service`
--

INSERT INTO `service` (`id`, `title`, `preview`, `link`, `sort`) VALUES
(1, 'Дизайн интерьера', '1_986c65288d11.jpg', '#', 500),
(2, 'Ремонт и отделка', '2_d2488d967717.jpg', '#', 500),
(3, 'Авторский надзор', '3_2dec13b746b0.jpg', '#', 500),
(4, 'Комплектация объектов', '4_67f8ebcccb58.jpg', '#', 500),
(5, 'Декорирование', '5_8835c6f60d6a.jpg', '#', 500),
(6, 'Проектирование', '6_1cc4cc4342f0.jpg', '#', 500);

-- --------------------------------------------------------

--
-- Структура таблицы `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `category` varchar(64) NOT NULL DEFAULT 'system',
  `key` varchar(255) NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `settings`
--

INSERT INTO `settings` (`id`, `category`, `key`, `value`) VALUES
(1, 'cms_settings', 'slogan', 's:113:"<p>Авторский дизайн интерьера<br /> квартир и загородных домов</p>";'),
(2, 'cms_settings', 'address', 's:99:"<p>г.Москва, ул. Проспект мира, <br />дом 102, стр. 12, офис 0.3</p>";'),
(3, 'cms_settings', 'sitename', 's:100:"Авторский дизайн интерьера квартир и загородных домов";'),
(4, 'cms_settings', 'phone', 's:25:"<b>+7 (495)</b> 220-38-44";'),
(5, 'cms_settings', 'phone2', 's:18:"+7 (985) 220-38-44";'),
(6, 'cms_settings', 'email', 's:0:"";'),
(7, 'cms_settings', 'emailPublic', 's:17:"info@ask-domus.ru";'),
(8, 'cms_settings', 'firm_name', 's:0:"";'),
(9, 'cms_settings', 'counter', 's:0:"";'),
(10, 'cms_settings', 'hide_news', 's:1:"0";'),
(11, 'cms_settings', 'menu_limit', 's:0:"";'),
(12, 'cms_settings', 'cropImages', 'N;'),
(13, 'cms_settings', 'comments', 'N;'),
(14, 'cms_settings', 'meta_title', 's:0:"";'),
(15, 'cms_settings', 'meta_key', 's:0:"";'),
(16, 'cms_settings', 'meta_desc', 's:0:"";'),
(17, 'cms_settings', 'watermark', 'N;'),
(18, 'cms_settings', 'blog_show_created', 's:1:"0";'),
(19, 'cms_settings', 'slider_slider_active', 'N;'),
(20, 'cms_settings', 'slider_slider_width', 'N;'),
(21, 'cms_settings', 'slider_slider_height', 'N;'),
(22, 'cms_settings', 'slider_carousel_active', 'N;'),
(23, 'cms_settings', 'slider_carousel_width', 'N;'),
(24, 'cms_settings', 'slider_carousel_height', 'N;'),
(25, 'cms_settings', 'slider_banner_active', 'N;'),
(26, 'cms_settings', 'slider_banner_width', 'N;'),
(27, 'cms_settings', 'slider_banner_height', 'N;'),
(28, 'cms_settings', 'treemenu_fixed_id', 's:0:"";'),
(29, 'cms_settings', 'treemenu_show_id', 's:1:"0";'),
(30, 'cms_settings', 'treemenu_show_breadcrumbs', 's:1:"0";'),
(31, 'cms_settings', 'treemenu_depth', 's:1:"-";'),
(32, 'cms_settings', 'question_collapsed', 'N;'),
(33, 'cms_settings', 'shop_title', 's:18:"Портфолио";'),
(34, 'cms_settings', 'shop_pos_description', 's:1:"0";'),
(35, 'cms_settings', 'shop_enable_attributes', 's:1:"0";'),
(36, 'cms_settings', 'shop_enable_reviews', 's:1:"0";'),
(37, 'cms_settings', 'shop_enable_carousel', 's:1:"0";'),
(38, 'cms_settings', 'shop_enable_hit_on_top', 's:1:"0";'),
(39, 'cms_settings', 'shop_category_descendants_level', 's:0:"";'),
(40, 'cms_settings', 'gallery_title', 's:22:"Фотогалерея";'),
(41, 'cms_settings', 'events_title', 's:14:"Новости";'),
(42, 'cms_settings', 'events_link_all_text', 's:21:"Все новости";'),
(43, 'cms_settings', 'sale_title', 'N;'),
(44, 'cms_settings', 'sale_link_all_text', 'N;'),
(45, 'cms_settings', 'sale_preview_width', 'N;'),
(46, 'cms_settings', 'sale_preview_height', 'N;'),
(47, 'cms_settings', 'sale_meta_h1', 'N;'),
(48, 'cms_settings', 'sale_meta_title', 'N;'),
(49, 'cms_settings', 'sale_meta_key', 'N;'),
(50, 'cms_settings', 'sale_meta_desc', 'N;'),
(51, 'cms_settings', 'sitemap', 's:0:"";'),
(52, 'cms_settings', 'fb', 's:34:"https://www.facebook.com/askdomus/";'),
(53, 'cms_settings', 'in', 's:12:"javascript:;";'),
(54, 'cms_settings', 'vk', 's:23:"https://vk.com/askdomus";'),
(55, 'cms_settings', 'my_home', 's:37:"http://www.myhome.ru/users/derevenets";'),
(56, 'cms_settings', 'houzz', 's:33:"http://www.houzz.ru/pro/ask-domus";'),
(57, 'cms_settings', 'tg', 's:28:"http://telegram.me/ask_Domus";'),
(58, 'cms_settings', 'wt', 's:1:"#";'),
(59, 'cms_settings', 'vb', 's:1:"#";'),
(60, 'ShopSettings', 'meta_title', 's:0:"";'),
(61, 'ShopSettings', 'meta_desc', 's:0:"";'),
(62, 'ShopSettings', 'meta_key', 's:0:"";'),
(63, 'ShopSettings', 'meta_h1', 's:0:"";'),
(64, 'ShopSettings', 'main_text', 's:2090:"<p>В т.ч. выдачу ЭП, подбор закупок, анализ аукционной и конкурсной документации, подготовку первых и вторых частей заявок, оказываем юридическое сопровождение и предоставляем интересы в органах надзора, а также содействуем в финансовом обеспечении на всех этапах.</p>\r\n<p>Разрабатываем документацию и проводим закупки для государственных и муниципальных заказчиков, в т.ч. техническую часть, проект контракта, план закупок, протоколы, а также ведем представительство интересов заказчика в УФАС (ФАС РФ).</p>\r\n<p><strong>Осуществляем тендерное</strong> обслуживание участников и сопровождение заказчиков в рамках 223-ФЗ и 44-ФЗ.</p>\r\n<h3>Курьерист - это скорая курьерская помощь.</h3>\r\n<p>В т.ч. выдачу ЭП, подбор закупок, анализ аукционной и конкурсной документации, подготовку первых и вторых частей заявок, оказываем юридическое сопровождение и предоставляем интересы в органах надзора, а также содействуем в финансовом обеспечении на всех этапах.</p>\r\n<p>Уважаемые коллеги, обращаем ваше внимание, что мы зафиксировали ряд компаний и недобросовестных конкурентов, которые представляются сотрудниками нашей <em>компании и предлагают "серые" банковские гарантии!</em></p>";'),
(65, 'ShopSettings', 'isNewRecord', 'b:0;'),
(66, 'ShopSettings', 'id', 'i:1;');

-- --------------------------------------------------------

--
-- Структура таблицы `slide`
--

CREATE TABLE `slide` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `type` int(11) NOT NULL DEFAULT '0',
  `ordering` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `sort_category`
--

CREATE TABLE `sort_category` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `key` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `sort_data`
--

CREATE TABLE `sort_data` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `model_id` int(11) NOT NULL,
  `order_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_migration`
--

CREATE TABLE `tbl_migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tbl_migration`
--

INSERT INTO `tbl_migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1487570588),
('m150608_142036_create_table_related_category', 1487570588),
('m150615_044324_add_column_meta_h1_to_metadata_table', 1487570589),
('m150615_075108_product_table_change_price_type', 1487570589),
('m150825_080028_add_column_a_title_to_metadata_table', 1487570590),
('m150917_045643_add_meta_sitemap_xml', 1487570592),
('m150918_051127_add_event_alias', 1487570593),
('m151007_105528_add_hit_column_by_product_table', 1487570593),
('m151007_123337_create_sale_table', 1487570593),
('m160121_110956_add_in_carousel_column_to_product_table', 1487570594),
('m160211_114739_add_hidden_column_to_product_table', 1487570594),
('m160220_085811_add_view_template_column_to_page_table', 1487570594),
('m160413_081957_add_on_shop_index_column_to_product_table', 1487570595),
('m160414_054128_accordion_table', 1487570596),
('m160415_084434_create_sort_tables', 1487570597),
('m160415_115947_create_reviews_table', 1487570598),
('m160610_071636_change_model_column_by_image_table', 1487570597),
('m160712_084224_create_brand_table', 1487570597),
('m160712_104130_add_brand_id_column_to_product_table', 1487570598);

-- --------------------------------------------------------

--
-- Структура таблицы `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `preview` varchar(255) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT '500'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `team`
--

INSERT INTO `team` (`id`, `title`, `position`, `preview`, `sort`) VALUES
(1, 'Элина Деревенец', 'Менеджер проектов', '1_1f7c04c3926a.jpg', 500),
(2, 'Роман Руковишников', 'Инженер - архитектор', '2_4da069652a32.jpg', 500);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `accordion`
--
ALTER TABLE `accordion`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `accordion_items`
--
ALTER TABLE `accordion_items`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `level` (`level`),
  ADD KEY `lft` (`lft`),
  ADD KEY `rgt` (`rgt`),
  ADD KEY `root` (`root`);

--
-- Индексы таблицы `diplom`
--
ALTER TABLE `diplom`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `dorder`
--
ALTER TABLE `dorder`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `eav_attribute`
--
ALTER TABLE `eav_attribute`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `eav_value`
--
ALTER TABLE `eav_value`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `feedback_callback`
--
ALTER TABLE `feedback_callback`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `feedback_callback1`
--
ALTER TABLE `feedback_callback1`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `feedback_callback2`
--
ALTER TABLE `feedback_callback2`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `gallery_img`
--
ALTER TABLE `gallery_img`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `link`
--
ALTER TABLE `link`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `metadata`
--
ALTER TABLE `metadata`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product_review`
--
ALTER TABLE `product_review`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `related_category`
--
ALTER TABLE `related_category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx_cp` (`category_id`,`product_id`);

--
-- Индексы таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `published` (`published`);

--
-- Индексы таблицы `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_key` (`category`,`key`);

--
-- Индексы таблицы `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `sort_category`
--
ALTER TABLE `sort_category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`,`key`),
  ADD KEY `name_2` (`name`);

--
-- Индексы таблицы `sort_data`
--
ALTER TABLE `sort_data`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_id` (`category_id`,`model_id`),
  ADD KEY `category_id_2` (`category_id`);

--
-- Индексы таблицы `tbl_migration`
--
ALTER TABLE `tbl_migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `accordion`
--
ALTER TABLE `accordion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `accordion_items`
--
ALTER TABLE `accordion_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `diplom`
--
ALTER TABLE `diplom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT для таблицы `dorder`
--
ALTER TABLE `dorder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id';
--
-- AUTO_INCREMENT для таблицы `eav_attribute`
--
ALTER TABLE `eav_attribute`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `eav_value`
--
ALTER TABLE `eav_value`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `feedback_callback`
--
ALTER TABLE `feedback_callback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `feedback_callback1`
--
ALTER TABLE `feedback_callback1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `feedback_callback2`
--
ALTER TABLE `feedback_callback2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `file`
--
ALTER TABLE `file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `gallery_img`
--
ALTER TABLE `gallery_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `link`
--
ALTER TABLE `link`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT для таблицы `metadata`
--
ALTER TABLE `metadata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT для таблицы `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `product_review`
--
ALTER TABLE `product_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `related_category`
--
ALTER TABLE `related_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `sale`
--
ALTER TABLE `sale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT для таблицы `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `sort_category`
--
ALTER TABLE `sort_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `sort_data`
--
ALTER TABLE `sort_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `sort_data`
--
ALTER TABLE `sort_data`
  ADD CONSTRAINT `sort_data_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `sort_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
