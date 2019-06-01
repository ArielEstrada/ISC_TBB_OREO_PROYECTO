<?php
require('lib/config.php');

$NoControl = $_POST['NoControl'];
$comentario = $_POST['comentario'];
$publicacion = $_POST['id_pub'];

$insert = mysqli_query($connect,"insert into comentarios (NoControl, comentario, fecha, publicacion) VALUES ('$NoControl', '$comentario', now(), '$publicacion')";



?>