<?php
session_start();
include 'lib/config.php';
include 'lib/socialnetwork-lib.php';

ini_set('error_reporting',0);

if(!isset($_SESSION['NoControl']))
{
  header("Location: login.php");
}
?>

<?php
if(isset($_GET['NoControl'])) {

$id = $_GET['NoControl'];
$action = $_GET['action'];

if($action == 'aceptar') {

	$update = mysqli_query($connect,"UPDATE amigos SET estado = '1' WHERE id_ami = '$id'");
	header('Location:' . getenv('HTTP_REFERER'));

}

if($action == 'rechazar') {

	$delete = mysqli_query($connect,"DELETE FROM amigos WHERE id_ami = '$id'");
	header('Location:' . getenv('HTTP_REFERER'));

}



}