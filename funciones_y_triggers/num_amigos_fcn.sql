CREATE DEFINER=`root`@`localhost` FUNCTION `num_amigos`(NoCtrl int) RETURNS int(11)
BEGIN
declare num int;
select count(*) into num from amigos where de = NoCtrl or para = NoCtrl and estado = 1;
RETURN num;
END