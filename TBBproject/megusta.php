<?php
session_start();
include 'lib/config.php';

$post = $_POST['id_pub'];
$usuario = $_SESSION['NoControl'];


$comprobar = mysqli_query($connect,"select * from likes WHERE post = '".$post."' AND usuario = ".$usuario."");
$count = mysqli_num_rows($comprobar);

if ($count == 0) {

	$insert = mysqli_query($connect,"insert into likes (NoControl,id_pub,fecha,tipo) values ('$usuario','$post',now(),1)");
	

}

else 

{

	$disk = mysqli_query($connect,"insert into likes (NoControl,id_pub,fecha,tipo) values ('$usuario','$post',now()),0");
	

}

$contar = mysqli_query($connect,"select likes, disklikes FROM publicaciones WHERE id_pub = ".$post."");
$cont = mysql_fetch_array($contar);
$likes = $cont['likes'];
$disk = $cont['disklikes'];
if ($count >= 1) { $megusta = "<i class='fa fa-thumbs-o-up'></i> Me gusta"; $likes = " (".$likes++.")"; } else { $megusta = "<i class='fa fa-thumbs-o-up'></i> No me gusta"; $likes = " (".$likes--.")"; }

$datos = array('likes' =>$likes,'text' =>$megusta);

echo json_encode($datos);

?>