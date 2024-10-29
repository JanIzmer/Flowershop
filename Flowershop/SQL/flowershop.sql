-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 02, 2024 at 07:52 PM
-- Wersja serwera: 8.0.31
-- Wersja PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flowershop`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `article`
--

CREATE TABLE `article` (
  `id_article` int NOT NULL,
  `article_name` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `amount` int NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `img` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `opis` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id_article`, `article_name`, `amount`, `price`, `img`, `opis`) VALUES
(1, 'Bukiet białych róż', 5, 9.00, '1.jpg', 'Jednym z symboli wesela i samego ślubu są kwiaty. Nie może ich więc zabraknąć na takiej uroczystości. Trendy i nawyki w tej materii ulegają przetasowaniom, co sprawiło, że znów popularnością cieszy się gipsówka. Warto zatem przyjrzeć się temu gatunkowi kwiatów i poznać sposoby ich wykorzystania.\r\n\r\nZapewne wielu osobom ten kwiat może kojarzyć się z przełomem lat 80-tych i 90-tych, kiedy to właśnie bukiet ślubny z gipsówki był bardzo popularny. Warto jednak odnotować fakt, iż właśnie teraz te drobne kwiatki mają ponownie okres swojej świetności i znów bardzo chętnie wykorzystuje się je właśnie przy bukietach. Z tą różnicą, że współcześnie wygląda to jeszcze bardziej okazale i do tego prezentuje niebanalny styl.'),
(2, 'Gipsówki', 5, 6.00, '2.jpg', 'Jednym z symboli wesela i samego ślubu są kwiaty. Nie może ich więc zabraknąć na takiej uroczystości. Trendy i nawyki w tej materii ulegają przetasowaniom, co sprawiło, że znów popularnością cieszy się gipsówka. Warto zatem przyjrzeć się temu gatunkowi kwiatów i poznać sposoby ich wykorzystania.\r\n\r\nZapewne wielu osobom ten kwiat może kojarzyć się z przełomem lat 80-tych i 90-tych, kiedy to właśnie bukiet ślubny z gipsówki był bardzo popularny. Warto jednak odnotować fakt, iż właśnie teraz te drobne kwiatki mają ponownie okres swojej świetności i znów bardzo chętnie wykorzystuje się je właśnie przy bukietach. Z tą różnicą, że współcześnie wygląda to jeszcze bardziej okazale i do tego prezentuje niebanalny styl.'),
(3, 'Bukiet fioletowych róż', 2, 199.98, '3.jpg', 'Każdy z nas ma czasem gorszy dzień. Natłok obowiązków w pracy, kłótnia z partnerem czy przypalony obiad potrafią skutecznie popsuć humor. Bukiet kolorowych kwiatów z pewnością nie rozwiąże wszystkich problemów, za to skutecznie poprawi nam nastrój, co zostało udowodnione naukowo. Za co kochamy kwiaty? Za ich piękno, delikatność i zapach. Węch to najstarszy ze zmysłów, a wszystko to, co wyczujemy nosem, przetwarzane jest przez układ limbiczny. Jest on odpowiedzialny za odczuwanie emocji i wydzielanie endorfin, które nazywane są „hormonami szczęścia”. Osoby, które otaczają się ulubionymi kwiatami, są szczęśliwsze, bardziej zadowolone z siebie i pozytywniej odbierają rzeczywistość.'),
(4, 'Bukiet z niebieskich róz', 5, 98.99, '9.jpg', 'Każdy z nas ma czasem gorszy dzień. Natłok obowiązków w pracy, kłótnia z partnerem czy przypalony obiad potrafią skutecznie popsuć humor. Bukiet kolorowych kwiatów z pewnością nie rozwiąże wszystkich problemów, za to skutecznie poprawi nam nastrój, co zostało udowodnione naukowo. Za co kochamy kwiaty? Za ich piękno, delikatność i zapach. Węch to najstarszy ze zmysłów, a wszystko to, co wyczujemy nosem, przetwarzane jest przez układ limbiczny. Jest on odpowiedzialny za odczuwanie emocji i wydzielanie endorfin, które nazywane są „hormonami szczęścia”. Osoby, które otaczają się ulubionymi kwiatami, są szczęśliwsze, bardziej zadowolone z siebie i pozytywniej odbierają rzeczywistość.'),
(5, 'Pięćdziesiąt czerwonych róż', 3, 169.00, '8.jpg', 'Każdy z nas ma czasem gorszy dzień. Natłok obowiązków w pracy, kłótnia z partnerem czy przypalony obiad potrafią skutecznie popsuć humor. Bukiet kolorowych kwiatów z pewnością nie rozwiąże wszystkich problemów, za to skutecznie poprawi nam nastrój, co zostało udowodnione naukowo. Za co kochamy kwiaty? Za ich piękno, delikatność i zapach. Węch to najstarszy ze zmysłów, a wszystko to, co wyczujemy nosem, przetwarzane jest przez układ limbiczny. Jest on odpowiedzialny za odczuwanie emocji i wydzielanie endorfin, które nazywane są „hormonami szczęścia”. Osoby, które otaczają się ulubionymi kwiatami, są szczęśliwsze, bardziej zadowolone z siebie i pozytywniej odbierają rzeczywistość.'),
(13, 'Bukiet różowych róz', 4, 119.00, '10.jpg', 'Każdy z nas ma czasem gorszy dzień. Natłok obowiązków w pracy, kłótnia z partnerem czy przypalony obiad potrafią skutecznie popsuć humor. Bukiet kolorowych kwiatów z pewnością nie rozwiąże wszystkich problemów, za to skutecznie poprawi nam nastrój, co zostało udowodnione naukowo. Za co kochamy kwiaty? Za ich piękno, delikatność i zapach. Węch to najstarszy ze zmysłów, a wszystko to, co wyczujemy nosem, przetwarzane jest przez układ limbiczny. Jest on odpowiedzialny za odczuwanie emocji i wydzielanie endorfin, które nazywane są „hormonami szczęścia”. Osoby, które otaczają się ulubionymi kwiatami, są szczęśliwsze, bardziej zadowolone z siebie i pozytywniej odbierają rzeczywistość.'),
(14, 'Rózowy bukiet', 5, 109.00, '13.jpg', 'Każdy z nas ma czasem gorszy dzień. Natłok obowiązków w pracy, kłótnia z partnerem czy przypalony obiad potrafią skutecznie popsuć humor. Bukiet kolorowych kwiatów z pewnością nie rozwiąże wszystkich problemów, za to skutecznie poprawi nam nastrój, co zostało udowodnione naukowo. Za co kochamy kwiaty? Za ich piękno, delikatność i zapach. Węch to najstarszy ze zmysłów, a wszystko to, co wyczujemy nosem, przetwarzane jest przez układ limbiczny. Jest on odpowiedzialny za odczuwanie emocji i wydzielanie endorfin, które nazywane są „hormonami szczęścia”. Osoby, które otaczają się ulubionymi kwiatami, są szczęśliwsze, bardziej zadowolone z siebie i pozytywniej odbierają rzeczywistość.'),
(15, 'Bukiet białych róz', 5, 221.00, '7.webp', 'Każdy z nas ma czasem gorszy dzień. Natłok obowiązków w pracy, kłótnia z partnerem czy przypalony obiad potrafią skutecznie popsuć humor. Bukiet kolorowych kwiatów z pewnością nie rozwiąże wszystkich problemów, za to skutecznie poprawi nam nastrój, co zostało udowodnione naukowo. Za co kochamy kwiaty? Za ich piękno, delikatność i zapach. Węch to najstarszy ze zmysłów, a wszystko to, co wyczujemy nosem, przetwarzane jest przez układ limbiczny. Jest on odpowiedzialny za odczuwanie emocji i wydzielanie endorfin, które nazywane są „hormonami szczęścia”. Osoby, które otaczają się ulubionymi kwiatami, są szczęśliwsze, bardziej zadowolone z siebie i pozytywniej odbierają rzeczywistość.');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `article_in_order`
--

CREATE TABLE `article_in_order` (
  `cart_article_id` int NOT NULL,
  `id_order` int NOT NULL,
  `id_article` int NOT NULL,
  `ilosc` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `article_in_order`
--

INSERT INTO `article_in_order` (`cart_article_id`, `id_order`, `id_article`, `ilosc`) VALUES
(1, 2, 2, 2),
(3, 3, 4, 1),
(4, 1, 15, 1),
(5, 2, 3, 5),
(6, 1, 1, 1),
(7, 2, 2, 1),
(8, 2, 3, 1),
(11, 8, 2, 1),
(12, 8, 2, 1),
(13, 8, 15, 1),
(14, 9, 3, 1),
(15, 9, 2, 1),
(16, 9, 4, 1),
(17, 9, 15, 1),
(18, 9, 2, 1),
(19, 9, 2, 1),
(20, 10, 3, 1),
(21, 10, 2, 1),
(22, 10, 3, 1),
(23, 9, 3, 1),
(24, 14, 1, 1),
(25, 15, 2, 1),
(26, 15, 1, 1),
(27, 16, 3, 1),
(30, 16, 4, 1),
(33, 17, 3, 1),
(34, 18, 2, 1),
(35, 19, 3, 1),
(36, 20, 2, 1),
(37, 21, 2, 1),
(38, 22, 3, 1),
(39, 23, 2, 1),
(40, 24, 3, 1),
(41, 25, 2, 1),
(42, 26, 3, 1),
(43, 26, 4, 1),
(44, 27, 2, 1),
(45, 28, 3, 1),
(46, 28, 4, 1),
(47, 29, 15, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `orders`
--

CREATE TABLE `orders` (
  `id_order` int NOT NULL,
  `id_user` int NOT NULL,
  `condition` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `adres` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id_order`, `id_user`, `condition`, `adres`, `price`) VALUES
(2, 20, 'Oczekujace', '', 0.00),
(8, 22, 'Oczekujace', '', 0.00),
(9, 21, 'W realizacji', '', 0.00),
(10, 23, 'Oczekujace', '', 0.00),
(13, 15, 'W realizacji', 'al. Jerozolimskie 134', 0.00),
(14, 21, 'W realizacji', '', 0.00),
(15, 21, 'W realizacji', '', 0.00),
(16, 21, 'W realizacji', '', 298.97),
(17, 24, 'W realizacji', '', 0.00),
(18, 24, 'W realizacji', '', 0.00),
(19, 24, 'W realizacji', '', 0.00),
(20, 24, 'W realizacji', '', 0.00),
(21, 24, 'W realizacji', '', 0.00),
(22, 24, 'W realizacji', '', 0.00),
(23, 24, 'W realizacji', '', 0.00),
(24, 24, 'W realizacji', '', 0.00),
(25, 24, 'W realizacji', '', 0.00),
(26, 24, 'W realizacji', '', 0.00),
(27, 24, 'W realizacji', '', 6.00),
(28, 24, 'W realizacji', '', 298.97),
(29, 21, 'W realizacji', '', 221.00);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `firstname` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `secondname` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `passwordhash` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `adres` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `firstname`, `secondname`, `email`, `passwordhash`, `adres`) VALUES
(9, 'Jan', 'Izmer', 'a333@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$eS56Wm5ZcVdzL2dPNkVKYQ$9RZ1LQWBCGDBOIeSneicTg30Wpd0EpXBQ3G0h7BNmRQ', 'Kartaginy 22, m.28 , 02-762, Warszawa'),
(15, 'alina', 'radziusz', 'alina@sobaka.com', '$argon2i$v=19$m=65536,t=4,p=1$aWxzeDBRYy9HL1VieXVveg$nUq4P7k6YVMiyvdVJGyferipYiOAMXOOa7dmzpsYMiA', NULL),
(16, 'Jan', 'Admin', 'admin@admin.pl', '$argon2i$v=19$m=65536,t=4,p=1$UmpraGgyalIzYndvZG9sQQ$9JBSXbeDiRD9PjnlYJNwX5xw3KEbNMIBA8CBikOIzUs', NULL),
(19, 'Jan', 'radziusz', 'gosha@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$YXFSTnFBVXVEcDZRME5KNg$LT30fDNlRGjCmCgvUaVQoH09w9hy8sJfUgcXPCtU6MM', '123'),
(20, 'Yan', 'Izmer', 'jan111@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$NzRaUVBOMnRZYkNwbUZLUw$OL1k/zmPrdTxCC9h9GDMklNAEMiBwL+tMM2FkziHIT4', 'Marszałkowska 8,Warszawa, 02-765'),
(21, 'Yan', 'Izmer', 'jan11@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$dXg1N1d0a3o5Vm41YTFmUQ$l8BSvD9rMXn0Lx+EPkwL2jpvObpJIeE4ToR7PSRPPM0', ''),
(22, 'Yan', 'Izmer', 'k@gmaail.com', '$argon2i$v=19$m=65536,t=4,p=1$NGVrQ3RFVWhNZktSbFJGUg$3I7Qy5IPEJfVnRMCP1dLhSm9tU16kSQKnQAJjyQZ0dM', ''),
(23, 'Yan', 'Izmer', 'Jan22@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$VlN4VG9ZSi9MNjFFNmpjUw$i9JxzcGAwUWwp7Sp/ifZocJ2a6DLab9XSZW6qqS0rBw', ''),
(24, 'max', 'ferstapen', 'jan222@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$MGE1b3pxR2E5czZtYjVPSg$yf6xsxVNRjbIJMRS/NiSUfM/zpjdEf27CUG6jFPOHEs', '');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id_article`);

--
-- Indeksy dla tabeli `article_in_order`
--
ALTER TABLE `article_in_order`
  ADD PRIMARY KEY (`cart_article_id`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_article` (`id_article`);

--
-- Indeksy dla tabeli `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeksy dla tabeli `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id_article` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `article_in_order`
--
ALTER TABLE `article_in_order`
  MODIFY `cart_article_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `article_in_order`
--
ALTER TABLE `article_in_order`
  ADD CONSTRAINT `article_in_order_ibfk_2` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id_order`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `article_in_order_ibfk_3` FOREIGN KEY (`id_article`) REFERENCES `article` (`id_article`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
