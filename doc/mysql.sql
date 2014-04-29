DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(72) NOT NULL,
  `phone` varchar(20),
  `password` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
);