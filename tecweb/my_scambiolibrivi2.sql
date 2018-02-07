SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

USE `flonedo`;

DROP TABLE IF EXISTS `copialibro`;
CREATE TABLE IF NOT EXISTS `copialibro` (
  `codiceLibro` int(11) NOT NULL AUTO_INCREMENT,
  `ISBN` varchar(13) NOT NULL,
  `proprietario` varchar(20) NOT NULL,
  `prezzo` double(4,2) NOT NULL,
  `stato` varchar(255) NOT NULL,
  `note` varchar(160) DEFAULT NULL,
  `foto` varchar(30) DEFAULT 'noImage.jpg',
  PRIMARY KEY (`codiceLibro`),
  KEY `ISBN` (`ISBN`),
  KEY `proprietario` (`proprietario`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

INSERT INTO `copialibro` (`codiceLibro`, `ISBN`, `proprietario`, `prezzo`, `stato`, `note`, `foto`) VALUES
(1, '9788804552246', 'Marco96', 8.50, 'Come nuovo', 'Consigliato agli appassionati del Medioevo', 'noImage.jpg'),
(2, '9788845278655', 'Marco96', 5.00, 'Lievi segni di usura', 'Imperdibile dopo aver visto il film.', 'noImage.jpg'),
(3, '9788845272400', 'Luca', 5.50, 'Come nuovo', NULL, 'noImage.jpg'),
(4, '9788807900495', 'fra93', 7.00, 'Danni minori', NULL, 'noImage.jpg'),
(5, '9788807900587', 'fra93', 13.25, 'Ottimo', 'Bellissimo Libro', 'ritrattoDG.jpg'),
(6, '9788891902245', 'Marco96', 52.00, 'Ottimo stato ', 'Libto usatissimo per il corso di ingegneria del software ', 'noImage.jpg'),
(7, '9788804552246', 'user', 12.00, 'fd', 'fd', 'noImage.jpg'),
(9, '9788804497158', 'Luca', 4.91, 'Buono', '', '9.jpg'),
(11, '9788806207267', 'Luca', 3.00, 'Danneggiato', 'Presenta alcune scritte a penna', '11.jpg');

DROP TABLE IF EXISTS `genere`;
CREATE TABLE IF NOT EXISTS `genere` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

INSERT INTO `genere` (`id`, `nome`) VALUES
(1, 'Informatica'),
(2, 'Storia'),
(3, 'Classici'),
(4, 'Horror'),
(5, 'Fantascienza'),
(6, 'Fantasy'),
(7, 'Bambini'),
(8, 'Scuola'),
(9, 'Romantico'),
(10, 'Arte'),
(11, 'Filosofia'),
(12, 'Geografia'),
(13, 'Poesia'),
(14, 'Matematica'),
(15, 'Fisica'),
(16, 'Scienze'),
(17, 'Biografia'),
(18, 'Sport'),
(19, 'Cucina'),
(20, 'Fai da te'),
(21, 'Economia'),
(23, 'Narrativa'),
(24, 'Lingua straniera'),
(25, 'Giallo'),
(26, 'Thriller'),
(27, 'Religione');

DROP TABLE IF EXISTS `generelibro`;
CREATE TABLE IF NOT EXISTS `generelibro` (
  `codiceLibro` int(11) NOT NULL,
  `idGenere` int(11) NOT NULL,
  PRIMARY KEY (`codiceLibro`,`idGenere`),
  KEY `idGenere` (`idGenere`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `generelibro` (`codiceLibro`, `idGenere`) VALUES
(1, 23),
(2, 23),
(3, 6),
(3, 23),
(4, 3),
(4, 23),
(5, 3),
(6, 8);

DROP TABLE IF EXISTS `libro`;
CREATE TABLE IF NOT EXISTS `libro` (
  `titolo` varchar(255) NOT NULL,
  `autore` varchar(255) NOT NULL,
  `casaEditrice` varchar(255) DEFAULT NULL,
  `ISBN` varchar(13) NOT NULL,
  `annoPubblicazione` year(4) DEFAULT NULL,
  PRIMARY KEY (`ISBN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `libro` (`titolo`, `autore`, `casaEditrice`, `ISBN`, `annoPubblicazione`) VALUES
('Tomb Raider - le avventure di Lara Croft', 'Vari', 'Mondadori', '9788804497158', 2001),
('I pilastri della terra', 'K. Follett', 'Mondadori', '9788804552246', 2005),
('Guida galattica per gli autostoppisti', 'D. Adams', 'Mondadori', '9788804641728', 2014),
('Open. La mia storia', 'Andre Agassi', 'Einaudi', '9788806207267', 2011),
('Uno nessuno e centomila', 'L. Pirandello', 'Einaudi', '9788806221966', 2014),
('La coscienza di Zeno', 'I. Svevo', 'Feltrinelli', '9788807900495', 2014),
('Il ritratto di Dorian Gray', 'O. Wilde', 'Feltrinelli', '9788807900587', 2013),
('Faust', 'J.W. Goethe', 'BUR', '9788817066983', 2005),
('Il Silmarillion', 'J.R.R. Tolkien', 'Bompiani', '9788845272400', 2013),
('Il nome della rosa', 'U. Eco', 'Bompiani', '9788845278655', 2014),
('Il signore degli anelli', 'J.R.R. Tolkien', 'Bompiani', '9788845294044', 2017),
('Siddharta', 'H. Hesse', 'Adelphi', '9788845901843', 1985),
('Harry Potter e la pietra filosofale', 'J.K. Rowling', 'Salani', '9788867155958', 2013),
('Harry Potter e l\'ordine della fenice', 'J.K. Rowling', 'Salani', '9788867158164', 2015),
('Architettura e organizzazione dei calcolatori. Progetto e prestazioni.', 'W. Stallings', 'Pearson', '9788871925974', 2010),
('Reti di calcolatori', 'A.S. Tanenbaum, W.D. Wetherall', 'Pearson', '9788871926407', 2011),
('Ingegneria del software', 'I. Sommerville', 'Pearson', '9788891902245', 2017);

DROP TABLE IF EXISTS `utente`;
CREATE TABLE IF NOT EXISTS `utente` (
  `username` varchar(12) NOT NULL,
  `password` varchar(12) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `cognome` varchar(20) NOT NULL,
  `citta` varchar(20) NOT NULL,
  `provincia` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `numeroTelefono` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `utente` (`username`, `password`, `nome`, `cognome`, `citta`, `provincia`, `email`, `numeroTelefono`) VALUES
('Ciao', 'CiaoCioa', 'MioNome', 'MioCognome', 'MiaCitta', 'MiaProvincia', 'lamiamail@gmail.com', ''),
('fra93', 'Tsuki', 'Francesca', 'Lonedo', 'Vicenza', 'VI', 'lonedofrancesca@gmail.com', ''),
('Luca', 'ciao', 'Luca', 'Allegro', 'Camisano Vicentino', 'VI', 'aluca@gmail.com', '1234556'),
('Marco96', 'Pippo', 'Marco', 'Giollo', 'Vicenza', 'VI', 'gmarco@gmail.com', ''),
('user', 'user', 'user', 'user', 'user', 'user', 'user@user.user', '');


ALTER TABLE `copialibro`
  ADD CONSTRAINT `copialibro_ibfk_1` FOREIGN KEY (`ISBN`) REFERENCES `libro` (`ISBN`) ON DELETE NO ACTION,
  ADD CONSTRAINT `copialibro_ibfk_2` FOREIGN KEY (`proprietario`) REFERENCES `utente` (`username`) ON DELETE NO ACTION;

ALTER TABLE `generelibro`
  ADD CONSTRAINT `generelibro_ibfk_1` FOREIGN KEY (`idGenere`) REFERENCES `genere` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
