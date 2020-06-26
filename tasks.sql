-- --------------------------------------------------------
-- Host:                         localhost
-- Versión del servidor:         10.2.3-MariaDB-log - mariadb.org binary distribution
-- SO del servidor:              Win32
-- HeidiSQL Versión:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para tasks
CREATE DATABASE IF NOT EXISTS `tasks` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `tasks`;

-- Volcando estructura para tabla tasks.tasks
CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `tag` enum('sports','job','studies','lifestyle','science') NOT NULL,
  `name` varchar(200) NOT NULL DEFAULT '0',
  `description` text NOT NULL DEFAULT '0',
  `status` enum('waiting','doing','finalized') NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `user_task` (`user_id`),
  CONSTRAINT `user_task` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla tasks.tasks: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `tasks` DISABLE KEYS */;
INSERT INTO `tasks` (`id`, `user_id`, `tag`, `name`, `description`, `status`, `creation_date`, `update_date`) VALUES
	(3, 2, 'studies', 'Tarea Creada Por El Ad', 'Tarea creada por el admin, pero asignada a Miguel Nuñez', 'doing', '2020-06-26 14:52:08', '2020-06-26 19:22:32');
/*!40000 ALTER TABLE `tasks` ENABLE KEYS */;

-- Volcando estructura para tabla tasks.tasks_backup
CREATE TABLE IF NOT EXISTS `tasks_backup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `tag` enum('sports','job','studies','lifestyle','science') NOT NULL,
  `name` varchar(200) NOT NULL DEFAULT '0',
  `description` text NOT NULL DEFAULT '0',
  `status` enum('waiting','doing','finalized') NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `delete_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `user_task` (`user_id`),
  CONSTRAINT `tasks_backup_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla tasks.tasks_backup: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `tasks_backup` DISABLE KEYS */;
INSERT INTO `tasks_backup` (`id`, `user_id`, `tag`, `name`, `description`, `status`, `creation_date`, `update_date`, `delete_date`) VALUES
	(1, 1, 'studies', 'Test 1', 'my firts test, edited =)', 'doing', '2020-06-25 17:39:49', '2020-06-25 19:28:41', '0000-00-00 00:00:00'),
	(3, 2, 'studies', 'Test Tarea 1, Usuario Miguel', 'Esta es una prueba del funcionamiento, =$/, esta tarea esta modificada', 'doing', '2020-06-26 03:48:01', '2020-06-26 08:18:37', '2020-06-26 03:49:14'),
	(4, 5, 'studies', 'Tarea Temporal', 'Tarea temporal creada por el administrador para luego ser borrada', 'finalized', '2020-06-26 14:57:14', '2020-06-26 19:27:25', '2020-06-26 14:59:05');
/*!40000 ALTER TABLE `tasks_backup` ENABLE KEYS */;

-- Volcando estructura para tabla tasks.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL DEFAULT '0',
  `password` varchar(150) NOT NULL DEFAULT '0',
  `name` varchar(50) NOT NULL DEFAULT '0',
  `lastname` varchar(50) NOT NULL DEFAULT '0',
  `email` varchar(50) NOT NULL DEFAULT '0',
  `occupation` varchar(80) NOT NULL DEFAULT '0',
  `user_level` enum('admin','regular') NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla tasks.users: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `password`, `name`, `lastname`, `email`, `occupation`, `user_level`, `creation_date`, `update_date`) VALUES
	(1, 'gdaboin', '$2y$10$orxtlxDN6RUzQF39029X6uz3DVGHl5oQvURdnzU/YWwL2/VX1RZhC', 'Gustavo', 'Daboin', 'gdaboin@test.com', 'estudiante', 'regular', '2020-06-26 15:27:06', '0000-00-00 00:00:00'),
	(2, 'mnuñez', '$2y$10$COizFn7RORGdNHsmfqFeLu8cnaWOjGK1zwRot1b9mxadCA1wp4KXa', 'Miguel', 'Nueñez', 'miguel@mail.com', 'estudiante', 'regular', '2020-06-26 15:27:06', '0000-00-00 00:00:00'),
	(5, 'admin', '$2y$10$orxtlxDN6RUzQF39029X6uz3DVGHl5oQvURdnzU/YWwL2/VX1RZhC', 'Gustavo', 'Daboin', 'gdaboin@admin.com', 'estudiante', 'admin', '2020-06-26 15:27:06', '0000-00-00 00:00:00'),
	(6, 'dmoreno', '$2y$10$830lfsAFGvzm0VhWasXDv.xsG.e19XLTcQqdYm.OLp3YYEH7WZQni', 'Daniel', 'Moren', 'dmoreno@mail.com', 'estudiante', 'regular', '2020-06-26 16:43:09', '2020-06-26 22:09:32');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Volcando estructura para tabla tasks.users_backup
CREATE TABLE IF NOT EXISTS `users_backup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL DEFAULT '0',
  `password` varchar(150) NOT NULL DEFAULT '0',
  `name` varchar(50) NOT NULL DEFAULT '0',
  `lastname` varchar(50) NOT NULL DEFAULT '0',
  `email` varchar(50) NOT NULL DEFAULT '0',
  `occupation` varchar(80) NOT NULL DEFAULT '0',
  `user_level` enum('admin','regular') NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `delete_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla tasks.users_backup: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `users_backup` DISABLE KEYS */;
INSERT INTO `users_backup` (`id`, `username`, `password`, `name`, `lastname`, `email`, `occupation`, `user_level`, `creation_date`, `update_date`, `delete_date`) VALUES
	(3, 'victorm', '$2y$10$f.XEHznWQ44rawyppyU6u.LCDsIMH71rapwUr1WfHNFndppbinhSy', 'Victor', 'Manuel', 'victorm@gmail.com', 'deportista', 'regular', '2020-06-26 15:27:06', '0000-00-00 00:00:00', '2020-06-26 16:51:19');
/*!40000 ALTER TABLE `users_backup` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
