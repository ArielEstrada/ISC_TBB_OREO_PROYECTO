CREATE DEFINER=`root`@`localhost` TRIGGER `likes_BEFORE_INSERT` BEFORE INSERT ON `likes` FOR EACH ROW BEGIN
declare c int;

select count(*) into c from publicaciones where id_pub = new.id_pub;
if c=0 then
signal sqlstate '45000' set message_text = '¡ESA PUBLICACION NO EXISTE!';
end if;


END