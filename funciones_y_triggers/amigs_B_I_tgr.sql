CREATE DEFINER=`root`@`localhost` TRIGGER `amigos_BEFORE_INSERT` BEFORE INSERT ON `amigos` FOR EACH ROW BEGIN
declare con int;
select max(id_ami) into con from amigos;
set con = con+1;
set new.id_ami = con;

END