-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 09 Şub 2022, 10:22:00
-- Sunucu sürümü: 10.4.21-MariaDB
-- PHP Sürümü: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `cms`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `brands`
--

CREATE TABLE `brands` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_turkish_ci DEFAULT '',
  `img_url` varchar(255) COLLATE utf8_turkish_ci DEFAULT '',
  `rank` int(255) DEFAULT NULL,
  `isActive` tinyint(4) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `brands`
--

INSERT INTO `brands` (`id`, `title`, `img_url`, `rank`, `isActive`, `createdAt`) VALUES
(5, 'Php', '73515744-109109663891061-920453096880996352-o.jpg', 0, 0, '2021-11-18 16:22:13');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `courses`
--

CREATE TABLE `courses` (
  `id` int(11) UNSIGNED NOT NULL,
  `url` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `description` text COLLATE utf8_turkish_ci DEFAULT NULL,
  `img_url` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `event_start_date` datetime DEFAULT NULL,
  `event_end_date` datetime DEFAULT NULL,
  `rank` int(11) DEFAULT NULL,
  `isActive` tinyint(4) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `courses`
--

INSERT INTO `courses` (`id`, `url`, `title`, `description`, `img_url`, `event_start_date`, `event_end_date`, `rank`, `isActive`, `createdAt`) VALUES
(2, 'codeigniter-4-egitimi', 'Codeigniter 4 Eğitimi', '<p>Bu eğitimde codeigniter ile ilgili birçok kavramı elden geçireceğiz..</p>', 'odin.jpg', '2018-02-24 12:00:00', '2018-06-15 02:00:00', 3, 1, '2017-12-29 00:41:16'),
(3, 'laraval-8-egtiimi', 'Laraval 8 Eğtiimi', '<p>Laravel 8 proje yapımı</p>', 'teknoloji1-e1565423663195.jpg', '2021-11-18 00:00:00', '2021-11-19 00:00:00', 4, 1, '2021-11-18 16:06:57');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL DEFAULT '',
  `phone` varchar(50) NOT NULL DEFAULT '',
  `address` varchar(50) NOT NULL DEFAULT '',
  `city` varchar(50) NOT NULL DEFAULT '',
  `country` varchar(50) NOT NULL DEFAULT '',
  `isActive` tinyint(4) NOT NULL DEFAULT 1,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `customers`
--

INSERT INTO `customers` (`id`, `first_name`, `last_name`, `phone`, `address`, `city`, `country`, `isActive`, `createdAt`) VALUES
(1, 'Carine ', 'Schmitt', '40.32.2555', '54, rue Royale', 'Nantes', 'France', 1, '2021-12-01 18:38:13'),
(2, 'Jean', 'King', '7025551838', '8489 Strong St.', 'Las Vegas', 'USA', 1, '2021-12-01 18:38:13'),
(3, 'Peter', 'Ferguson', '03 9520 4555', '636 St Kilda Road', 'Melbourne', 'Australia', 1, '2021-12-01 18:38:13'),
(4, 'Janine ', 'Labrune', '40.67.8555', '67, rue des Cinquante Otages', 'Nantes', 'France', 1, '2021-12-01 18:38:13'),
(5, 'Jonas ', 'Bergulfsen', '07-98 9555', 'Erling Skakkes gate 78', 'Stavern', 'Norway', 1, '2021-12-01 18:38:13'),
(6, 'Susan', 'Nelson', '4155551450', '5677 Strong St.', 'San Rafael', 'USA', 1, '2021-12-01 18:38:13'),
(7, 'Zbyszek ', 'Piestrzeniewicz', '(26) 642-7555', 'ul. Filtrowa 68', 'Warszawa', 'Poland', 1, '2021-12-01 18:38:13'),
(8, 'Roland', 'Keitel', '+49 69 66 90 2555', 'Lyonerstr. 34', 'Frankfurt', 'Germany', 1, '2021-12-01 18:38:13'),
(9, 'Julie', 'Murphy', '6505555787', '5557 North Pendale Street', 'San Francisco', 'USA', 1, '2021-12-01 18:38:13'),
(10, 'Kwai', 'Lee', '2125557818', '897 Long Airport Avenue', 'NYC', 'USA', 1, '2021-12-01 18:38:13'),
(11, 'Diego ', 'Freyre', '(91) 555 94 44', 'C/ Moralzarzal, 86', 'Madrid', 'Spain', 1, '2021-12-01 18:38:13'),
(12, 'Christina ', 'Berglund', '0921-12 3555', 'Berguvsvägen  8', 'Luleå', 'Sweden', 1, '2021-12-01 18:38:13'),
(13, 'Jytte ', 'Petersen', '31 12 3555', 'Vinbæltet 34', 'Kobenhavn', 'Denmark', 1, '2021-12-01 18:38:13'),
(14, 'Mary ', 'Saveley', '78.32.5555', '2, rue du Commerce', 'Lyon', 'France', 1, '2021-12-01 18:38:13'),
(15, 'Eric', 'Natividad', '+65 221 7555', 'Bronz Sok.', 'Singapore', 'Singapore', 1, '2021-12-01 18:38:13'),
(16, 'Jeff', 'Young', '2125557413', '4092 Furth Circle', 'NYC', 'USA', 1, '2021-12-01 18:38:13'),
(17, 'Kelvin', 'Leong', '2155551555', '7586 Pompton St.', 'Allentown', 'USA', 1, '2021-12-01 18:38:13'),
(18, 'Juri', 'Hashimoto', '6505556809', '9408 Furth Circle', 'Burlingame', 'USA', 1, '2021-12-01 18:38:13'),
(19, 'Wendy', 'Victorino', '+65 224 1555', '106 Linden Road Sandown', 'Singapore', 'Singapore', 1, '2021-12-01 18:38:13'),
(20, 'Veysel', 'Oeztan', '+47 2267 3215', 'Brehmen St. 121', 'Bergen', 'Norway  ', 1, '2021-12-01 18:38:13'),
(21, 'Keith', 'Franco', '2035557845', '149 Spinnaker Dr.', 'New Haven', 'USA', 1, '2021-12-01 18:38:13'),
(22, 'Isabel ', 'de Castro', '(1) 356-5555', 'Estrada da saúde n. 58', 'Lisboa', 'Portugal', 1, '2021-12-01 18:38:13'),
(23, 'Martine ', 'Rancé', '20.16.1555', '184, chaussée de Tournai', 'Lille', 'France', 1, '2021-12-01 18:38:13'),
(24, 'Marie', 'Bertrand', '(1) 42.34.2555', '265, boulevard Charonne', 'Paris', 'France', 1, '2021-12-01 18:38:13'),
(25, 'Jerry', 'Tseng', '6175555555', '4658 Baden Av.', 'Cambridge', 'USA', 1, '2021-12-01 18:38:13'),
(26, 'Julie', 'King', '2035552570', '25593 South Bay Ln.', 'Bridgewater', 'USA', 1, '2021-12-01 18:38:13'),
(27, 'Mory', 'Kentary', '+81 06 6342 5555', '1-6-20 Dojima', 'Kita-ku', 'Japan', 1, '2021-12-01 18:38:13'),
(28, 'Michael', 'Frick', '2125551500', '2678 Kingston Rd.', 'NYC', 'USA', 1, '2021-12-01 18:38:13'),
(29, 'Matti', 'Karttunen', '90-224 8555', 'Keskuskatu 45', 'Helsinki', 'Finland', 1, '2021-12-01 18:38:13'),
(30, 'Rachel', 'Ashworth', '(171) 555-1555', 'Fauntleroy Circus', 'Manchester', 'UK', 1, '2021-12-01 18:38:13'),
(31, 'Dean', 'Cassidy', '+353 1862 1555', '25 Maiden Lane', 'Dublin', 'Ireland', 1, '2021-12-01 18:38:13'),
(32, 'Leslie', 'Taylor', '6175558428', '16780 Pompton St.', 'Brickhaven', 'USA', 1, '2021-12-01 18:38:13'),
(33, 'Elizabeth', 'Devon', '(171) 555-2282', '12, Berkeley Gardens Blvd', 'Liverpool', 'UK', 1, '2021-12-01 18:38:13'),
(34, 'Yoshi ', 'Tamuri', '(604) 555-3392', '1900 Oak St.', 'Vancouver', 'Canada', 1, '2021-12-01 18:38:13'),
(35, 'Miguel', 'Barajas', '6175557555', '7635 Spinnaker Dr.', 'Brickhaven', 'USA', 1, '2021-12-01 18:38:13'),
(36, 'Julie', 'Young', '6265557265', '78934 Hillside Dr.', 'Pasadena', 'USA', 1, '2021-12-01 18:38:13'),
(37, 'Brydey', 'Walker', '+612 9411 1555', 'Suntec Tower Three', 'Singapore', 'Singapore', 1, '2021-12-01 18:38:13'),
(38, 'Frédérique ', 'Citeaux', '88.60.1555', '24, place Kléber', 'Strasbourg', 'France', 1, '2021-12-01 18:38:13'),
(39, 'Mike', 'Gao', '+852 2251 1555', 'Bank of China Tower', 'Central Hong Kong', 'Hong Kong', 1, '2021-12-01 18:38:13'),
(40, 'Eduardo ', 'Saavedra', '(93) 203 4555', 'Rambla de Cataluña, 23', 'Barcelona', 'Spain', 1, '2021-12-01 18:38:13'),
(41, 'Mary', 'Young', '3105552373', '4097 Douglas Av.', 'Glendale', 'USA', 1, '2021-12-01 18:38:13'),
(42, 'Horst ', 'Kloss', '0372-555188', 'Taucherstraße 10', 'Cunewalde', 'Germany', 1, '2021-12-01 18:38:13'),
(43, 'Palle', 'Ibsen', '86 21 3555', 'Smagsloget 45', 'Århus', 'Denmark', 1, '2021-12-01 18:38:13'),
(44, 'Jean ', 'Fresnière', '(514) 555-8054', '43 rue St. Laurent', 'Montréal', 'Canada', 1, '2021-12-01 18:38:13'),
(45, 'Alejandra ', 'Camino', '(91) 745 6555', 'Gran Vía, 1', 'Madrid', 'Spain', 1, '2021-12-01 18:38:13'),
(46, 'Valarie', 'Thompson', '7605558146', '361 Furth Circle', 'San Diego', 'USA', 1, '2021-12-01 18:38:13'),
(47, 'Helen ', 'Bennett', '(198) 555-8888', 'Garden House', 'Cowes', 'UK', 1, '2021-12-01 18:38:13'),
(48, 'Annette ', 'Roulet', '61.77.6555', '1 rue Alsace-Lorraine', 'Toulouse', 'France', 1, '2021-12-01 18:38:13'),
(49, 'Renate ', 'Messner', '069-0555984', 'Magazinweg 7', 'Frankfurt', 'Germany', 1, '2021-12-01 18:38:13'),
(50, 'Paolo ', 'Accorti', '011-4988555', 'Via Monte Bianco 34', 'Torino', 'Italy', 1, '2021-12-01 18:38:13'),
(51, 'Daniel', 'Da Silva', '+33 1 46 62 7555', '27 rue du Colonel Pierre Avia', 'Paris', 'France', 1, '2021-12-01 18:38:13'),
(52, 'Daniel ', 'Tonini', '30.59.8555', '67, avenue de l\'Europe', 'Versailles', 'France', 1, '2021-12-01 18:38:13'),
(53, 'Henriette ', 'Pfalzheim', '0221-5554327', 'Mehrheimerstr. 369', 'Köln', 'Germany', 1, '2021-12-01 18:38:13'),
(54, 'Elizabeth ', 'Lincoln', '(604) 555-4555', '23 Tsawassen Blvd.', 'Tsawassen', 'Canada', 1, '2021-12-01 18:38:13'),
(55, 'Peter ', 'Franken', '089-0877555', 'Berliner Platz 43', 'München', 'Germany', 1, '2021-12-01 18:38:13'),
(56, 'Anna', 'O\'Hara', '02 9936 8555', '201 Miller Street', 'North Sydney', 'Australia', 1, '2021-12-01 18:38:13'),
(57, 'Giovanni ', 'Rovelli', '035-640555', 'Via Ludovico il Moro 22', 'Bergamo', 'Italy', 1, '2021-12-01 18:38:13'),
(58, 'Adrian', 'Huxley', '+61 2 9495 8555', 'Monitor Money Building', 'Chatswood', 'Australia', 1, '2021-12-01 18:38:13'),
(59, 'Marta', 'Hernandez', '6175558555', '39323 Spinnaker Dr.', 'Cambridge', 'USA', 1, '2021-12-01 18:38:13'),
(60, 'Ed', 'Harrison', '+41 26 425 50 01', 'Rte des Arsenaux 41 ', 'Fribourg', 'Switzerland', 1, '2021-12-01 18:38:13'),
(61, 'Mihael', 'Holz', '0897-034555', 'Grenzacherweg 237', 'Genève', 'Switzerland', 1, '2021-12-01 18:38:13'),
(62, 'Jan', 'Klaeboe', '+47 2212 1555', 'Drammensveien 126A', 'Oslo', 'Norway  ', 1, '2021-12-01 18:38:13'),
(63, 'Bradley', 'Schuyler', '+31 20 491 9555', 'Kingsfordweg 151', 'Amsterdam', 'Netherlands', 1, '2021-12-01 18:38:13'),
(64, 'Mel', 'Andersen', '030-0074555', 'Obere Str. 57', 'Berlin', 'Germany', 1, '2021-12-01 18:38:13'),
(65, 'Pirkko', 'Koskitalo', '981-443655', 'Torikatu 38', 'Oulu', 'Finland', 1, '2021-12-01 18:38:13'),
(66, 'Catherine ', 'Dewey', '(02) 5554 67', 'Rue Joseph-Bens 532', 'Bruxelles', 'Belgium', 1, '2021-12-01 18:38:13'),
(67, 'Steve', 'Frick', '9145554562', '3758 North Pendale Street', 'White Plains', 'USA', 1, '2021-12-01 18:38:13'),
(68, 'Wing', 'Huang', '5085559555', '4575 Hillside Dr.', 'New Bedford', 'USA', 1, '2021-12-01 18:38:13'),
(70, 'Mike', 'Graham', '+64 9 312 5555', '162-164 Grafton Road', 'Auckland  ', 'New Zealand', 1, '2021-12-01 18:38:13'),
(71, 'Ann ', 'Brown', '(171) 555-0297', '35 King George', 'London', 'UK', 1, '2021-12-01 18:38:13'),
(73, 'Ben', 'Calaghan', '61-7-3844-6555', '31 Duncan St. West End', 'South Brisbane', 'Australia', 1, '2021-12-01 18:38:13'),
(74, 'Kalle', 'Suominen', '+358 9 8045 555', 'Software Engineering Center', 'Espoo', 'Finland', 1, '2021-12-01 18:38:13'),
(75, 'Philip ', 'Cramer', '0555-09555', 'Maubelstr. 90', 'Brandenburg', 'Germany', 1, '2021-12-01 18:38:13'),
(76, 'Francisca', 'Cervantes', '2155554695', '782 First Street', 'Philadelphia', 'USA', 1, '2021-12-01 18:38:13'),
(77, 'Jesus', 'Fernandez', '+34 913 728 555', 'Merchants House', 'Madrid', 'Spain', 1, '2021-12-01 18:38:13'),
(78, 'Brian', 'Chandler', '2155554369', '6047 Douglas Av.', 'Los Angeles', 'USA', 1, '2021-12-01 18:38:13'),
(79, 'Patricia ', 'McKenna', '2967 555', '8 Johnstown Road', 'Cork', 'Ireland', 1, '2021-12-01 18:38:13'),
(80, 'Laurence ', 'Lebihan', '91.24.4555', '12, rue des Bouchers', 'Marseille', 'France', 1, '2021-12-01 18:38:13'),
(81, 'Paul ', 'Henriot', '26.47.1555', '59 rue de l\'Abbaye', 'Reims', 'France', 1, '2021-12-01 18:38:13'),
(82, 'Armand', 'Kuger', '+27 21 550 3555', '1250 Pretorius Street', 'Hatfield', 'South Africa', 1, '2021-12-01 18:38:13'),
(83, 'Wales', 'MacKinlay', '64-9-3763555', '199 Great North Road', 'Auckland', 'New Zealand', 1, '2021-12-01 18:38:13'),
(84, 'Karin', 'Josephs', '0251-555259', 'Luisenstr. 48', 'Münster', 'Germany', 1, '2021-12-01 18:38:13'),
(85, 'Juri', 'Yoshido', '6175559555', '8616 Spinnaker Dr.', 'Boston', 'USA', 1, '2021-12-01 18:38:13'),
(86, 'Dorothy', 'Young', '6035558647', '2304 Long Airport Avenue', 'Nashua', 'USA', 1, '2021-12-01 18:38:13'),
(87, 'Lino ', 'Rodriguez', '(1) 354-2555', 'Jardim das rosas n. 32', 'Lisboa', 'Portugal', 1, '2021-12-01 18:38:13'),
(88, 'Braun', 'Urs', '0452-076555', 'Hauptstr. 29', 'Bern', 'Switzerland', 1, '2021-12-01 18:38:13'),
(89, 'Allen', 'Nelson', '6175558555', '7825 Douglas Av.', 'Brickhaven', 'USA', 1, '2021-12-01 18:38:13'),
(90, 'Pascale ', 'Cartrain', '(071) 23 67 2555', 'Boulevard Tirou, 255', 'Charleroi', 'Belgium', 1, '2021-12-01 18:38:13'),
(91, 'Georg ', 'Pipps', '6562-9555', 'Geislweg 14', 'Salzburg', 'Austria', 1, '2021-12-01 18:38:13'),
(92, 'Arnold', 'Cruz', '+63 2 555 3587', '15 McCallum Street', 'Makati City', 'Philippines', 1, '2021-12-01 18:38:13'),
(93, 'Maurizio ', 'Moroni', '0522-556555', 'Strada Provinciale 124', 'Reggio Emilia', 'Italy', 1, '2021-12-01 18:38:13'),
(94, 'Akiko', 'Shimamura', '+81 3 3584 0555', '2-2-8 Roppongi', 'Minato-ku', 'Japan', 1, '2021-12-01 18:38:13'),
(95, 'Dominique', 'Perrier', '(1) 47.55.6555', '25, rue Lauriston', 'Paris', 'France', 1, '2021-12-01 18:38:13'),
(96, 'Rita ', 'Müller', '0711-555361', 'Adenauerallee 900', 'Stuttgart', 'Germany', 1, '2021-12-01 18:38:13'),
(97, 'Sarah', 'McRoy', '04 499 9555', '101 Lambton Quay', 'Wellington', 'New Zealand', 1, '2021-12-01 18:38:13'),
(98, 'Michael', 'Donnermeyer', ' +49 89 61 08 9555', 'Hansastr. 15', 'Munich', 'Germany', 1, '2021-12-01 18:38:13'),
(99, 'Maria', 'Hernandez', '2125558493', '5905 Pompton St.', 'NYC', 'USA', 1, '2021-12-01 18:38:13'),
(100, 'Alexander ', 'Feuer', '0342-555176', 'Heerstr. 22', 'Leipzig', 'Germany', 1, '2021-12-01 18:38:13'),
(101, 'Dan', 'Lewis', '2035554407', '2440 Pompton St.', 'Glendale', 'USA', 1, '2021-12-01 18:38:13'),
(102, 'Martha', 'Larsson', '0695-34 6555', 'Åkergatan 24', 'Bräcke', 'Sweden', 1, '2021-12-01 18:38:13'),
(103, 'Sue', 'Frick', '4085553659', '3086 Ingle Ln.', 'San Jose', 'USA', 1, '2021-12-01 18:38:13'),
(104, 'Roland ', 'Mendel', '7675-3555', 'Kirchgasse 6', 'Graz', 'Austria', 1, '2021-12-01 18:38:13'),
(105, 'Leslie', 'Murphy', '2035559545', '567 North Pendale Street', 'New Haven', 'USA', 1, '2021-12-01 18:38:13'),
(106, 'Yu', 'Choi', '2125551957', '5290 North Pendale Street', 'NYC', 'USA', 1, '2021-12-01 18:38:13'),
(107, 'Martín ', 'Sommer', '(91) 555 22 82', 'C/ Araquil, 67', 'Madrid', 'Spain', 1, '2021-12-01 18:38:13'),
(108, 'Sven ', 'Ottlieb', '0241-039123', 'Walserweg 21', 'Aachen', 'Germany', 1, '2021-12-01 18:38:13'),
(109, 'Violeta', 'Benitez', '5085552555', '1785 First Street', 'New Bedford', 'USA', 1, '2021-12-01 18:38:13'),
(110, 'Carmen', 'Anton', '+34 913 728555', 'c/ Gobelas, 19-1 Urb. La Florida', 'Madrid', 'Spain', 1, '2021-12-01 18:38:13'),
(111, 'Sean', 'Clenahan', '61-9-3844-6555', '7 Allen Street', 'Glen Waverly', 'Australia', 1, '2021-12-01 18:38:13'),
(113, 'Steve', 'Thompson', '3105553722', '3675 Furth Circle', 'Burbank', 'USA', 1, '2021-12-01 18:38:13'),
(114, 'Hanna ', 'Moos', '0621-08555', 'Forsterstr. 57', 'Mannheim', 'Germany', 0, '2021-12-01 18:38:13'),
(116, 'Raanan', 'Altagar,G M', '+ 972 9 959 8555', '3 Hagalim Blv.', 'Herzlia', 'Israel', 0, '2021-12-01 18:38:13'),
(117, 'José Pedro ', 'Roel', '(95) 555 82 82', 'C/ Romero, 33', 'Sevilla', 'Spain', 0, '2021-12-01 18:38:13'),
(119, 'Sue', 'Taylor', '4155554312', '2793 Furth Circle', 'Brisbane', 'USA', 1, '2021-12-01 18:38:13'),
(120, 'Thomas ', 'Smith', '(171) 555-7555', '120 Hanover Sq.', 'London', 'UK', 1, '2021-12-01 18:38:13'),
(121, 'Valarie', 'Franco', '6175552555', '6251 Ingle Ln.', 'Boston', 'USA', 1, '2021-12-01 18:38:13'),
(122, 'Tony', 'Snowden', '+64 9 5555500', 'Arenales 1938 3\'A\'', 'Auckland  ', 'New Zealand', 0, '2021-12-01 18:38:13');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `email_settings`
--

CREATE TABLE `email_settings` (
  `id` int(11) UNSIGNED NOT NULL,
  `protocol` varchar(10) COLLATE utf8_turkish_ci DEFAULT NULL,
  `host` varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL,
  `port` varchar(10) COLLATE utf8_turkish_ci DEFAULT '',
  `user` varchar(100) COLLATE utf8_turkish_ci DEFAULT '',
  `password` varchar(100) COLLATE utf8_turkish_ci DEFAULT '',
  `from` varchar(100) COLLATE utf8_turkish_ci DEFAULT '',
  `to` varchar(100) COLLATE utf8_turkish_ci DEFAULT '',
  `user_name` varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL,
  `isActive` tinyint(1) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `email_settings`
--

INSERT INTO `email_settings` (`id`, `protocol`, `host`, `port`, `user`, `password`, `from`, `to`, `user_name`, `isActive`, `createdAt`) VALUES
(2, 'smtp', 'ssl://smtp.gmail.com', '465', 'burakefeayvazlar@gmail.com', '12345678', 'burakefeayvazlar@gmail.com', 'burakefeayvazlar@gmail.com', 'CMS', 1, '2018-01-14 14:57:54');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `files`
--

CREATE TABLE `files` (
  `id` int(11) UNSIGNED NOT NULL,
  `gallery_id` int(11) DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `rank` int(255) DEFAULT NULL,
  `isActive` tinyint(255) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `files`
--

INSERT INTO `files` (`id`, `gallery_id`, `url`, `rank`, `isActive`, `createdAt`) VALUES
(5, 11, 'codeigniter-udemy-sertifika.pdf', 0, 1, '2021-11-22 00:50:34'),
(6, 11, '28584364-buzzy-news-viral-lists-polls-and-videos-license.pdf', 0, 1, '2021-11-22 00:51:25'),
(7, 11, 'image-2021-10-04t17-15-14-418z.png', 0, 1, '2021-11-22 00:54:15');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `galleries`
--

CREATE TABLE `galleries` (
  `id` int(11) UNSIGNED NOT NULL,
  `url` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `title` varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL,
  `gallery_type` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `folder_name` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `isActive` tinyint(4) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `galleries`
--

INSERT INTO `galleries` (`id`, `url`, `title`, `gallery_type`, `folder_name`, `isActive`, `createdAt`, `rank`) VALUES
(10, 'youtube-kanali', 'Youtube Kanalı', 'video', '', 1, '2018-01-04 00:06:52', 0),
(11, 'kataloglarimiz', 'Kataloglarımız', 'file', 'kataloglarimiz', 1, '2018-01-04 00:07:06', 0),
(13, 'yeni-sistem-testi', 'Yeni Sistem Testi', 'image', 'yeni-sistem-testi', 1, '2021-11-22 00:13:46', 0),
(22, 'test-galeri', 'Test Galeri', 'image', 'test-galeri', 1, '2021-11-22 04:05:53', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `images`
--

CREATE TABLE `images` (
  `id` int(11) UNSIGNED NOT NULL,
  `gallery_id` int(11) DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `rank` int(255) DEFAULT NULL,
  `isActive` tinyint(255) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `images`
--

INSERT INTO `images` (`id`, `gallery_id`, `url`, `rank`, `isActive`, `createdAt`) VALUES
(31, 13, 'n4ametrlsqhzgizp-636068605588627099.jpg', 0, 1, '2021-11-22 00:14:22'),
(32, 13, 'maxresdefault.jpg', 0, 1, '2021-11-22 01:15:23'),
(33, 13, 'onkayit-mugla-balikesir.PNG', 0, 1, '2021-11-22 01:17:41'),
(34, 13, 'burak-efe-b5amu2koore-unsplash.jpg', 0, 1, '2021-11-22 01:23:20'),
(35, 13, 'atabey19-bursa-10-kasim-duyuru.png', 0, 1, '2021-11-22 01:25:31'),
(48, 22, 'kerkuk-bizimdir-yazar-11-11-2021.jpg', 0, 1, '2021-11-22 04:06:22'),
(49, 22, 'uyanmaniz-icin-yazar-11-11-2021.jpg', 0, 1, '2021-11-22 04:06:23');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `logs`
--

CREATE TABLE `logs` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL,
  `country_code` text COLLATE utf8_turkish_ci DEFAULT NULL,
  `city` text COLLATE utf8_turkish_ci DEFAULT NULL,
  `user_agent` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL,
  `type` tinyint(4) DEFAULT NULL,
  `message` text COLLATE utf8_turkish_ci DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `logs`
--

INSERT INTO `logs` (`id`, `ip_address`, `country_code`, `city`, `user_agent`, `email`, `type`, `message`, `createdAt`) VALUES
(11, '176.232.62.26', 'TR', 'Antalya', 'Chrome on windows', 'burakefeayvazlar@gmail.com', 2, 'Başarılı', '2021-11-30 22:17:33'),
(12, '176.232.62.26', 'TR', 'Antalya', 'Chrome on windows', 'burakefeayvazlar@gmail.com', 1, 'Başarılı', '2021-11-30 22:17:40'),
(13, '176.232.62.26', 'TR', 'Antalya', 'Chrome on windows', 'burakefeayvazlar@gmail.com', 2, 'Başarılı', '2021-12-01 00:28:13'),
(14, '176.232.62.26', 'TR', 'Antalya', 'Chrome on windows', 'burakefeayvazlar@gmail.com', 1, 'Başarılı', '2021-12-01 00:28:19'),
(15, '176.232.62.26', 'TR', 'Antalya', 'Chrome on windows', 'burakefeayvazlar@gmail.com', 1, 'Başarılı', '2021-12-01 13:22:22'),
(16, '176.232.62.26', 'TR', 'Antalya', 'Chrome on windows', 'burakefeayvazlar@gmail.com', 1, 'Başarılı', '2021-12-01 18:40:15'),
(17, '176.232.62.26', 'TR', 'Antalya', 'Chrome on windows', 'burakefeayvazlar@gmail.com', 2, 'Başarılı', '2021-12-02 05:24:26'),
(18, '176.232.62.26', 'TR', 'Antalya', 'Chrome on windows', 'burakefeayvazlar@gmail.com', 1, 'Başarılı', '2021-12-02 05:24:34'),
(19, '176.232.62.26', 'TR', 'Antalya', 'Chrome on windows', 'burakefeayvazlar@gmail.com', 1, 'Başarılı', '2021-12-02 12:51:50'),
(20, '176.232.62.26', 'TR', 'Antalya', 'Chrome on windows', 'burakefeayvazlar@gmail.com', 2, 'Başarılı', '2021-12-02 14:21:53'),
(21, '176.232.62.26', 'TR', 'Antalya', 'Chrome on windows', 'burakefeayvazlar@gmail.com', 1, 'Başarılı', '2021-12-02 14:21:59'),
(22, '176.232.62.26', 'TR', 'Antalya', 'Chrome on windows', 'burakefeayvazlar@gmail.com', 1, 'Başarılı', '2021-12-02 22:41:35'),
(23, '176.232.60.149', 'TR', 'Antalya', 'Chrome on windows', 'burakefeayvazlar@gmail.com', 1, 'Başarılı', '2021-12-06 01:26:44'),
(24, '176.232.60.149', 'TR', 'Antalya', 'Chrome on windows', 'burakefeayvazlar@gmail.com', 1, 'Başarılı', '2021-12-06 14:06:01'),
(25, '176.232.60.149', 'TR', 'Antalya', 'Chrome on windows', 'burakefeayvazlar@gmail.com', 2, 'Başarılı', '2021-12-06 16:02:35'),
(26, '176.232.60.149', 'TR', 'Antalya', 'Chrome on windows', 'burakefeayvazlar@gmail.com', 1, 'Başarılı', '2021-12-06 16:02:41'),
(27, '176.232.60.149', 'TR', 'Antalya', 'Chrome on windows', 'burakefeayvazlar@gmail.com', 1, 'Başarılı', '2021-12-07 14:56:04'),
(28, '176.232.60.149', 'TR', 'Antalya', 'Chrome on windows', 'burakefeayvazlar@gmail.com', 1, 'Başarılı', '2021-12-08 14:35:50'),
(29, '176.232.60.149', 'TR', 'Antalya', 'Chrome on windows', 'burakefeayvazlar@gmail.com', 1, 'Başarılı', '2021-12-09 16:12:05'),
(30, '176.232.60.149', 'TR', 'Antalya', 'Chrome on windows', 'burakefeayvazlar@gmail.com', 1, 'Başarılı', '2021-12-09 23:19:54'),
(31, '176.232.60.149', 'TR', 'Antalya', 'Chrome on windows', 'burakefeayvazlar@gmail.com', 1, 'Başarılı', '2021-12-10 14:38:54'),
(32, '176.232.60.149', 'TR', 'Antalya', 'Chrome on windows', 'burakefeayvazlar@gmail.com', 1, 'Başarılı', '2021-12-13 14:41:55'),
(33, '176.232.61.107', 'TR', 'Antalya', 'Chrome on windows', 'burakefeayvazlar@gmail.com', 1, 'Başarısız', '2022-02-09 11:07:16'),
(34, '176.232.61.107', 'TR', 'Antalya', 'Chrome on windows', 'burakefeayvazlar@gmail.com', 1, 'Başarılı', '2022-02-09 11:07:24');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `members`
--

CREATE TABLE `members` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `ip_address` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `isActive` tinyint(50) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `members`
--

INSERT INTO `members` (`id`, `email`, `ip_address`, `isActive`, `createdAt`) VALUES
(1, 'bilgi@gmail.com', '::1', 1, '2021-11-21 11:59:56'),
(2, 'parlamentohaber@gmail.com', '::1', 1, '2021-11-30 22:30:48');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `menus`
--

CREATE TABLE `menus` (
  `menu_id` int(11) UNSIGNED NOT NULL,
  `menu_name` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `menu_url` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `menu_icon` varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL,
  `menu_parent_id` int(11) DEFAULT NULL,
  `menu_sequence` varchar(100) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `menus`
--

INSERT INTO `menus` (`menu_id`, `menu_name`, `menu_url`, `menu_icon`, `menu_parent_id`, `menu_sequence`) VALUES
(24, 'Anasayfa', '#', NULL, NULL, '1'),
(25, 'Hakkımızda', '#', NULL, NULL, '2'),
(26, 'Hakkımızda', 'hakkimizda', NULL, 25, '25.1'),
(27, 'Haberler', 'haberler', NULL, 25, '25.2'),
(28, 'Portfolyo', 'portfolyo-listesi', NULL, 25, '25.3'),
(29, 'Referanslar', 'referanslar', NULL, 25, '25.4'),
(30, 'Hizmetlerimiz', 'hizmetlerimiz', NULL, 25, '25.5'),
(31, 'Galeriler', '#', NULL, NULL, '3'),
(35, 'Ürünlerimiz', 'urun-listesi', NULL, NULL, '4'),
(36, 'Eğitimlerimiz', 'egitim-listesi', NULL, NULL, '5'),
(37, 'Markalar', 'markalar', NULL, NULL, '6'),
(42, 'Resim Galerisi', 'fotograf-galerisi', NULL, 31, '31.1'),
(43, 'Video Galerisi', 'video-galerisi', NULL, 31, '31.2'),
(44, 'Dosya Galerisi', 'dosya-galerisi', NULL, 31, '31.3');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `news`
--

CREATE TABLE `news` (
  `id` int(11) UNSIGNED NOT NULL,
  `url` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `description` text COLLATE utf8_turkish_ci DEFAULT NULL,
  `news_type` varchar(10) COLLATE utf8_turkish_ci DEFAULT NULL,
  `img_url` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `video_url` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `viewCount` int(11) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL,
  `isActive` tinyint(4) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `news`
--

INSERT INTO `news` (`id`, `url`, `title`, `description`, `news_type`, `img_url`, `video_url`, `viewCount`, `rank`, `isActive`, `createdAt`) VALUES
(2, 'iphonex-satislari-beklenilenin-altindaaaaaa', 'iphoneX Satışları Beklenilenin altındaaaaaa', '<p>iphoneX Satışları&nbsp;<b>Beklenilenin altındaaaaaaaa</b><br></p>', 'video', '#', 'https://www.youtube.com/watch?v=P-6qk1Ig22U', 9, 1, 1, '2017-12-25 22:59:32'),
(3, 'kablosuzkedi-den-yeni-bir-egitim-serisi-geldi-like-dislike', 'kablosuzkedi den yeni bir egitim serisi geldi like/dislike', '<p>kablosuzkedi den yeni bir egitim serisi geldi like/</p><p><iframe frameborder=\"0\" src=\"//www.youtube.com/embed/P-6qk1Ig22U\" width=\"640\" height=\"360\" class=\"note-video-clip\"></iframe><br></p>', 'image', 'kerkuk-bizimdir-yazar-11-11-2021.jpg', '#', 51, 0, 1, '2017-12-25 23:02:02');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `popups`
--

CREATE TABLE `popups` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `description` text COLLATE utf8_turkish_ci DEFAULT NULL,
  `page` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `popup_unique_id` varchar(60) COLLATE utf8_turkish_ci DEFAULT NULL,
  `isActive` tinyint(4) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `popups`
--

INSERT INTO `popups` (`id`, `title`, `description`, `page`, `popup_unique_id`, `isActive`, `createdAt`) VALUES
(1, 'aqwe', '<p>asdasaasda</p>', 'reference_list_v', '123456', 1, '2021-11-20 19:50:30'),
(2, 'das', '<p>asda</p>', 'news_list_v', '67897', 1, '2021-11-20 20:12:03'),
(4, 'Parlamento Haber', '<p><img src=\"https://www.atabeyturkocaklari.com/tema/belediye/uploads/haberler/manset/atabey19-genclik-kultur-ocaklari-nin-22-il-beyligi-sakarya-da-acildi.jpeg\" style=\"width: 730px;\"><br></p>', 'course_list_v', '76856', 1, '2021-11-20 21:23:25'),
(5, 'Atabey19\'a Kayıt Ol', '<p></p><div class=\"embed-responsive embed-responsive-16by9\"><iframe class=\"embed-responsive-item\" src=\"https://www.youtube.com/embed/QfvNN0aM3DM?rel=0\" allowfullscreen=\"\"></iframe></div><p></p>', 'brand_list_v', '61995801b91e1', 1, '2021-11-20 23:18:09');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `portfolios`
--

CREATE TABLE `portfolios` (
  `id` int(11) UNSIGNED NOT NULL,
  `url` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `description` text COLLATE utf8_turkish_ci DEFAULT NULL,
  `rank` int(11) DEFAULT NULL,
  `finishedAt` datetime DEFAULT NULL,
  `client` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `place` varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL,
  `portfolio_url` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `isActive` tinyint(4) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `portfolios`
--

INSERT INTO `portfolios` (`id`, `url`, `title`, `description`, `rank`, `finishedAt`, `client`, `category_id`, `place`, `portfolio_url`, `isActive`, `createdAt`) VALUES
(1, 'web-sitesi', 'web sitesi', '                            <p><span style=\"background-color: rgb(255, 0, 0);\">abc </span><font color=\"#ff9c00\">ajans </font><b>websitesi</b></p>                        ', 0, '2021-11-18 00:00:00', 'abc ajans', 1, 'istanbul', 'www.abcajans.com', 1, '2021-11-18 15:23:21'),
(2, 'kurumsal-kimlik-tasarimi', 'Kurumsal Kimlik Tasarımı', '<p>Bajans Kurumsal Kimlik Tasarımı ve Fotoğraf Çekimi</p>', 0, '2021-11-23 00:00:00', 'B Ajans', 2, 'Ankara', 'www.bajans.com', 1, '2021-11-23 00:25:41');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `portfolio_categories`
--

CREATE TABLE `portfolio_categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL,
  `isActive` tinyint(4) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `portfolio_categories`
--

INSERT INTO `portfolio_categories` (`id`, `title`, `isActive`, `createdAt`) VALUES
(1, 'Web', 1, '2021-11-18 15:16:39'),
(2, 'Fotoğraf', 1, '2021-11-18 15:22:07');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `portfolio_images`
--

CREATE TABLE `portfolio_images` (
  `id` int(11) UNSIGNED NOT NULL,
  `portfolio_id` int(11) DEFAULT NULL,
  `img_url` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `rank` int(11) DEFAULT NULL,
  `isActive` tinyint(11) DEFAULT NULL,
  `isCover` tinyint(11) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `portfolio_images`
--

INSERT INTO `portfolio_images` (`id`, `portfolio_id`, `img_url`, `rank`, `isActive`, `isCover`, `createdAt`) VALUES
(3, 1, 'services-design.jpg', 0, 1, 0, '2021-11-19 18:02:18'),
(6, 1, 'ato-duyuru-arkaplan.jpg', 0, 1, 0, '2021-11-20 01:04:35'),
(7, 1, 'maxresdefault.jpg', 0, 1, 1, '2021-11-23 00:26:38'),
(8, 2, 'uyanmaniz-icin-yazar-11-11-2021.jpg', 0, 1, 1, '2021-11-23 00:28:00'),
(9, 2, 'ph-rectangle-logo.PNG', 0, 1, 0, '2021-11-23 00:28:00'),
(10, 2, 'kerkuk-bizimdir-yazar-11-11-2021.jpg', 0, 1, 0, '2021-11-23 00:28:01');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `products`
--

CREATE TABLE `products` (
  `id` int(11) UNSIGNED NOT NULL,
  `url` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `description` text COLLATE utf8_turkish_ci DEFAULT NULL,
  `rank` int(11) DEFAULT NULL,
  `isActive` tinyint(4) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `products`
--

INSERT INTO `products` (`id`, `url`, `title`, `description`, `rank`, `isActive`, `createdAt`) VALUES
(2, 'deneme-url-2', 'Deneme Ürünü 2', 'Bu bir deneme ürünü aciklamasidir 2', 4, 1, NULL),
(6, 'monitor-askisi-50-45-cm-buyuklugundedir', 'Monitör Askısı 50.45 cm büyüklüğündedir', '<p>test amacli üretildi..</p>', 1, 1, '2017-12-14 00:43:46'),
(9, 'testt-testt', 'testt testt', '<p>alert denemesidier..</p>', 2, 1, '2017-12-20 01:22:10'),
(11, 'asda', 'asda', '<p>sdsdsds</p>', 3, 1, '2017-12-20 01:24:32'),
(12, 'mantar-tablo', 'Mantar Tablo', 'Bu tablo o kadar güzel bir tablodur ki!!!', 0, 1, '2018-01-11 13:39:23');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `img_url` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `rank` int(11) DEFAULT NULL,
  `isActive` tinyint(11) DEFAULT NULL,
  `isCover` tinyint(11) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `img_url`, `rank`, `isActive`, `isCover`, `createdAt`) VALUES
(44, NULL, 'kablosuzkedi-2-768x858.png', 15, 0, 0, '2017-12-29 08:22:07'),
(45, NULL, 'videosinif-proje.png', 14, 0, 0, '2017-12-29 08:22:07'),
(46, NULL, 'ipphone8.jpeg', 0, 1, 0, '2017-12-29 08:25:35'),
(47, 6, 'ekran-resmi-2017-12-30-00-23-49--2-.png', 0, 1, 0, '2018-01-06 20:02:16'),
(48, 6, 'ekran-resmi-2017-12-30-00-26-11--2-.png', 2, 1, 0, '2018-01-06 20:02:16'),
(49, 6, 'ekran-resmi-2017-12-30-00-26-19--2-.png', 3, 1, 0, '2018-01-06 20:02:16'),
(50, 6, 'ekran-resmi-2017-12-30-00-27-36--2-.png', 1, 1, 0, '2018-01-06 20:02:16'),
(61, 12, 'services-photography.jpg', 0, 1, 0, '2021-11-19 17:30:16'),
(64, 12, 'services-design.jpg', 0, 1, 0, '2021-11-19 17:37:28');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `references`
--

CREATE TABLE `references` (
  `id` int(11) UNSIGNED NOT NULL,
  `url` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `description` text COLLATE utf8_turkish_ci DEFAULT NULL,
  `img_url` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `rank` int(11) DEFAULT NULL,
  `isActive` tinyint(4) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `references`
--

INSERT INTO `references` (`id`, `url`, `title`, `description`, `img_url`, `rank`, `isActive`, `createdAt`) VALUES
(2, 'firma-2', 'Firma 2', '<p>asdasdasd bu refransimiza cok güveniyoruz.. 2</p>', 'se8gyzdl-400x400.jpg', 1, 1, '2017-12-27 00:18:34'),
(3, 'firma-1', 'Firma 1', '<p>Firma 1 Açıklama</p>', 'atabey-logo-png.png', 2, 1, '2021-11-18 16:09:28'),
(4, 'firma3', 'Firma3', '<p>Firma 3 Hakkında</p>', 'parlamentohaber-icon.png', 0, 1, '2021-11-22 17:43:58');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `services`
--

CREATE TABLE `services` (
  `id` int(11) UNSIGNED NOT NULL,
  `url` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `description` text COLLATE utf8_turkish_ci DEFAULT NULL,
  `img_url` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `rank` int(11) DEFAULT NULL,
  `isActive` tinyint(4) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `services`
--

INSERT INTO `services` (`id`, `url`, `title`, `description`, `img_url`, `rank`, `isActive`, `createdAt`) VALUES
(1, 'design', 'Design', '<p>Profesyonel Dizayn, Tasarım</p>', 'services-design.jpg', 0, 1, '2021-11-18 16:25:26'),
(2, 'fotograf', 'Fotoğraf', '<p>Profesyonel Fotoğrafçılık</p>', 'services-photography.jpg', 0, 1, '2021-11-19 15:09:54');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `settings`
--

CREATE TABLE `settings` (
  `id` int(11) UNSIGNED NOT NULL,
  `company_name` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `slogan` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `address` text COLLATE utf8_turkish_ci DEFAULT NULL,
  `about_us` longtext COLLATE utf8_turkish_ci DEFAULT NULL,
  `about_us_gallery_id` int(11) DEFAULT NULL,
  `mission` longtext COLLATE utf8_turkish_ci DEFAULT NULL,
  `vision` longtext COLLATE utf8_turkish_ci DEFAULT NULL,
  `references_description` text COLLATE utf8_turkish_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `mobile_logo` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `favicon` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `phone_1` varchar(15) COLLATE utf8_turkish_ci DEFAULT NULL,
  `phone_2` varchar(15) COLLATE utf8_turkish_ci DEFAULT NULL,
  `fax_1` varchar(15) COLLATE utf8_turkish_ci DEFAULT NULL,
  `fax_2` varchar(15) COLLATE utf8_turkish_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `settings`
--

INSERT INTO `settings` (`id`, `company_name`, `slogan`, `address`, `about_us`, `about_us_gallery_id`, `mission`, `vision`, `references_description`, `logo`, `mobile_logo`, `favicon`, `phone_1`, `phone_2`, `fax_1`, `fax_2`, `email`, `facebook`, `twitter`, `instagram`, `linkedin`, `createdAt`, `updatedAt`) VALUES
(4, 'Bea Cms', 'Kalitenin tek adresi', '                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                Muratpaşa/Antalya                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        ', '                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <p style=\"margin-bottom: 1rem; color: rgb(134, 132, 132); font-family: \" titillium=\"\" web\",=\"\" sans-serif;=\"\" font-size:=\"\" 16px;\"=\"\">Atatürk ve Ata TÜRK‘e göre Türkiye Cumhuriyeti’nin, Devlet Yönetim Sistemi ve Türk Milletinin Yaşayış Sisteminin Doğaya, Akla, Bilime ve ATA TÜRK’E göre düzenlenmesi için kurulmuştur. Satıh, bütün Vatandır. </p><p style=\"margin-bottom: 1rem; color: rgb(134, 132, 132); font-family: \" titillium=\"\" web\",=\"\" sans-serif;=\"\" font-size:=\"\" 16px;\"=\"\"><span style=\"font-weight: bolder;\">ATABEY19 GENÇLİK KÜLTÜR OCAKLARI Olarak Amacımız, </span>Türkiye Cumhuriyeti Devletinin Yönetim Sistemini, Türk Milletinin Yaşam Kültürünü ATATÜRK gibi, ATA TÜRK‘e, Doğaya, Akla, Bilime ve mevcut Hukuka göre yeniden tesis etmektir. </p><p style=\"margin-bottom: 1rem; color: rgb(134, 132, 132); font-family: \" titillium=\"\" web\",=\"\" sans-serif;=\"\" font-size:=\"\" 16px;\"=\"\"><span style=\"font-weight: bolder;\">Bu amaç doğrultusunda hedefimiz,</span>Türk Milletini, her il, ilçe mahalle ve köyde, Türk Kültürü ve Töresine göre bilinçlendirmek, Akıl, Hukuk ve Bilimin ışığında TÜRK Ulusunun hakettiği yeri almasını sağlamaktır.</p><p style=\"margin-bottom: 1rem; color: rgb(134, 132, 132); font-family: \" titillium=\"\" web\",=\"\" sans-serif;=\"\" font-size:=\"\" 16px;\"=\"\"><span style=\"font-weight: bolder;\">Tam Bağımsız Türkiye hedefli Atatürk\'ün Türkleri, ATABEY19 GENÇLİK KÜLTÜR OCAKLARI çatısı altında, Partisiz Atatürk doktrinin taşıyıcısı etrafında birleşecek, 2019 ve sonrasında Türk Milleti özbilincine yeniden kavuşacak ve tarih sahnesinde hakettiği yeri alacaktır.</span></p>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    ', 13, '                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <span style=\"font-weight: bolder; color: rgb(134, 132, 132); font-family: \"Titillium Web\", sans-serif; font-size: 16px;\">ATABEY19 GENÇLİK KÜLTÜR OCAKLARI Olarak Amacımız, </span><span style=\"color: rgb(134, 132, 132); font-family: \"Titillium Web\", sans-serif; font-size: 16px;\">Türkiye Cumhuriyeti Devletinin Yönetim Sistemini, Türk Milletinin Yaşam Kültürünü ATATÜRK gibi, ATA TÜRK‘e, Doğaya, Akla, Bilime ve mevcut Hukuka göre yeniden tesis etmektir.</span>                                                                                                                                                                                                                                                                                                                                                                                                                                                ', '                                                                                                                                                                                                                                                                                                                                                                                                                                                        <span style=\"font-weight: bolder; color: rgb(134, 132, 132); font-family: \"Titillium Web\", sans-serif; font-size: 16px;\">Bu amaç doğrultusunda hedefimiz,</span><span style=\"color: rgb(134, 132, 132); font-family: \"Titillium Web\", sans-serif; font-size: 16px;\">Türk Milletini, her il, ilçe mahalle ve köyde, Türk Kültürü ve Töresine göre bilinçlendirmek, Akıl, Hukuk ve Bilimin ışığında TÜRK Ulusunun hakettiği yeri almasını sağlamaktır.</span>                                                                                                                                                                                                                                                                                                                                                                                                            ', 'Bizimle çalışmaktan memnuniyet duyan firmalar', 'videosinif.png', 'videosinif.png', 'videosinif.png', '5077158109', '', '', '', 'burakefeayvazlar@gmail.com', 'https://www.facebook.com/atoankarail', 'https://twitter.com/atoankara', 'https://www.instagram.com/atoankarail/', 'https://www.linkedin.com/atoankarail/', '2018-01-14 22:15:17', '2022-02-09 11:09:13');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `slides`
--

CREATE TABLE `slides` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `img_url` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `allowButton` tinyint(4) DEFAULT NULL,
  `button_url` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `button_caption` varchar(25) COLLATE utf8_turkish_ci DEFAULT NULL,
  `animation_type` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `animation_time` int(11) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL,
  `isActive` tinyint(4) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `slides`
--

INSERT INTO `slides` (`id`, `title`, `description`, `img_url`, `allowButton`, `button_url`, `button_caption`, `animation_type`, `animation_time`, `rank`, `isActive`, `createdAt`) VALUES
(1, 'Slayt 1', '<p>Slayt 1 Açıklama</p>', 'burak-efe-b5amu2koore-unsplash.jpg', 0, '', '', NULL, NULL, 0, 1, '2021-11-20 13:51:52'),
(2, 'Slayt2', '<p>Slayt2 açıklama</p>', '237976db7a8cb35af645830b6718e4ef.jpg', 1, 'https://www.udemy.com/', 'Görüntülle', NULL, NULL, 1, 1, '2021-11-20 13:57:16');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL,
  `description` varchar(500) COLLATE utf8_turkish_ci DEFAULT NULL,
  `full_name` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `company` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `img_url` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `rank` tinyint(4) DEFAULT -99,
  `isActive` tinyint(4) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `testimonials`
--

INSERT INTO `testimonials` (`id`, `title`, `description`, `full_name`, `company`, `img_url`, `rank`, `isActive`, `createdAt`) VALUES
(1, 'Kaliteli İş', 'Siteleri güncel kodlama bilgisi ile ve tasarım olarak özgün şekilde yaptığınız için ilk tercihimiz siz oldunuz. Sektörde lider bir firma  yolunda ilerliyorsunuz. Başarılar dileriz.', 'Burak Efe Ayvazlar', 'BEA', 'ph-cover-logo.png', 1, 1, '2021-11-24 22:03:47'),
(2, 'Güzel Çalışma', 'Çalışmalarınız çok başarılı, projelerinizi ilgiliyle takip ediyoruz. Başarılar dileriz.', 'Ahmet Mehmet', 'Abc', 'ph-notification-grey.png', 0, 1, '2021-11-24 22:26:25');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_name` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `full_name` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL,
  `isActive` tinyint(4) DEFAULT NULL,
  `user_role_id` tinyint(4) DEFAULT 2,
  `createdAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `user_name`, `full_name`, `email`, `password`, `isActive`, `user_role_id`, `createdAt`) VALUES
(1, 'befeayvazlar', 'Burak Efe Ayvazlar', 'admin@admin.com', '25d55ad283aa400af464c76d713c07ad', 1, 1, '2018-01-08 22:00:53'),
(2, 'editör', 'Editor Soyad', 'editor@example.com', '25d55ad283aa400af464c76d713c07ad', 1, 2, '2018-01-08 22:40:53');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user_roles`
--

CREATE TABLE `user_roles` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `permissions` text COLLATE utf8_turkish_ci DEFAULT NULL,
  `isActive` tinyint(4) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `user_roles`
--

INSERT INTO `user_roles` (`id`, `title`, `permissions`, `isActive`, `createdAt`) VALUES
(1, 'Admin', '{\"brands\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"courses\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"dashboard\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"emailsettings\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"galleries\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"members\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"menu\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"news\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"popups\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"portfolio\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"portfolio_categories\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"product\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"references\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"reports\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"services\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"settings\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"slides\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"testimonials\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"userop\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"users\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"user_roles\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"}}', 1, '2021-11-29 14:17:47'),
(2, 'Kullanıcı', '{\"brands\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"courses\":{\"read\":\"on\",\"delete\":\"on\"},\"dashboard\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"galleries\":{\"update\":\"on\",\"delete\":\"on\"},\"news\":{\"read\":\"on\",\"write\":\"on\"},\"popups\":{\"update\":\"on\",\"delete\":\"on\"},\"portfolio\":{\"read\":\"on\",\"write\":\"on\"},\"portfolio_categories\":{\"update\":\"on\",\"delete\":\"on\"},\"product\":{\"read\":\"on\",\"write\":\"on\"},\"references\":{\"update\":\"on\",\"delete\":\"on\"},\"services\":{\"read\":\"on\",\"write\":\"on\"},\"settings\":{\"update\":\"on\",\"delete\":\"on\"},\"slides\":{\"read\":\"on\",\"write\":\"on\"},\"testimonials\":{\"update\":\"on\",\"delete\":\"on\"},\"userop\":{\"read\":\"on\",\"write\":\"on\"},\"users\":{\"read\":\"on\",\"update\":\"on\"},\"user_roles\":{\"read\":\"on\",\"write\":\"on\"}}', 1, '2021-11-29 14:24:55');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `videos`
--

CREATE TABLE `videos` (
  `id` int(11) UNSIGNED NOT NULL,
  `gallery_id` int(11) DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `rank` int(255) DEFAULT NULL,
  `isActive` tinyint(255) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `videos`
--

INSERT INTO `videos` (`id`, `gallery_id`, `url`, `rank`, `isActive`, `createdAt`) VALUES
(1, 10, 'https://www.youtube.com/watch?v=EF6vmq0Fk4o', 1, 1, NULL),
(3, 10, 'https://www.youtube.com/watch?v=2eZRRRiPQo8', 0, 1, '2018-01-06 22:55:52');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `email_settings`
--
ALTER TABLE `email_settings`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`menu_id`);

--
-- Tablo için indeksler `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `popups`
--
ALTER TABLE `popups`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `portfolios`
--
ALTER TABLE `portfolios`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `portfolio_categories`
--
ALTER TABLE `portfolio_categories`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `portfolio_images`
--
ALTER TABLE `portfolio_images`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `references`
--
ALTER TABLE `references`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- Tablo için AUTO_INCREMENT değeri `email_settings`
--
ALTER TABLE `email_settings`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Tablo için AUTO_INCREMENT değeri `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Tablo için AUTO_INCREMENT değeri `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Tablo için AUTO_INCREMENT değeri `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `menus`
--
ALTER TABLE `menus`
  MODIFY `menu_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Tablo için AUTO_INCREMENT değeri `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `popups`
--
ALTER TABLE `popups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `portfolio_categories`
--
ALTER TABLE `portfolio_categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `portfolio_images`
--
ALTER TABLE `portfolio_images`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Tablo için AUTO_INCREMENT değeri `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- Tablo için AUTO_INCREMENT değeri `references`
--
ALTER TABLE `references`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `slides`
--
ALTER TABLE `slides`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
