<?php
$host = "localhost";
$dbuser = "ITCHIIsocial";
$dbpass = "holamundo";
$db = "proyectotbb";

$connect = new mysqli ($host, $dbuser, $dbpass,$db);
	if(!$connect)
		echo ("No se ha conectado a la base de datos");
	//else
	//	$select = mysqli_select_db($connect, $db)
	//	or die("No se puede conectar a esa base de datos");
/*

$sss= "insert into usuarios (NoControl,nombre,contrasena,fecha_reg) values ('1','nombre','123',now())";
if(mysqli_query($connect,$sss))
echo("Se ejecuto la instruccion");
*/
?>