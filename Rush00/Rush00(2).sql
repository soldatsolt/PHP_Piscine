-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Oct 13, 2019 at 05:59 PM
-- Server version: 8.0.17
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Rush00`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '0',
  `name` varchar(64) NOT NULL,
  `category` varchar(32) NOT NULL,
  `hero` varchar(32) NOT NULL,
  `id` int(11) NOT NULL,
  `url` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`price`, `quantity`, `name`, `category`, `hero`, `id`, `url`) VALUES
(4, 0, 'Флэш против негодяев', 'Flash', 'Flash', 1, 'https://files.slack.com/files-pri/TE6FVDN1Y-FPDQ5P1GW/__________________________________________.__________2.jpg'),
(5, 0, 'Аквамен книга 4', 'Aquaman', 'Aquaman', 2, 'https://files.slack.com/files-pri/TE6FVDN1Y-FPDDUFRUP/______________________________.__________4.jpg'),
(5, 0, 'Лига справедливости 6', 'Ligue', 'Ligue', 3, 'https://files.slack.com/files-pri/TE6FVDN1Y-FNYQK19SN/____________________________________________________________________.__________6.jpg'),
(5, 0, 'ТОР', '-', '-', 4, 'https://static-eu.insales.ru/r/w-r8fiH5Z14/fit/530/530/ce/1/plain/images/products/1/141/252141709/tor-kto-derjit-molot.jpg@webp'),
(7, 0, 'Batman 675', 'Batman', 'Batman', 5, 'https://im0-tub-ru.yandex.net/i?id=664df8c30484206188c110ebec04d61e-l&n=13'),
(15, 0, 'Batman 201', 'Batman', 'Batman', 6, 'https://im0-tub-ru.yandex.net/i?id=301ad6d8bfff4a6dd4ef55b1daf0ff0f-l&n=13&w=236&h=350'),
(14, 0, 'Flash 94', 'Flash', 'Flash', 7, 'https://im0-tub-ru.yandex.net/i?id=8e46a85b522cc2800ee2dadf02d00b5e-l&n=13'),
(10, 0, 'Flash 29', 'Flash', 'Flash', 8, 'https://im0-tub-ru.yandex.net/i?id=8689aacd0abb9fe56f029dec97b3b8f0-l&n=13'),
(10, 0, 'JUSTICE!', 'Ligue', 'Ligue', 9, 'https://i.ebayimg.com/00/s/MTYwMFgxMDQx/z/hb8AAOSwBXhbF~tv/$_57.JPG?set_id=8800005007'),
(50, 0, '1 Legue', 'Ligue', 'Ligue', 10, 'https://im0-tub-ru.yandex.net/i?id=8fff3806f675d886c6b2881ab9c659af-l&n=13'),
(40, 0, 'Aquaman2', 'Aquaman', 'Aquaman', 11, 'https://im0-tub-ru.yandex.net/i?id=da5d5070eed649a10bc8118022a262c1-l&n=13'),
(30, 0, 'Aquaman31', 'Aquaman', 'Aquaman', 12, 'https://im0-tub-ru.yandex.net/i?id=c5b5bccb76fbf32ec9597136689534c8-l&n=13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `login` varchar(32) NOT NULL,
  `mail` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'default',
  `passwd` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`login`, `mail`, `passwd`) VALUES
('admin', 'admin@admin.admin', 'admin'),
('xzcz', 'sdas', 'asdg'),
('cxzzxczxcz', 'gvfevfs', 'sdfadsdwdf'),
('batman', 'batman@mail.ru', 'batman'),
('qwe', 'qwe', 'qwe'),
('asd', 'asd', 'asd'),
('cxz', 'czx', '968ff9ee79cc3a96cb3bfb2302ac4f7201e38f66a2d4a9788a822862a3b957373d7af13abd161716961f053bf8708c0075c4e5d77046e2e828c6c72451dc01d8'),
('fgh', 'fgh', '2924a58ddac44b79e5be87498b2c504dc832437f06ac027963a1dd293a989c22080091610d19d58b69db31aaef60c383d877de921a686036be2aabab9401927a');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
