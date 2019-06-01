CREATE DEFINER=`root`@`localhost` FUNCTION `Inicio_Sesion`(NoCntrl int,contrasenia text) RETURNS int(11)
BEGIN
#select * from usuario where NoControl = $NoControl AND contrasena = '$contrasena'
declare cont int;

select count(*) into cont from usuario where NoControl = NoCntrl and  contrasena = contrasenia;
RETURN cont;
END