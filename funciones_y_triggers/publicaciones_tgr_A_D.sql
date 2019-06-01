CREATE DEFINER=`root`@`localhost` TRIGGER `publicaciones_AFTER_DELETE` AFTER DELETE ON `publicaciones` FOR EACH ROW BEGIN
delete from comentarios where publicacion = old.id_pub;
delete from likes where id_pub = old.id_pub;
END