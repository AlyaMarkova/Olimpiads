-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 24 2017 г., 12:24
-- Версия сервера: 5.5.53
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `olimpiada`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--
-- Создание: Мар 24 2017 г., 09:02
-- Последнее обновление: Мар 24 2017 г., 09:02
--

CREATE TABLE `comments` (
  `idd` int(11) NOT NULL,
  `reply` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comment` varchar(2000) NOT NULL,
  `date` bigint(20) NOT NULL,
  `url` varchar(255) NOT NULL,
  `pass` varchar(10) NOT NULL,
  `urlOpen` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`idd`, `reply`, `user`, `name`, `email`, `comment`, `date`, `url`, `pass`, `urlOpen`) VALUES
(142, 0, 0, 'Аноним', 'putov_as@mail.ru', '&lt;p&gt;das&lt;/p&gt;\n', 1481733190, '852559bfd7e23579b6ee4ad357eb1fcd', 'x6XbHBSH', '/olimpiada.php?id=2'),
(143, 0, 2, 'putov_as', 'putov_as@mail.ru', '&lt;p&gt;dsa&lt;/p&gt;\n', 1481733194, '852559bfd7e23579b6ee4ad357eb1fcd', 'C7TljMP0', '/olimpiada.php?id=2'),
(144, 0, 0, 'Аноним', 'putov_as@mail.ru', '&lt;p&gt;fsd&lt;/p&gt;\n', 1481733226, '852559bfd7e23579b6ee4ad357eb1fcd', 'Br1z5vMd', '/olimpiada.php?id=2'),
(3, 0, 9, 'boevichhh_pa', 'boevich@mail.ru', '&lt;p&gt;Участвую&lt;img title=&quot;{#ar}&quot; src=&quot;/js/tiny_mce/plugins/emotions/img/ar.gif&quot; alt=&quot;{#ar}&quot; border=&quot;0&quot;&gt;&lt;/p&gt;\n', 1481719348, 'cf042961a1c9b347fc5d1b1d1aa80b73', 'x4DlCXO9', '/olimpiada.php?id=9'),
(140, 139, 2, 'putov_as', 'putov_as@mail.ru', '&lt;p&gt;das&lt;/p&gt;\n', 1481733179, '852559bfd7e23579b6ee4ad357eb1fcd', 'HZGOUKIo', '/olimpiada.php?id=2'),
(141, 0, 0, 'Аноним', 'putov_as@mail.ru', '&lt;p&gt;das&lt;/p&gt;\n', 1481733186, '852559bfd7e23579b6ee4ad357eb1fcd', 'tDsguPKm', '/olimpiada.php?id=2'),
(111, 0, 0, 'Аноним', 'putov_as@mail.ru', '&lt;p&gt;das&lt;/p&gt;\n', 1481731615, '852559bfd7e23579b6ee4ad357eb1fcd', 'sIvISoaL', '/olimpiada.php?id=2'),
(112, 0, 0, 'Аноним', 'putov_as@mail.ru', '&lt;p&gt;dasd&lt;/p&gt;\n', 1481731644, '852559bfd7e23579b6ee4ad357eb1fcd', 'T9j0VJTU', '/olimpiada.php?id=2'),
(113, 0, 2, 'putov_as', 'putov_as@mail.ru', '&lt;p&gt;d&lt;/p&gt;\n', 1481731648, '852559bfd7e23579b6ee4ad357eb1fcd', 'vTSTIN64', '/olimpiada.php?id=2'),
(117, 0, 0, 'Аноним', 'putov_as@mail.ru', '&lt;p&gt;647114&lt;/p&gt;\n', 1481732057, '852559bfd7e23579b6ee4ad357eb1fcd', 'g1tOymmi', '/olimpiada.php?id=2'),
(115, 0, 2, 'putov_as', 'putov_as@mail.ru', '&lt;p&gt;d&lt;/p&gt;\n', 1481731660, '852559bfd7e23579b6ee4ad357eb1fcd', 'zP8Pd1Ir', '/olimpiada.php?id=2'),
(116, 0, 0, 'Аноним', 'putov_as@mail.ru', '&lt;p&gt;dsa&lt;/p&gt;\n', 1481731688, '852559bfd7e23579b6ee4ad357eb1fcd', 'lKBfZcGb', '/olimpiada.php?id=2'),
(118, 0, 2, 'putov_as', 'putov_as@mail.ru', '&lt;p&gt;647114&lt;/p&gt;\n', 1481732066, '852559bfd7e23579b6ee4ad357eb1fcd', '57GR31l5', '/olimpiada.php?id=2'),
(119, 0, 0, 'Аноним', 'putov_as@mail.ru', '&lt;p&gt;647114&lt;/p&gt;\n', 1481732079, '852559bfd7e23579b6ee4ad357eb1fcd', 'tXjLkNkt', '/olimpiada.php?id=2'),
(120, 0, 2, 'putov_as', 'putov_as@mail.ru', '&lt;p&gt;s&lt;/p&gt;\n', 1481732085, '852559bfd7e23579b6ee4ad357eb1fcd', 'AjxIFC8i', '/olimpiada.php?id=2'),
(121, 0, 2, 'putov_as', 'putov_as@mail.ru', '&lt;p&gt;das&lt;/p&gt;\n', 1481732220, '852559bfd7e23579b6ee4ad357eb1fcd', '5lIAm0TI', '%2Folimpiada.php%3Fid%3D2'),
(122, 0, 2, 'putov_as', 'putov_as@mail.ru', '&lt;p&gt;das&lt;/p&gt;\n', 1481732292, '852559bfd7e23579b6ee4ad357eb1fcd', 'E3DZI41k', '%2Folimpiada.php%3Fid%3D2'),
(128, 0, 2, 'putov_as', 'putov_as@mail.ru', '&lt;p&gt;bgf&lt;/p&gt;\n', 1481732553, '852559bfd7e23579b6ee4ad357eb1fcd', '66aH2nlM', '/olimpiada.php?id=2'),
(129, 0, 0, 'Аноним', 'putov_as@mail.ru', '&lt;p&gt;gb&lt;/p&gt;\n', 1481732557, '852559bfd7e23579b6ee4ad357eb1fcd', 'U66RKK3g', '/olimpiada.php?id=2'),
(130, 0, 0, 'Аноним', 'putov_as@mail.ru', '&lt;p&gt;gb&lt;/p&gt;\n', 1481732563, '852559bfd7e23579b6ee4ad357eb1fcd', '1upRBT1Y', '/olimpiada.php?id=2'),
(131, 129, 2, 'putov_as', 'putov_as@mail.ru', '&lt;p&gt;bg&lt;/p&gt;\n', 1481732578, '852559bfd7e23579b6ee4ad357eb1fcd', 'sg6xGEIh', '/olimpiada.php?id=2'),
(132, 0, 0, 'Аноним', 'putov_as@mail.ru', '&lt;p&gt;896112&lt;/p&gt;\n', 1481732631, '852559bfd7e23579b6ee4ad357eb1fcd', 'yeNCIiOt', '/olimpiada.php?id=2'),
(133, 130, 2, 'putov_as', 'putov_as@mail.ru', '&lt;p&gt;dsa&lt;/p&gt;\n', 1481732649, '852559bfd7e23579b6ee4ad357eb1fcd', 'L1Xy7yhk', '/olimpiada.php?id=2'),
(134, 0, 0, 'Аноним', 'putov_as@mail.ru', '&lt;p&gt;dad&lt;/p&gt;\n', 1481732657, '852559bfd7e23579b6ee4ad357eb1fcd', 'EzcMxhyR', '/olimpiada.php?id=2'),
(135, 0, 2, 'putov_as', 'putov_as@mail.ru', '&lt;p&gt;sfd&lt;/p&gt;\n', 1481732664, '852559bfd7e23579b6ee4ad357eb1fcd', 'jrG28dod', '/olimpiada.php?id=2'),
(136, 0, 2, 'putov_as', 'putov_as@mail.ru', '&lt;p&gt;dsadsadsa&lt;/p&gt;\n', 1481733100, '852559bfd7e23579b6ee4ad357eb1fcd', '7UYD2kPl', '/olimpiada.php?id=2'),
(137, 135, 2, 'putov_as', 'putov_as@mail.ru', '&lt;p&gt;dsadsa&lt;/p&gt;\n', 1481733153, '852559bfd7e23579b6ee4ad357eb1fcd', 'um8ZA6Cd', '/olimpiada.php?id=2'),
(138, 137, 2, 'putov_as', 'putov_as@mail.ru', '&lt;p&gt;dsa&lt;/p&gt;\n', 1481733160, '852559bfd7e23579b6ee4ad357eb1fcd', 'Y7fpIDTA', '/olimpiada.php?id=2'),
(139, 135, 2, 'putov_as', 'putov_as@mail.ru', '&lt;p&gt;das&lt;/p&gt;\n', 1481733172, '852559bfd7e23579b6ee4ad357eb1fcd', 'rnR9eB25', '/olimpiada.php?id=2'),
(109, 0, 0, 'Аноним', 'putov_as@mail.ru', '&lt;p&gt;das&lt;/p&gt;\n', 1481731591, '852559bfd7e23579b6ee4ad357eb1fcd', 'P9zKSSNa', '/olimpiada.php?id=2'),
(110, 0, 2, 'putov_as', 'putov_as@mail.ru', '&lt;p&gt;das&lt;/p&gt;\n', 1481731596, '852559bfd7e23579b6ee4ad357eb1fcd', 'ToRdnOUL', '/olimpiada.php?id=2'),
(107, 0, 2, 'putov_as', 'putov_as@mail.ru', '&lt;p&gt;dsa&lt;/p&gt;\n', 1481731539, '852559bfd7e23579b6ee4ad357eb1fcd', '5TtTcESR', '/olimpiada.php?id=2'),
(108, 0, 2, 'putov_as', 'putov_as@mail.ru', '&lt;p&gt;das&lt;/p&gt;\n', 1481731560, '852559bfd7e23579b6ee4ad357eb1fcd', 'tCEmNjFG', '/olimpiada.php?id=2'),
(105, 0, 2, 'putov_as', 'putov_as@mail.ru', '&lt;p&gt;dsa&lt;/p&gt;\n', 1481731468, '852559bfd7e23579b6ee4ad357eb1fcd', 'mtEg0alP', '/olimpiada.php?id=2'),
(106, 0, 0, 'Аноним', 'putov_as@mail.ru', '&lt;p&gt;sad&lt;/p&gt;\n', 1481731536, '852559bfd7e23579b6ee4ad357eb1fcd', '7xLneodT', '/olimpiada.php?id=2'),
(104, 0, 0, 'Аноним', 'putov_as@mail.ru', '&lt;p&gt;das&lt;/p&gt;\n', 1481731463, '852559bfd7e23579b6ee4ad357eb1fcd', 'hoGkSmsP', '/olimpiada.php?id=2'),
(100, 0, 2, 'putov_as', 'putov_as@mail.ru', '&lt;p&gt;da&lt;/p&gt;\n', 1481731049, '852559bfd7e23579b6ee4ad357eb1fcd', '7M7SeuRY', '/olimpiada.php?id=2'),
(102, 0, 0, 'Аноним', 'putov_as@mail.ru', '&lt;p&gt;dsa&lt;/p&gt;\n', 1481731406, '852559bfd7e23579b6ee4ad357eb1fcd', '4kxcvBvj', '/olimpiada.php?id=2'),
(103, 0, 0, 'Аноним', 'putov_as@mail.ru', '&lt;p&gt;dsa&lt;/p&gt;\n', 1481731441, '852559bfd7e23579b6ee4ad357eb1fcd', 'yatUMkM9', '/olimpiada.php?id=2'),
(98, 0, 2, 'putov_as', 'putov_as@mail.ru', '&lt;p&gt;dsa&lt;/p&gt;\n', 1481731042, '852559bfd7e23579b6ee4ad357eb1fcd', 'oEd3rAFU', '/olimpiada.php?id=2'),
(99, 0, 2, 'putov_as', 'putov_as@mail.ru', '&lt;p&gt;dsa&lt;/p&gt;\n', 1481731045, '852559bfd7e23579b6ee4ad357eb1fcd', 'aVIGj4Tt', '/olimpiada.php?id=2'),
(97, 0, 2, 'putov_as', 'putov_as@mail.ru', '&lt;p&gt;das&lt;/p&gt;\n', 1481731038, '852559bfd7e23579b6ee4ad357eb1fcd', '6dO9Sjpt', '/olimpiada.php?id=2'),
(96, 0, 0, 'Аноним', 'putov_as@mail.ru', '&lt;p&gt;das&lt;/p&gt;\n', 1481731034, '852559bfd7e23579b6ee4ad357eb1fcd', 'rRNgRvrr', '/olimpiada.php?id=2'),
(95, 0, 2, 'putov_as', 'putov_as@mail.ru', '&lt;p&gt;dsa&lt;/p&gt;\n', 1481730824, '852559bfd7e23579b6ee4ad357eb1fcd', 'uX1Ct1ei', '/olimpiada.php?id=2'),
(94, 0, 2, 'putov_as', 'putov_as@mail.ru', '&lt;p&gt;das&lt;/p&gt;\n', 1481730819, '852559bfd7e23579b6ee4ad357eb1fcd', 'kD4E50NZ', '/olimpiada.php?id=2'),
(93, 0, 2, 'putov_as', 'putov_as@mail.ru', '&lt;p&gt;dsa&lt;/p&gt;\n', 1481730814, '852559bfd7e23579b6ee4ad357eb1fcd', '051D1VEr', '/olimpiada.php?id=2'),
(92, 0, 2, 'putov_as', 'putov_as@mail.ru', '&lt;p&gt;das&lt;/p&gt;\n', 1481730810, '852559bfd7e23579b6ee4ad357eb1fcd', 'au7MuA2Z', '/olimpiada.php?id=2'),
(91, 0, 0, 'Аноним', 'putov_as@mail.ru', '&lt;p&gt;dsa&lt;/p&gt;\n', 1481730807, '852559bfd7e23579b6ee4ad357eb1fcd', 'EaBmPkaO', '/olimpiada.php?id=2'),
(127, 0, 0, 'Аноним', 'putov_as@mail.ru', '&lt;p&gt;f&lt;/p&gt;\n', 1481732489, '852559bfd7e23579b6ee4ad357eb1fcd', 'IkyCiNLB', '/olimpiada.php?id=2'),
(126, 0, 0, 'Аноним', 'putov_as@mail.ru', '&lt;p&gt;sdf&lt;/p&gt;\n', 1481732485, '852559bfd7e23579b6ee4ad357eb1fcd', 'ApSjpS8p', '/olimpiada.php?id=2'),
(72, 0, 2, 'putov_as', 'putov_as@mail.ru', '&lt;p&gt;das&lt;/p&gt;\n', 1481729614, '8a3e43d52c14c4a83a3b2cc956b50c27', 'DInZG48v', '%2Folimpiada.php%3Fid%3D10'),
(73, 0, 2, 'putov_as', 'putov_as@mail.ru', '&lt;p&gt;das&lt;/p&gt;\n', 1481729627, '8a3e43d52c14c4a83a3b2cc956b50c27', 'ylSYXacE', '%2Folimpiada.php%3Fid%3D10'),
(125, 0, 2, 'putov_as', 'putov_as@mail.ru', '&lt;p&gt;d&lt;/p&gt;\n', 1481732444, '852559bfd7e23579b6ee4ad357eb1fcd', '9mZHfHYY', '/olimpiada.php?id=2'),
(123, 0, 2, 'putov_as', 'putov_as@mail.ru', '&lt;p&gt;ds&lt;/p&gt;\n', 1481732417, '8a3e43d52c14c4a83a3b2cc956b50c27', 'vgsOge2C', '/olimpiada.php?id=10'),
(124, 0, 0, 'Аноним', 'putov_as@mail.ru', '&lt;p&gt;sd&lt;/p&gt;\n', 1481732429, '8a3e43d52c14c4a83a3b2cc956b50c27', '4pls0V3e', '/olimpiada.php?id=10'),
(82, 0, 2, 'putov_as', 'putov_as@mail.ru', '&lt;p&gt;927523&lt;/p&gt;\n', 1481729994, '852559bfd7e23579b6ee4ad357eb1fcd', 'BzP7eVLd', '/olimpiada.php?id=2'),
(83, 0, 2, 'putov_as', 'putov_as@mail.ru', '&lt;p&gt;927523&lt;/p&gt;\n', 1481730002, '852559bfd7e23579b6ee4ad357eb1fcd', 'JBzXs4ht', '/olimpiada.php?id=2'),
(84, 0, 2, 'putov_as', 'putov_as@mail.ru', '&lt;p&gt;927523&lt;/p&gt;\n', 1481730007, '852559bfd7e23579b6ee4ad357eb1fcd', 'dfyAnFrp', '/olimpiada.php?id=2'),
(86, 0, 0, 'Аноним', 'putov_as@mail.ru', '&lt;p&gt;sadsad&lt;/p&gt;\n', 1481730757, '852559bfd7e23579b6ee4ad357eb1fcd', 'ugLmOOC7', '/olimpiada.php?id=2'),
(87, 0, 2, 'putov_as', 'putov_as@mail.ru', '&lt;p&gt;dsa&lt;/p&gt;\n', 1481730764, '852559bfd7e23579b6ee4ad357eb1fcd', 'N2vp99Ys', '/olimpiada.php?id=2'),
(88, 0, 2, 'putov_as', 'putov_as@mail.ru', '&lt;p&gt;dsa&lt;/p&gt;\n', 1481730768, '852559bfd7e23579b6ee4ad357eb1fcd', '36TLeaMs', '/olimpiada.php?id=2'),
(89, 0, 2, 'putov_as', 'putov_as@mail.ru', '&lt;p&gt;das&lt;/p&gt;\n', 1481730775, '852559bfd7e23579b6ee4ad357eb1fcd', 'YeD9UDRR', '/olimpiada.php?id=2'),
(90, 0, 2, 'putov_as', 'putov_as@mail.ru', '&lt;p&gt;das&lt;/p&gt;\n', 1481730778, '852559bfd7e23579b6ee4ad357eb1fcd', 'idtfSkVo', '/olimpiada.php?id=2'),
(145, 142, 2, 'putov_as', 'putov_as@mail.ru', '&lt;p&gt;fds&lt;/p&gt;\n', 1481733232, '852559bfd7e23579b6ee4ad357eb1fcd', '97JZKLxc', '/olimpiada.php?id=2'),
(146, 145, 2, 'putov_as', 'putov_as@mail.ru', '&lt;p&gt;fsd&lt;/p&gt;\n', 1481733238, '852559bfd7e23579b6ee4ad357eb1fcd', 'oDoJ5h6U', '/olimpiada.php?id=2'),
(147, 145, 0, 'Аноним', 'putov_as@mail.ru', '&lt;p&gt;fsd&lt;/p&gt;\n', 1481733244, '852559bfd7e23579b6ee4ad357eb1fcd', 'bOLAJPb6', '/olimpiada.php?id=2'),
(148, 147, 2, 'putov_as', 'putov_as@mail.ru', '&lt;p&gt;das&lt;/p&gt;\n', 1481733253, '852559bfd7e23579b6ee4ad357eb1fcd', 'boygx0As', '/olimpiada.php?id=2'),
(149, 148, 0, 'Аноним', 'putov_as@mail.ru', '&lt;p&gt;das&lt;/p&gt;\n', 1481733262, '852559bfd7e23579b6ee4ad357eb1fcd', 'c0vxb14N', '/olimpiada.php?id=2'),
(150, 0, 0, 'Аноним', 'putov_as@mail.ru', '&lt;p&gt;dsa&lt;/p&gt;\n', 1481733266, '852559bfd7e23579b6ee4ad357eb1fcd', 'XMo9s8jR', '/olimpiada.php?id=2'),
(151, 149, 2, 'putov_as', 'putov_as@mail.ru', '&lt;p&gt;dsa&lt;/p&gt;\n', 1481733271, '852559bfd7e23579b6ee4ad357eb1fcd', 'b5ZO7f9m', '/olimpiada.php?id=2'),
(152, 0, 2, 'putov_as', 'putov_as@mail.ru', '&lt;p&gt;dsa&lt;/p&gt;\n', 1481733277, '852559bfd7e23579b6ee4ad357eb1fcd', 'FK1kRaf7', '/olimpiada.php?id=2'),
(153, 151, 0, 'Аноним', 'putov_as@mail.ru', '&lt;p&gt;dsa&lt;/p&gt;\n', 1481733284, '852559bfd7e23579b6ee4ad357eb1fcd', '0AastBrL', '/olimpiada.php?id=2'),
(154, 0, 26, '11', '@', '&lt;p&gt;моя&lt;/p&gt;\n', 1481796087, '1607eafad805eba61abdef7cf6945389', 'ZFjZkzpB', '/olimpiada.php?id=12'),
(155, 0, 0, 'Аноним', '@', '&lt;p&gt;моя&lt;/p&gt;\n', 1481796127, '1607eafad805eba61abdef7cf6945389', 'xRDcP4I7', '/olimpiada.php?id=12'),
(156, 155, 26, '11', '@', '&lt;p&gt;да&lt;/p&gt;\n', 1481796151, '1607eafad805eba61abdef7cf6945389', 'hcZx4DYU', '/olimpiada.php?id=12'),
(157, 156, 26, '11', '@', '&lt;p&gt;нет&lt;/p&gt;\n', 1481796165, '1607eafad805eba61abdef7cf6945389', 'ajOaARhD', '/olimpiada.php?id=12'),
(158, 157, 26, '11', '@', '&lt;p&gt;ух&lt;/p&gt;\n', 1481796198, '1607eafad805eba61abdef7cf6945389', 'J04B4n9m', '/olimpiada.php?id=12'),
(159, 158, 26, '11', '@', '&lt;p&gt;й&lt;/p&gt;\n', 1481796212, '1607eafad805eba61abdef7cf6945389', 'znb10aK0', '/olimpiada.php?id=12');

-- --------------------------------------------------------

--
-- Структура таблицы `Message`
--
-- Создание: Мар 24 2017 г., 09:02
--

CREATE TABLE `Message` (
  `Professor_ Users_id` int(11) NOT NULL,
  `schoolboy_ Users_id` int(11) NOT NULL,
  `Message` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `olympics`
--
-- Создание: Мар 24 2017 г., 09:02
--

CREATE TABLE `olympics` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_olympiad` varchar(80) NOT NULL,
  `Olympiad_status` tinyint(1) NOT NULL,
  `date` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `subject` varchar(51) NOT NULL,
  `professor_users_id` int(11) NOT NULL,
  `classes` varchar(50) NOT NULL,
  `terms` date NOT NULL,
  `location` varchar(100) NOT NULL,
  `nextStage` varchar(50) NOT NULL DEFAULT '0' COMMENT 'n!n+1!n+2! - первый этап многоэтапной; число > 0 - указатель на следующий этап; 0 - либо одноэтапная олимпиада, либо последний этап из многоэтапной  ',
  `IsChild` int(11) NOT NULL DEFAULT '0' COMMENT '0 - одноэтапная или родитель; 1 - является этапом',
  `process` varchar(11) NOT NULL DEFAULT 'in process' COMMENT 'in process - олимпиада действующая, passed - олимпиада прошла, stage - этап, не нужно выводить на главной',
  `rangeStage` int(11) DEFAULT NULL COMMENT 'ученики, набравшие больше или равное кол-во баллов переходят на сл этап'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `olympics`
--

INSERT INTO `olympics` (`id`, `name_olympiad`, `Olympiad_status`, `date`, `description`, `subject`, `professor_users_id`, `classes`, `terms`, `location`, `nextStage`, `IsChild`, `process`, `rangeStage`) VALUES
(1, 'Всесибирская открытая олимпиада школьников', 1, '2016-12-14 20:25!2016-12-14 20:49!', 'Приходите!', 'Русский язык!Информатика!', 2, '7-11', '2025-12-19', 'г.Владивосток ул.Нерчинская 34а каб.450', '0', 0, 'passed', NULL),
(2, 'Всесибирская открытая олимпиада школьников. 2', 1, '2016-12-15 22:22!', 'приходите', 'Математика!', 2, '2-4', '2016-12-17', 'г.гУссурийск ул.Нерчинская 32', '0', 0, 'passed', NULL),
(3, 'оЛИМПИАДА', 1, '2016-12-14 20:59!', '', 'Математика!', 2, '1-3', '2016-12-14', 'г.Арсеньев ул.Ленинская 65', '0', 0, 'passed', NULL),
(4, 'Межрегиональная олимпиада школьников «Евразийская лингвистическая олимпиада»', 1, '2016-12-14 20:59!', '', 'Математика!Русский язык!', 15, '8-11', '2016-12-14', 'г.Владивосток ул.Посташева 23', '0', 0, 'passed', NULL),
(5, 'Олимпиада школьников «Звезда - Таланты на службе обороны и безопасности»', 1, '2016-10-11 00:00!', 'Среди 5-8 классов', 'Математика!Русский язык!', 2, '5-8', '0000-00-00', '', '0', 0, 'passed', NULL),
(7, 'Олимпиада школьников по информатике и программированию ', 1, '2017-01-12 10:00!2006-01-16 11:00!', '', 'Математика!Русский язык!', 2, '1-4', '2017-01-10', 'г.Владивосток ул.Нерчинская 34а', '0', 0, 'passed', NULL),
(8, 'Открытая олимпиада школьников «Информационные технологии»', 1, '2016-12-26 09:00!2016-12-28 10:00!2016-12-29 11:00!', 'Возможны изменения по второму этапу', 'Информатика!', 15, '9-11', '2016-12-25', 'г.Владивосток ул.Русская д.90', '0', 0, 'passed', NULL),
(9, ' Межрегиональная олимпиада школьников «Высшая проба»', 1, '2017-01-30 12:00!', 'Возможен второй этап', 'Обществознание!Информатика!Русский язык!Математика!', 15, '6-8', '2016-12-15', 'г.Хабаровск ул.Романова д.55', '0', 0, 'passed', NULL),
(10, 'Открытая олимпиада школьников по математике и информатике', 1, '2016-01-17 12:00!2016-01-01 00:00!2016-01-01 00:00!2016-01-01 00:00!2016-01-01 00:00!', 'пропло', 'Информатика!Русский язык!Математика!', 2, '2,11', '2016-02-12', 'г.Артем ул.Фрунзе 37б', '0', 0, 'passed', NULL),
(22, 'Океан знаний', 1, '2017-03-18 12:00!', 'Приглашаем всех принять участие! Будем рады Вас видеть!', 'Обществознание!', 27, '1-11', '2017-03-10', 'ул.Октябрьская 37, ауд. 406', '23!24!', 0, 'in process', 50),
(23, 'Океан знаний - 2 этап', 0, '2017-04-26 13:30!', 'Приглашаем всех принять участие! Будем рады Вас видеть!', 'Обществознание!', 27, '1-11', '2017-03-10', 'ул. Алеутская 49, ауд. 33', '24', 1, 'stage', NULL),
(24, 'Океан знаний - 3 этап', 0, '2017-05-04 12:30!', 'Приглашаем всех принять участие! Будем рады Вас видеть!', 'Обществознание!', 27, '1-11', '2017-03-10', 'кампус ДВФУ, ауд. D306', '0', 1, 'stage', NULL),
(25, 'привет', 0, '2018-03-19 00:00!', 'вапро', 'Математика!', 27, '6', '2017-07-18', 'место1', '26!', 0, 'in process', NULL),
(26, 'привет - 2 этап', 0, '2019-09-18 00:00!', 'вапро', 'Математика!', 27, '6', '2017-07-18', 'место2', '0', 1, 'stage', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `professor`
--
-- Создание: Мар 24 2017 г., 09:02
--

CREATE TABLE `professor` (
  `users_id` int(11) NOT NULL,
  `Fio_professor` varchar(80) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `professor`
--

INSERT INTO `professor` (`users_id`, `Fio_professor`, `phone`, `email`) VALUES
(2, 'Путов!Александр!Сергеевич!', '+79243328360', 'putov_as@mail.ru'),
(12, 'Некрасова!Валентина!Семеновна!', '+79249618080', 'nekrasova_vs@gmail.com'),
(13, 'Иванова!Софья!Романовна!', '+7423 231-82-62', 'ivanova@mail.com'),
(14, 'Помаскин!Владимир!Владимирович!', '+79361248595', 'pomaskin_vv@mail.ru'),
(15, 'Хмурович!Анна!Ивановна!', '89513699015', 'hmurovich@bk.ru'),
(26, 'Ф!С!Ц!', 'укк', '@'),
(27, 'Маркова!Альбина!Владимировна!', '89020687425', 'alya@mail.ru'),
(29, 'Организаторов!Организатор!Организаторович!', '89020607859', 'org@org'),
(32, 'Органдеева!Наталья!Олеговна!', '2354675', 'nata@mail.ru'),
(33, 'Мастер!Александр!Эдуардович!', '8902068', 'master@mail'),
(35, 'организатор!организаторович!организаторов!', NULL, 'org@mail');

-- --------------------------------------------------------

--
-- Структура таблицы `schoolboy`
--
-- Создание: Мар 24 2017 г., 09:02
--

CREATE TABLE `schoolboy` (
  `Users_id` int(11) NOT NULL,
  `Fio_schoolboy` varchar(80) NOT NULL,
  `school` varchar(200) CHARACTER SET cp1251 NOT NULL,
  `class` int(11) NOT NULL,
  `birthdate` date NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email` varchar(40) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `delivery` varchar(300) NOT NULL,
  `home_adress` varchar(200) NOT NULL,
  `rating` decimal(11,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `schoolboy`
--

INSERT INTO `schoolboy` (`Users_id`, `Fio_schoolboy`, `school`, `class`, `birthdate`, `phone`, `email`, `gender`, `delivery`, `home_adress`, `rating`) VALUES
(4, 'Синицына!Любовь!Анатольевна!', 'Средняя образовательная школа №29', 9, '1998-01-01', '89145985260', 'cinicina@gmail.com', 'Женский', '0', 'г.Владивосток ул.Днепровская 56 кв.5', '63'),
(6, 'Куралесиков!Андрей!Федорович!', 'Начальная общеобразовательная школа №10', 1, '1998-01-01', '89831569874', 'kuralesikov@mail.ru', 'Мужской', '1', 'г.Владивосток ул.Невская д.7 кв.97', '52'),
(7, 'Меньшиков!Максим!Вячеславович!', 'Начальная общеобразовательная школа №10', 2, '1998-01-01', '89149872001', 'menshikov@mail.ru', 'Мужской', '0', 'г.Владивосток ул.Невская д.7 кв.40', '0'),
(8, 'Фиалочкина!Мария!Александровна!', 'Начальная общеобразовательная школа №10', 3, '2007-11-18', '+79281456908', 'fialochkina@mail.ru', 'Женский', '1', 'г.Владивосток ул.Невская д.49 кв.64', '0'),
(9, 'Боевич!Петр!Артемович!', 'Средняя общеобразовательная школа №51 с углубленным изучением японского языка', 8, '2002-03-07', '+79801515155', 'boevich@mail.ru', 'Мужской', '0', 'г. Владивосток ул.Вострецова д.19 кв.10', '10'),
(11, 'Боевич!Эдуард!Антонович!', 'Средняя общеобразовательная школа №51 с углубленным изучением японского языка', 8, '2002-04-05', '+79801515100', 'boevich_ae@mail.ru', 'Мужской', '1', 'г. Владивосток ул.Вострецова д.19 кв.10', '0'),
(16, 'Мурзиков!Владимир!Павлович!', 'Средняя общеобразовательная школа №68', 11, '1999-09-10', '89145930824', 'murzikov_vp@mail.ru', 'Мужской', '0', 'г.Владивосток Иртышкая 40 кв.72', '77'),
(17, 'Мурзиков!Руслан!Павлович!', 'Средняя общеобразовательная школа №68', 11, '1999-09-10', '89145930820', 'murzikov_rp', 'Мужской', '1', 'г.Владивосток Иртышкая 40 кв.72', '45'),
(20, 'Иванов!Иван!Иванович!', 'Шен', 10, '1997-01-01', '89243328360', 'aleksandr-putov@mail.ru', 'Мужской', '1', 'г.Владивосток Иртышкая 40 кв.72', '0'),
(22, 'Клокова!Анастасия!Владимировна!', 'Средняя общеобразовательная школа №68', 10, '2003-04-01', '89243328360', 'klocova_av@mail.ru', 'Женский', '1', 'г.Владивосток Иртышкая 40 кв.72', '0'),
(23, 'Путов!Александр!Павлович!', 'Средняя общеобразовательная школа №68', 3, '2000-03-03', '89145930820', '89243328360', 'Мужской', '0', 'г.Владивосток Иртышкая 40 кв.72', '0'),
(24, 'Путов!Олеся!Викторовна!', 'Шен', 3, '1997-01-01', '+79084599123', '89243328360', 'Женский', '1', 'Владивосток', '0'),
(25, 'Мискарова!Олеся!Викторовна!', 'Гимназия №2', 2, '1997-01-01', '89243328360', 'aleksandr-putov@mail.ru', 'Мужской', '1', 'gvj', '0'),
(28, 'Школьников!Школьник!Школьникович!', 'хорошая школа', 5, '2004-06-03', '89144567838', 'school@school', 'Мужской', '1', 'школа - второй дом!', '39'),
(30, 'Неподтверждённая!Школьница!Школьниковна!', 'неподтверждённая школа', 9, '2000-05-14', '', 'non@non', 'Женский', '0', 'школа', '0'),
(31, 'Безрассылочный!Школьник!Школьникович!', 'школааа', 8, '2008-09-11', '', 'nospam@nospam', 'Мужской', '0', 'там, где нет рассылок', '86'),
(34, 'Приветов!Привет!Приветович!', 'норм', 11, '1998-09-18', NULL, 'hello@hello', 'Мужской', '1', 'приветовка', '0');

-- --------------------------------------------------------

--
-- Структура таблицы `schoolboy_olympics`
--
-- Создание: Мар 24 2017 г., 09:02
--

CREATE TABLE `schoolboy_olympics` (
  `olympics_id` int(11) NOT NULL,
  `schoolboy_users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `schoolboy_olympics`
--

INSERT INTO `schoolboy_olympics` (`olympics_id`, `schoolboy_users_id`) VALUES
(1, 17),
(1, 16),
(4, 16),
(10, 17),
(8, 17),
(2, 7),
(7, 7),
(10, 9),
(9, 9),
(9, 11),
(8, 16),
(8, 20),
(22, 28),
(22, 31),
(22, 4),
(22, 6),
(23, 31),
(23, 4),
(23, 6);

-- --------------------------------------------------------

--
-- Структура таблицы `schoolboy_past_olympics`
--
-- Создание: Мар 24 2017 г., 09:02
--

CREATE TABLE `schoolboy_past_olympics` (
  `olympics_id` int(11) NOT NULL,
  `schoolboy_users_id` int(11) NOT NULL,
  `rating_mark` decimal(11,0) NOT NULL,
  `place` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `schoolboy_past_olympics`
--

INSERT INTO `schoolboy_past_olympics` (`olympics_id`, `schoolboy_users_id`, `rating_mark`, `place`) VALUES
(1, 17, '45', '2'),
(1, 16, '32', '3'),
(4, 16, '45', '2'),
(10, 17, '0', '0'),
(10, 9, '0', '0'),
(2, 7, '0', '0'),
(9, 9, '10', '0'),
(8, 17, '0', '0'),
(7, 7, '0', '0'),
(8, 16, '0', '0'),
(9, 11, '0', '0'),
(8, 20, '0', '0'),
(22, 28, '39', '0'),
(22, 31, '86', '0'),
(22, 4, '63', '0'),
(22, 6, '52', '0');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--
-- Создание: Мар 24 2017 г., 09:02
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `pass` varchar(80) NOT NULL,
  `rights` int(2) NOT NULL,
  `activation` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `rights`, `activation`) VALUES
(2, 'putov_as', '6b11236768919a6511464d98b0790294', 3, 1),
(4, 'cinicina_la', 'd487def47ebb5c03ccb3d75c721f26b9', 1, 1),
(6, 'kuralesikov_af', '4e1151819f4b4e1c04e28761af2c476b', 1, 1),
(7, 'menshikov_mv', '44d48d933c7210dd8ab4360065cda3e0', 1, 1),
(8, 'fialochkina_la', 'f475c2f3bbc3a972c66005fd9ce53875', 1, -1),
(9, 'boevichhh_pa', 'c6e1ab193a17f552b950d19d5ae4362a', 1, 1),
(11, 'boevich_ea', '4275b158afb179e7078b2cf1723223a4', 1, 1),
(12, 'nekrasova_vs', 'ee57c1225d3a8aa1e87fc15e07827acb', 2, 1),
(13, 'ivanova_sr', '6b6a0fb0dff430f701e3594825a51af0', 2, -1),
(14, 'pomaskin_vv', '8f2f041180c7ac63485fa04f27d4664e', 2, 0),
(15, 'hmurovich_ai', '3ac11a3bb2dc1fbe22cbf39d5c688bba', 2, 1),
(16, 'murzikov_vp', '7ff9e3ba10be282396be30513e0208bc', 1, 1),
(17, 'murzikov_rp', '7ff9e3ba10be282396be30513e0208bc', 1, 1),
(20, 'Ivanov_ii', '3d14138fa92c14e3f7a0146fc1939477', 1, 1),
(22, 'klocova_av', 'a296b58659167e6b3ffffe3503daf5ee', 1, 0),
(23, 'putov_ap', '6b11236768919a6511464d98b0790294', 1, 1),
(24, 'qqq', 'b2ca678b4c936f905fb82f2733f5297f', 1, -1),
(25, 'www', 'd41d8cd98f00b204e9800998ecf8427e', 1, 0),
(26, '11', '202cb962ac59075b964b07152d234b70', 2, 0),
(27, 'alya_mv', '1cbfa9c878ef8692c1ae21e4cfa11000', 3, 1),
(28, 'shkolnik', 'e47d64f9a6ff4fe0cac2ed5129216651', 1, 1),
(29, 'organizer', '86099590d2ae57c4f7f4e993d395163d', 2, 1),
(30, 'schnonconfirm', '2a916583c75aa427a9cfe47a85ddd225', 1, -2),
(31, 'shkolniknospam', 'cfbc0392d6aee09524fdd01cfc4cae57', 1, 1),
(32, 'nata', '093d8a0793df4654fee95cc1215555b3', 2, 0),
(33, 'master', 'eb0a191797624dd3a48fa681d3061212', 2, 0),
(34, 'hello', '5d41402abc4b2a76b9719d911017c592', 1, 1),
(35, 'orgorg', '5ed338c495cdd33e6c6f984e4284a07c', 2, 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`idd`),
  ADD KEY `id` (`idd`);

--
-- Индексы таблицы `olympics`
--
ALTER TABLE `olympics`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `schoolboy`
--
ALTER TABLE `schoolboy`
  ADD PRIMARY KEY (`Users_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `idd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;
--
-- AUTO_INCREMENT для таблицы `olympics`
--
ALTER TABLE `olympics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
