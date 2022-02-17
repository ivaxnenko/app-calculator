-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               10.3.32-MariaDB - MariaDB Server
-- Операционная система:         Linux
-- HeidiSQL Версия:              11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Дамп структуры базы данных app_calculator
CREATE DATABASE IF NOT EXISTS `app_calculator` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `app_calculator`;

-- Дамп структуры для таблица app_calculator.material
CREATE TABLE IF NOT EXISTS `material` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(5) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Дамп данных таблицы app_calculator.material: ~3 rows (приблизительно)
/*!40000 ALTER TABLE `material` DISABLE KEYS */;
INSERT INTO `material` (`id`, `name`) VALUES
	(1, 'шрот'),
	(2, 'жмых'),
	(3, 'соя');
/*!40000 ALTER TABLE `material` ENABLE KEYS */;

-- Дамп структуры для таблица app_calculator.month
CREATE TABLE IF NOT EXISTS `month` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Дамп данных таблицы app_calculator.month: ~6 rows (приблизительно)
/*!40000 ALTER TABLE `month` DISABLE KEYS */;
INSERT INTO `month` (`id`, `name`) VALUES
	(1, 'Январь'),
	(2, 'Февраль'),
	(3, 'Авуст'),
	(4, 'Сентябрь'),
	(5, 'Октябрь'),
	(6, 'Ноябрь');
/*!40000 ALTER TABLE `month` ENABLE KEYS */;

-- Дамп структуры для таблица app_calculator.price
CREATE TABLE IF NOT EXISTS `price` (
  `material_id` int(11) NOT NULL,
  `month_id` int(11) NOT NULL,
  `weight_id` int(11) NOT NULL,
  `price` smallint(5) unsigned NOT NULL DEFAULT 0,
  KEY `FK_price_month` (`month_id`),
  KEY `FK_price_weight` (`weight_id`),
  KEY `FK_price_material` (`material_id`),
  CONSTRAINT `FK_price_material` FOREIGN KEY (`material_id`) REFERENCES `material` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_price_month` FOREIGN KEY (`month_id`) REFERENCES `month` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_price_weight` FOREIGN KEY (`weight_id`) REFERENCES `weight` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Дамп данных таблицы app_calculator.price: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `price` DISABLE KEYS */;
INSERT INTO `price` (`material_id`, `month_id`, `weight_id`, `price`) VALUES
	(1, 1, 1, 125),
	(1, 1, 2, 145),
	(1, 1, 3, 136),
	(1, 1, 4, 138),
	(1, 2, 1, 121),
	(1, 2, 2, 118),
	(1, 2, 3, 137),
	(1, 2, 4, 142),
	(1, 3, 1, 137),
	(1, 3, 2, 119),
	(1, 3, 3, 141),
	(1, 3, 4, 117),
	(1, 4, 1, 126),
	(1, 4, 2, 121),
	(1, 4, 3, 137),
	(1, 4, 4, 124),
	(1, 5, 1, 124),
	(1, 5, 2, 122),
	(1, 5, 3, 131),
	(1, 5, 4, 147),
	(1, 6, 1, 128),
	(1, 6, 2, 147),
	(1, 6, 3, 143),
	(1, 6, 4, 112),
	(2, 1, 1, 121),
	(2, 1, 2, 118),
	(2, 1, 3, 137),
	(2, 1, 4, 142),
	(2, 2, 1, 137),
	(2, 2, 2, 121),
	(2, 2, 3, 124),
	(2, 2, 4, 131),
	(2, 3, 1, 124),
	(2, 3, 2, 145),
	(2, 3, 3, 136),
	(2, 3, 4, 138),
	(2, 4, 1, 137),
	(2, 4, 2, 147),
	(2, 4, 3, 143),
	(2, 4, 4, 112),
	(2, 5, 1, 122),
	(2, 5, 2, 143),
	(2, 5, 3, 112),
	(2, 5, 4, 117),
	(2, 6, 1, 125),
	(2, 6, 2, 145),
	(2, 6, 3, 136),
	(2, 6, 4, 138),
	(3, 1, 1, 137),
	(3, 1, 2, 147),
	(3, 1, 3, 112),
	(3, 1, 4, 122),
	(3, 2, 1, 125),
	(3, 2, 2, 145),
	(3, 2, 3, 136),
	(3, 2, 4, 138),
	(3, 3, 1, 124),
	(3, 3, 2, 145),
	(3, 3, 3, 136),
	(3, 3, 4, 138),
	(3, 4, 1, 122),
	(3, 4, 2, 143),
	(3, 4, 3, 112),
	(3, 4, 4, 117),
	(3, 5, 1, 137),
	(3, 5, 2, 119),
	(3, 5, 3, 141),
	(3, 5, 4, 117),
	(3, 6, 1, 121),
	(3, 6, 2, 118),
	(3, 6, 3, 137),
	(3, 6, 4, 142);
/*!40000 ALTER TABLE `price` ENABLE KEYS */;

-- Дамп структуры для таблица app_calculator.weight
CREATE TABLE IF NOT EXISTS `weight` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `count` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Дамп данных таблицы app_calculator.weight: ~4 rows (приблизительно)
/*!40000 ALTER TABLE `weight` DISABLE KEYS */;
INSERT INTO `weight` (`id`, `count`) VALUES
	(1, 25),
	(2, 50),
	(3, 75),
	(4, 100);
/*!40000 ALTER TABLE `weight` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
