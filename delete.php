<?php
require_once('autoload.php');
$id = $_GET['id'];
$carte = new Carti();
$res = $carte->delete($id);
if($res){
	header('location: afisare_carti.php');
}else{
	echo "Failed to Delete Record";
}


?>