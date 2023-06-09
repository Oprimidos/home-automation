-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 09 Haz 2023, 13:42:07
-- Sunucu sürümü: 10.4.25-MariaDB
-- PHP Sürümü: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `home_automation_db`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `aircondition`
--

CREATE TABLE `aircondition` (
  `airID` int(2) NOT NULL,
  `airValue` int(3) DEFAULT NULL,
  `airTime` timestamp NULL DEFAULT NULL,
  `airKwh` float NOT NULL,
  `airMoney` float NOT NULL,
  `airRoomID` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `aircondition`
--

INSERT INTO `aircondition` (`airID`, `airValue`, `airTime`, `airKwh`, `airMoney`, `airRoomID`) VALUES
(1, 24, '2023-06-04 10:41:35', 366, 73.2, 1),
(2, 40, '2023-05-23 21:00:00', 320.8, 64.16, 2),
(3, 40, '2023-05-23 21:00:00', 318.4, 63.68, 3),
(4, 28, '2023-06-04 11:19:15', 322.8, 64.56, 4);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `heat`
--

CREATE TABLE `heat` (
  `heatID` int(2) NOT NULL,
  `heatValue` int(3) DEFAULT NULL,
  `heatTime` timestamp NULL DEFAULT NULL,
  `heatRoomID` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `heat`
--

INSERT INTO `heat` (`heatID`, `heatValue`, `heatTime`, `heatRoomID`) VALUES
(1, 24, '2023-06-09 11:41:37', 1),
(2, 40, '2023-06-09 11:41:37', 2),
(3, 40, '2023-06-09 11:41:37', 3),
(4, 28, '2023-06-09 11:41:37', 4);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `humidity`
--

CREATE TABLE `humidity` (
  `humID` int(10) NOT NULL,
  `humValue` int(100) NOT NULL,
  `humTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `humKwh` float NOT NULL,
  `humMoney` float NOT NULL,
  `humRoomID` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `humidity`
--

INSERT INTO `humidity` (`humID`, `humValue`, `humTime`, `humKwh`, `humMoney`, `humRoomID`) VALUES
(1, 42, '2023-06-09 11:41:37', 80.35, 16.07, 1),
(2, 113, '2023-06-09 11:41:37', 79.6, 15.92, 2),
(3, 68, '2023-06-09 11:41:37', 79.25, 15.85, 3),
(4, 225, '2023-06-09 11:41:37', 86.95, 17.39, 4);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `light`
--

CREATE TABLE `light` (
  `lightID` int(2) NOT NULL,
  `lightValue` varchar(10) DEFAULT NULL,
  `lightTime` timestamp NULL DEFAULT NULL,
  `lightKwh` float NOT NULL,
  `lightMoney` float NOT NULL,
  `lightRoomID` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `light`
--

INSERT INTO `light` (`lightID`, `lightValue`, `lightTime`, `lightKwh`, `lightMoney`, `lightRoomID`) VALUES
(1, 'OFF', '2023-06-04 10:55:59', 5.3, 1.06, 1),
(2, 'OFF', '2023-06-04 10:56:06', 48, 9.6, 2),
(3, 'ON', '2023-06-04 10:56:19', 161.5, 32.3, 3),
(4, 'ON', '2023-06-04 10:54:49', 173.8, 34.76, 4);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `room`
--

CREATE TABLE `room` (
  `roomID` int(2) NOT NULL,
  `roomName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `room`
--

INSERT INTO `room` (`roomID`, `roomName`) VALUES
(1, 'Living'),
(2, 'Kitchen'),
(3, 'Children Room'),
(4, 'Bedroom');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `userID` int(4) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `userPassword` varchar(255) NOT NULL,
  `userType` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`userID`, `userName`, `userPassword`, `userType`) VALUES
(1, 'admin', '12345', 'Producer'),
(2, 'admin', '12345', 'Consumer');

-- --------------------------------------------------------

--
-- Görünüm yapısı durumu `viewconsumer`
-- (Asıl görünüm için aşağıya bakın)
--
CREATE TABLE `viewconsumer` (
`roomID` int(2)
,`roomName` varchar(255)
,`airID` int(2)
,`airValue` int(3)
,`airTime` timestamp
,`airKwh` float
,`airMoney` float
,`airRoomID` int(2)
,`lightID` int(2)
,`lightValue` varchar(10)
,`lightTime` timestamp
,`lightKwh` float
,`lightMoney` float
,`lightRoomID` int(2)
,`heatID` int(2)
,`heatValue` int(3)
,`heatTime` timestamp
,`heatRoomID` int(2)
,`humID` int(10)
,`humValue` int(100)
,`humTime` timestamp
,`humKwh` float
,`humMoney` float
,`humRoomID` int(100)
);

-- --------------------------------------------------------

--
-- Görünüm yapısı durumu `viewkwh`
-- (Asıl görünüm için aşağıya bakın)
--
CREATE TABLE `viewkwh` (
`sensor` varchar(8)
,`lightKwh` float
,`lightRoomID` int(100)
);

-- --------------------------------------------------------

--
-- Görünüm yapısı `viewconsumer`
--
DROP TABLE IF EXISTS `viewconsumer`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viewconsumer`  AS SELECT `r`.`roomID` AS `roomID`, `r`.`roomName` AS `roomName`, `a`.`airID` AS `airID`, `a`.`airValue` AS `airValue`, `a`.`airTime` AS `airTime`, `a`.`airKwh` AS `airKwh`, `a`.`airMoney` AS `airMoney`, `a`.`airRoomID` AS `airRoomID`, `l`.`lightID` AS `lightID`, `l`.`lightValue` AS `lightValue`, `l`.`lightTime` AS `lightTime`, `l`.`lightKwh` AS `lightKwh`, `l`.`lightMoney` AS `lightMoney`, `l`.`lightRoomID` AS `lightRoomID`, `h`.`heatID` AS `heatID`, `h`.`heatValue` AS `heatValue`, `h`.`heatTime` AS `heatTime`, `h`.`heatRoomID` AS `heatRoomID`, `hu`.`humID` AS `humID`, `hu`.`humValue` AS `humValue`, `hu`.`humTime` AS `humTime`, `hu`.`humKwh` AS `humKwh`, `hu`.`humMoney` AS `humMoney`, `hu`.`humRoomID` AS `humRoomID` FROM ((((`room` `r` left join `aircondition` `a` on(`r`.`roomID` = `a`.`airRoomID`)) left join `light` `l` on(`r`.`roomID` = `l`.`lightRoomID`)) left join `heat` `h` on(`r`.`roomID` = `h`.`heatRoomID`)) left join `humidity` `hu` on(`r`.`roomID` = `hu`.`humRoomID`))  ;

-- --------------------------------------------------------

--
-- Görünüm yapısı `viewkwh`
--
DROP TABLE IF EXISTS `viewkwh`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viewkwh`  AS SELECT 'light' AS `sensor`, `light`.`lightKwh` AS `lightKwh`, `light`.`lightRoomID` AS `lightRoomID` FROM `light` union all select 'air' AS `sensor`,`aircondition`.`airKwh` AS `airKwh`,`aircondition`.`airRoomID` AS `airRoomID` from `aircondition` union all select 'humidity' AS `sensor`,`humidity`.`humKwh` AS `humKwh`,`humidity`.`humRoomID` AS `humRoomID` from `humidity`  ;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `aircondition`
--
ALTER TABLE `aircondition`
  ADD PRIMARY KEY (`airID`),
  ADD KEY `airRoomID` (`airRoomID`);

--
-- Tablo için indeksler `heat`
--
ALTER TABLE `heat`
  ADD PRIMARY KEY (`heatID`),
  ADD KEY `heatRoomID` (`heatRoomID`);

--
-- Tablo için indeksler `humidity`
--
ALTER TABLE `humidity`
  ADD PRIMARY KEY (`humID`);

--
-- Tablo için indeksler `light`
--
ALTER TABLE `light`
  ADD PRIMARY KEY (`lightID`),
  ADD KEY `lightRoomID` (`lightRoomID`);

--
-- Tablo için indeksler `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`roomID`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `aircondition`
--
ALTER TABLE `aircondition`
  ADD CONSTRAINT `aircondition_ibfk_1` FOREIGN KEY (`airRoomID`) REFERENCES `room` (`roomID`);

--
-- Tablo kısıtlamaları `heat`
--
ALTER TABLE `heat`
  ADD CONSTRAINT `heat_ibfk_1` FOREIGN KEY (`heatRoomID`) REFERENCES `room` (`roomID`);

--
-- Tablo kısıtlamaları `light`
--
ALTER TABLE `light`
  ADD CONSTRAINT `light_ibfk_1` FOREIGN KEY (`lightRoomID`) REFERENCES `room` (`roomID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
