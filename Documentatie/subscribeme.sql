-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Genereertijd: 10 jun 2013 om 16:13
-- Serverversie: 5.5.27
-- PHP-versie: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `subscribeme`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `short_name` varchar(128) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  PRIMARY KEY (`short_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden uitgevoerd voor tabel `courses`
--

INSERT INTO `courses` (`short_name`, `full_name`) VALUES
('Analyse', 'Analyse '),
('CO1', 'Computer Organisatie 1 '),
('Databases', 'Databases 1 '),
('DiWi', 'Discrete Wiskunde '),
('Engels', 'Engels'),
('Programmeren1', 'Programmeren1'),
('Programmeren2', 'Programmeren 2 '),
('Programmeren3', 'Programmeren 3'),
('Wiskunde', 'Wiskunde Basis ');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `faq`
--

CREATE TABLE IF NOT EXISTS `faq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(128) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `answer` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Gegevens worden uitgevoerd voor tabel `faq`
--

INSERT INTO `faq` (`id`, `question`, `slug`, `answer`) VALUES
(1, 'Hoe kan ik mij inschrijven voor een toets?', 'hoe-kan-ik-mij-inschrijven-voor-een-toets', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ornare \r\nsed purus imperdiet porttitor. Maecenas nec tortor varius turpis \r\neleifend tempus. Proin auctor orci ut arcu consequat, et congue nisl \r\ndapibus. Integer quis rutrum tortor, vel adipiscing mi. Pellentesque at \r\nmalesuada arcu, eget pulvinar sem. Maecenas ipsum ipsum, blandit in \r\nmetus sit amet, condimentum egestas lorem. Morbi vel elementum erat, \r\npulvinar placerat mauris. Vestibulum et metus sit amet nunc egestas \r\nornare id vitae arcu. Nunc sollicitudin laoreet tellus, mollis euismod \r\nnisl eleifend a. Vestibulum ante ipsum primis in faucibus orci luctus et \r\nultrices posuere cubilia Curae; Morbi ut augue odio.'),
(2, 'Hoe kan ik mij uitschrijven voor een toets?', 'hoe-kan-ik-mij-uitschrijven-voor-een-toets', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ornare \r\nsed purus imperdiet porttitor. Maecenas nec tortor varius turpis \r\neleifend tempus. Proin auctor orci ut arcu consequat, et congue nisl \r\ndapibus. Integer quis rutrum tortor, vel adipiscing mi. Pellentesque at \r\nmalesuada arcu, eget pulvinar sem. Maecenas ipsum ipsum, blandit in \r\nmetus sit amet, condimentum egestas lorem. Morbi vel elementum erat, \r\npulvinar placerat mauris. Vestibulum et metus sit amet nunc egestas \r\nornare id vitae arcu. Nunc sollicitudin laoreet tellus, mollis euismod \r\nnisl eleifend a. Vestibulum ante ipsum primis in faucibus orci luctus et \r\nultrices posuere cubilia Curae; Morbi ut augue odio.'),
(3, 'Waar kan ik mijn inschrijvingen bekijken?', 'waar-kan-ik-mijn-inschrijvingen-bekijken', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ornare \r\nsed purus imperdiet porttitor. Maecenas nec tortor varius turpis \r\neleifend tempus. Proin auctor orci ut arcu consequat, et congue nisl \r\ndapibus. Integer quis rutrum tortor, vel adipiscing mi. Pellentesque \r\nat \r\nmalesuada arcu, eget pulvinar sem. Maecenas ipsum ipsum, blandit in \r\nmetus sit amet, condimentum egestas lorem. Morbi vel elementum erat, \r\npulvinar placerat mauris. Vestibulum et metus sit amet nunc egestas \r\nornare id vitae arcu. Nunc sollicitudin laoreet tellus, mollis euismod \r\nnisl eleifend a. Vestibulum ante ipsum primis in faucibus orci luctus \r\net \r\nultrices posuere cubilia Curae; Morbi ut augue odio.');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `text` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Gegevens worden uitgevoerd voor tabel `news`
--

INSERT INTO `news` (`id`, `title`, `slug`, `text`, `date`) VALUES
(1, 'Gezocht: Promotievrijwilligers voor 3FM Serious Request 2013!', 'gezocht-promotievrijwilligers-voor-3fm-serious-request-2013', 'Krijg jij ook elk jaar weer zoveel energie van 3FM Serious Request? En vind \r\nje het leuk om andere mensen hier enthousiast voor te maken? Dan kun jij ons \r\nhelpen! Geef je op als Promotievrijwilliger!<br>Een Promotievrijwilliger \r\ngeeft jongeren de tools- en brengt het enthousiasme over, om in actie te \r\nkomen voor 3FM Serious Request . En het werkt! Elk jaar halen jongeren meer \r\ngeld op voor Serious Request. Als Promotievrijwilliger maak je dus echt het \r\nverschil!<br><br><strong>Wat ga je doen?</strong><br>Als \r\nPromotievrijwilliger geef je presentaties over 3FM Serious Request op \r\nscholen, bij bedrijven en verenigingen in jouw omgeving.<br>Naast promotie \r\nkun je ook actief mee gaan werven om zo nog meer scholen, bedrijven en \r\nverenigingen te laten meedoen. Dit bepaal je zelf bij je intakegesprek.<br>\r\n<br><strong>Wat houdt een presentatie in?</strong><br>Tijdens de presentatie \r\ngeef je uitleg over 3FM Serious Request, informatie over het Rode Kruis en \r\nlicht je de stille ramp van dit jaar toe. Het komt voor dat je \r\nbrainstormsessies begeleidt waarin de groep zijn creatieve ideen voor \r\nacties kan spuien en maak je samen met hen een plan van aanpak.<br>\r\n<strong>&nbsp;<br>Hoeveel tijd besteed je aan het geven van presentaties?\r\n</strong><br>De inhoud en duur van n presentatie is afhankelijk van de \r\ntijd die beschikbaar wordt gesteld door de scholen, bedrijven en \r\nverenigingen. Normaal gesproken is dit niet meer dan een lesuur. De eerste \r\npresentaties gaan vanaf september 2013 van start en stoppen in de actieweek \r\nvan 18-24 december 2013. Een overzichtelijk project van 4 maanden dus! We \r\nhouden rekening met je woonplaats, agenda en dus je beschikbaarheid. Je kunt \r\nzelf aangeven hoe vaak je per week ingezet wil/kan worden.<br>&nbsp;<br>\r\n<strong>Wat bieden wij?</strong><br>Je maakt onderdeel uit van een \r\nenthousiast team Promotievrijwilligers waarmee je samenwerkt aan het \r\ngrootste multimediale evenement van Europa!<br>Wij bieden twee trainingen om \r\njou de juiste handvatten te geven. Deze trainingen zijn verplicht. Hiervoor \r\nmoet je twee keer een dagdeel beschikbaar zijn. Naast een \r\npresentatietraining (juni/juli) zul je ook een training (september) krijgen \r\nover het thema, krijg je een briefing over het Rode Kruis en krijg je \r\ninzicht in de inhoud van de presentatie.<br>&nbsp;<br><strong>Aanmelden?\r\n</strong><br>Kom jij het team van Promotievrijwilliger versterken voor 3FM \r\nSerious Request 2013?<br>Stuur een videoboodschap naar <a \r\nhref="mailto:3fm@redcross.nl" rel="nofollow">3fm@redcross.nl</a> voor 20 \r\njuni. Maak je video niet langer dan 1 minuut en introduceer jezelf op \r\nsprankelende wijze en leg kort en bondig uit waarom jij ons team moet komen \r\nversterken.<br>Je wordt uitgenodigd voor een sollicitatiegesprek. Voor meer \r\ninformatie kun je contact opnemen met Lot van Foreest ( <a \r\nhref="mailto:3fm@redcross.nl" rel="nofollow">3fm@redcross.nl </a>)', '2013-06-10 14:04:52'),
(2, 'NHL''ers werken aan petitie voor onderwijsverbetering', 'nhlers-werken-aan-petitie-voor-onderwijsverbetering', 'Op 11 juni vertrekken drie studenten van de NHL samen met \r\nMatthias Mitzschke, NHL-docent talen en kerndocent bij de \r\nMasteropleiding Duits, drie leerlingen en een docent van het Bogerman \r\nCollege en Erika Broschek, hoofd taalafdeling van het Goethe- \r\nInstituut in Nederland, naar Mnchen. Daar werken zij samen met andere \r\nleerlingen en docenten uit Duitsland, Finland, Zweden en Engeland aan \r\nhet project Bildung und Zukunft.<p>Bildung und Zukunft \r\nis een project genitieerd door het Goethe instituut. De deelnemende \r\nlanden zijn Duitsland, Finland, Zweden, Engeland en Nederland. Het \r\nproject heeft als doel het onderwijssysteem van alle deelnemende \r\nlanden te verbeteren door te kijken naar de schoolsystemen van de \r\ndeelnemende landen en daarvan te leren. De deelnemers werken samen aan \r\neen petitie die aangeboden wordt aan alle ministers van onderwijs van \r\nde deelnemende landen. De petitie heeft als doel het onderwijs van de \r\ndeelnemende landen te verbeteren.</p><p><strong>Goethe \r\ninstituut</strong><br>Het project Bildung und Zukunft is een project \r\nvan het Goethe instituut, de culturele ambassade van Duitsland. Haar \r\ndoelstelling is de instandhouding van de Duitse taal en de bevordering \r\nvan de internationale culturele samenwerking. Erika Broschek is, samen \r\nmet haar collega in Stockholm, de initiatiefnemer van dit project.</p>', '2013-06-10 14:03:40'),
(3, 'Donderdag 13 juni geeft Sodexo gratis ijs weg!', 'donderdag-13-juni-geeft-sodexo-gratis-ijs-weg', 'Nu het eindelijk heerlijk zomer begint te worden en het einde van het collegejaar in zicht is, deelt Sodexo \r\ndonderdag 13 juni gratis ijs uit. Wie donderdag 13 juni voor  2 of meer besteedt, kan met de kassabon van het \r\nrestaurant of het NHL-Caf&eacute; dezelfde dag een gratis ijsje komen afhalen in het NHL-Caf.\r\n\r\n<p><strong><em>Sodexo wenst jullie alvast succes met de laatste lessen van het collegejaar.</em></strong></p>', '2013-06-10 14:03:07');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `page` varchar(128) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Gegevens worden uitgevoerd voor tabel `pages`
--

INSERT INTO `pages` (`id`, `title`, `page`, `text`) VALUES
(1, 'Home', 'home', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ornare \r\nsed purus imperdiet porttitor. Maecenas nec tortor varius turpis \r\neleifend tempus. Proin auctor orci ut arcu consequat, et congue nisl \r\ndapibus. Integer quis rutrum tortor, vel adipiscing mi. Pellentesque \r\nat \r\nmalesuada arcu, eget pulvinar sem. Maecenas ipsum ipsum, blandit in \r\nmetus sit amet, condimentum egestas lorem. Morbi vel elementum erat, \r\npulvinar placerat mauris. Vestibulum et metus sit amet nunc egestas \r\nornare id vitae arcu. Nunc sollicitudin laoreet tellus, mollis euismod \r\nnisl eleifend a. Vestibulum ante ipsum primis in faucibus orci luctus \r\net \r\nultrices posuere cubilia Curae; Morbi ut augue odio.'),
(2, 'Subscribe', 'subscribe', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ornare \r\nsed purus imperdiet porttitor. Maecenas nec tortor varius turpis \r\neleifend tempus. Proin auctor orci ut arcu consequat, et congue nisl \r\ndapibus. Integer quis rutrum tortor, vel adipiscing mi. Pellentesque \r\nat \r\nmalesuada arcu, eget pulvinar sem. Maecenas ipsum ipsum, blandit in \r\nmetus sit amet, condimentum egestas lorem. Morbi vel elementum erat, \r\npulvinar placerat mauris. Vestibulum et metus sit amet nunc egestas \r\nornare id vitae arcu. Nunc sollicitudin laoreet tellus, mollis euismod \r\nnisl eleifend a. Vestibulum ante ipsum primis in faucibus orci luctus \r\net \r\nultrices posuere cubilia Curae; Morbi ut augue odio.');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `signups`
--

CREATE TABLE IF NOT EXISTS `signups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `test_id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `course_name` varchar(128) NOT NULL,
  `year` int(11) NOT NULL,
  `period` int(11) NOT NULL,
  `test` varchar(128) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `test_id` (`test_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tests`
--

CREATE TABLE IF NOT EXISTS `tests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_name` varchar(128) NOT NULL,
  `year` int(11) NOT NULL,
  `period` int(11) NOT NULL,
  `test` varchar(128) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `course_name` (`course_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

--
-- Gegevens worden uitgevoerd voor tabel `tests`
--

INSERT INTO `tests` (`id`, `course_name`, `year`, `period`, `test`) VALUES
(1, 'Analyse', 1, 1, 'Tentamen'),
(2, 'Programmeren1', 1, 1, 'Tentamen'),
(3, 'Databases', 1, 1, 'Tentamen'),
(4, 'DiWi', 1, 1, 'Deeltoets 1'),
(5, 'DiWi', 1, 2, 'Deeltoets 2'),
(6, 'Programmeren2', 1, 2, 'Deeltoets 2'),
(7, 'Wiskunde', 1, 1, 'Deeltoets 1'),
(8, 'Wiskunde', 1, 2, 'Deeltoets 2'),
(9, 'Wiskunde', 1, 3, 'Deeltoets 3'),
(10, 'Programmeren3', 1, 3, 'Tentamen'),
(11, 'CO1', 1, 1, 'Deeltoets 1'),
(12, 'CO1', 1, 2, 'Deeltoets 2'),
(13, 'CO1', 1, 3, 'Deeltoets 3'),
(14, 'Engels', 1, 4, 'Tentamen'),
(15, 'Analyse', 2, 1, 'Tentamen'),
(16, 'Programmeren1', 2, 1, 'Tentamen'),
(17, 'Databases', 2, 1, 'Tentamen'),
(18, 'DiWi', 2, 1, 'Deeltoets 1'),
(19, 'DiWi', 2, 2, 'Deeltoets 2'),
(20, 'Programmeren2', 2, 2, 'Deeltoets 2'),
(21, 'Wiskunde', 2, 1, 'Deeltoets 1'),
(22, 'Wiskunde', 2, 2, 'Deeltoets 2'),
(23, 'Wiskunde', 2, 3, 'Deeltoets 3'),
(24, 'Programmeren3', 2, 3, 'Tentamen'),
(25, 'CO1', 2, 1, 'Deeltoets 1'),
(26, 'CO1', 2, 2, 'Deeltoets 2'),
(27, 'CO1', 2, 3, 'Deeltoets 3'),
(28, 'Engels', 2, 4, 'Tentamen'),
(29, 'Analyse', 3, 1, 'Tentamen'),
(30, 'Programmeren1', 3, 1, 'Tentamen'),
(31, 'Databases', 3, 1, 'Tentamen'),
(32, 'DiWi', 3, 1, 'Deeltoets 1'),
(33, 'DiWi', 3, 2, 'Deeltoets 2'),
(34, 'Programmeren2', 3, 2, 'Deeltoets 2'),
(35, 'Wiskunde', 3, 1, 'Deeltoets 1'),
(36, 'Wiskunde', 3, 2, 'Deeltoets 2'),
(37, 'Wiskunde', 3, 3, 'Deeltoets 3'),
(38, 'Programmeren3', 3, 3, 'Tentamen'),
(39, 'CO1', 3, 1, 'Deeltoets 1'),
(40, 'CO1', 3, 2, 'Deeltoets 2'),
(41, 'CO1', 3, 3, 'Deeltoets 3'),
(42, 'Engels', 3, 4, 'Tentamen'),
(43, 'Analyse', 4, 1, 'Tentamen'),
(44, 'Programmeren1', 4, 1, 'Tentamen'),
(45, 'Databases', 4, 1, 'Tentamen'),
(46, 'DiWi', 4, 1, 'Deeltoets 1'),
(47, 'DiWi', 4, 2, 'Deeltoets 2'),
(48, 'Programmeren2', 4, 2, 'Deeltoets 2'),
(49, 'Wiskunde', 4, 1, 'Deeltoets 1'),
(50, 'Wiskunde', 4, 2, 'Deeltoets 2'),
(51, 'Wiskunde', 4, 3, 'Deeltoets 3'),
(52, 'Programmeren3', 4, 3, 'Tentamen'),
(53, 'CO1', 4, 1, 'Deeltoets 1'),
(54, 'CO1', 4, 2, 'Deeltoets 2'),
(55, 'CO1', 4, 3, 'Deeltoets 3'),
(56, 'Engels', 1, 4, 'Tentamen');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `password` varchar(32) NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Gegevens worden uitgevoerd voor tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `first_name`, `last_name`, `email`) VALUES
(1, 'admin', '382e0360e4eb7b70034fbaa69bec5786', 'Admin', 'SubscribeMe', 'info@subscribeme.nl'),
(2, 'personeel', '382e0360e4eb7b70034fbaa69bec5786', 'Personeel', 'SubscribeMe', 'info@subscribeme.nl'),
(3, 'student', '382e0360e4eb7b70034fbaa69bec5786', 'Student', 'SubscribeMe', 'info@subscribeme.nl');

--
-- Beperkingen voor gedumpte tabellen
--

--
-- Beperkingen voor tabel `signups`
--
ALTER TABLE `signups`
  ADD CONSTRAINT `signups_ibfk_1` FOREIGN KEY (`test_id`) REFERENCES `tests` (`id`);

--
-- Beperkingen voor tabel `tests`
--
ALTER TABLE `tests`
  ADD CONSTRAINT `tests_ibfk_1` FOREIGN KEY (`course_name`) REFERENCES `courses` (`short_name`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
