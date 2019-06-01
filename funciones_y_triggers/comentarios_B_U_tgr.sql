CREATE DEFINER=`root`@`localhost` TRIGGER `comentarios_BEFORE_INSERT` BEFORE INSERT ON `comentarios` FOR EACH ROW BEGIN
declare cont int;

select count(*) into cont from publicaciones where id_pub = new.publicacion;
if cont = 0 then
signal sqlstate '45000' set message_text = '¡ESA PUBLICACION NO EXISTE!';
end if;

END