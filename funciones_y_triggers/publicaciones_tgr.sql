CREATE DEFINER=`root`@`localhost` TRIGGER `publicaciones_BEFORE_INSERT` BEFORE INSERT ON `publicaciones` FOR EACH ROW BEGIN
set new.likes = 0;
set new.disklikes = 0;
END