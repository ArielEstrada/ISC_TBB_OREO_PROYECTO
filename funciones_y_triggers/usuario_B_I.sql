CREATE DEFINER=`root`@`localhost` TRIGGER `usuario_BEFORE_INSERT` BEFORE INSERT ON `usuario` FOR EACH ROW BEGIN
declare long_NoCtrl int;
declare aux int;

select new.NoControl like '%55%' into aux;
set long_NoCtrl = length(new.NoControl);
if long_NoCtrl != 8 then
signal sqlstate '45000' set message_text = '¡El Número de control no es válido!';
elseif aux != 1 then
signal sqlstate '45000' set message_text = '¡El Número de control no es válido!';
end if;

END