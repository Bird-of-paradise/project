CREATE TABLE  IF NOT EXISTS `users`
(
  `id` INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(25) NOT NULL,
  `password` VARCHAR(25) NOT NULL,
  `email` VARCHAR(25) NOT NULL
);
CREATE UNIQUE INDEX `name` ON `users` ( `name` );

CREATE TABLE IF NOT EXISTS `albums` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_bin NOT NULL,
  `img_file` varchar(50) COLLATE utf8_bin NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `songs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_bin NOT NULL,
  `genre` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `artist` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `file_name` varchar(100) COLLATE utf8_bin NOT NULL,
  `id_album` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `text` text COLLATE utf8_bin,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;
