-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 04 Haz 2023, 15:06:22
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
(1, 24, '2023-06-04 10:41:35', 204, 40.8, 1),
(2, 40, '2023-05-23 21:00:00', 158.8, 31.76, 2),
(3, 40, '2023-05-23 21:00:00', 156.4, 31.28, 3),
(4, 28, '2023-06-04 11:19:15', 160.8, 32.16, 4);

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
(1, 24, '2023-06-04 12:47:51', 1),
(2, 40, '2023-06-04 12:47:51', 2),
(3, 40, '2023-06-04 12:47:51', 3),
(4, 28, '2023-06-04 12:47:51', 4);

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
(1, 52, '2023-06-04 12:47:51', 39.85, 7.97, 1),
(2, 103, '2023-06-04 12:47:51', 39.1, 7.82, 2),
(3, 55, '2023-06-04 12:47:51', 38.75, 7.75, 3),
(4, 80, '2023-06-04 12:47:51', 46.45, 9.29, 4);

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
(3, 'ON', '2023-06-04 10:56:19', 80.5, 16.1, 3),
(4, 'ON', '2023-06-04 10:54:49', 92.8, 18.56, 4);

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
-- Görünüm yapısı durumu `viewchart`
-- (Asıl görünüm için aşağıya bakın)
--
CREATE TABLE `viewchart` (
`humID` int(10)
,`humValue` int(100)
,`humTime` timestamp
,`humKwh` float
,`humMoney` float
,`humRoomID` int(100)
,`roomName` varchar(255)
);

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
-- Görünüm yapısı durumu `viewprocuder`
-- (Asıl görünüm için aşağıya bakın)
--
CREATE TABLE `viewprocuder` (
`roomID` int(2)
,`roomName` varchar(255)
,`airID` int(2)
,`airValue` int(3)
,`airTime` timestamp
,`airRoomID` int(2)
,`lightID` int(2)
,`lightValue` varchar(10)
,`lightTime` timestamp
,`lightRoomID` int(2)
,`heatID` int(2)
,`heatValue` int(3)
,`heatTime` timestamp
,`heatRoomID` int(2)
);

-- --------------------------------------------------------

--
-- Görünüm yapısı `viewchart`
--
DROP TABLE IF EXISTS `viewchart`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viewchart`  AS SELECT `h`.`humID` AS `humID`, `h`.`humValue` AS `humValue`, `h`.`humTime` AS `humTime`, `h`.`humKwh` AS `humKwh`, `h`.`humMoney` AS `humMoney`, `h`.`humRoomID` AS `humRoomID`, `r`.`roomName` AS `roomName` FROM (`humidity` `h` join `room` `r` on(`h`.`humRoomID` = `r`.`roomID`))  ;

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

-- --------------------------------------------------------

--
-- Görünüm yapısı `viewprocuder`
--
DROP TABLE IF EXISTS `viewprocuder`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viewprocuder`  AS SELECT `r`.`roomID` AS `roomID`, `r`.`roomName` AS `roomName`, `a`.`airID` AS `airID`, `a`.`airValue` AS `airValue`, `a`.`airTime` AS `airTime`, `a`.`airRoomID` AS `airRoomID`, `l`.`lightID` AS `lightID`, `l`.`lightValue` AS `lightValue`, `l`.`lightTime` AS `lightTime`, `l`.`lightRoomID` AS `lightRoomID`, `h`.`heatID` AS `heatID`, `h`.`heatValue` AS `heatValue`, `h`.`heatTime` AS `heatTime`, `h`.`heatRoomID` AS `heatRoomID` FROM (((`room` `r` left join `aircondition` `a` on(`r`.`roomID` = `a`.`airRoomID`)) left join `light` `l` on(`r`.`roomID` = `l`.`lightRoomID`)) left join `heat` `h` on(`r`.`roomID` = `h`.`heatRoomID`))  ;

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
