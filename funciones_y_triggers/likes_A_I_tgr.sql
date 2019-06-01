CREATE DEFINER=`root`@`localhost` TRIGGER `likes_AFTER_INSERT` AFTER INSERT ON `likes` FOR EACH ROW BEGIN
declare nikes int;
declare dis int;

if new.tipo = 1 then
select likes into nikes from publicaciones;
set nikes = nikes + 1;
update publicaciones set likes = nikes where id_pub = new.id_pub;
else
select disklikes into dis from publicaciones;
set dis = dis + 1;
update publicaciones set disklikes = dis where id_pub = new.id_pub;
end if;

END