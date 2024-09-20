<?php
include '../config/clsConnectionIntranet.php';
include '../config/clsConnection.php';
include '../objects/clsUsers.php';

$datbase = new clsConnectionIntranet();
$db = $datbase->connect();

$user = new Users($db);

$id = $_POST['id'];
$password = $_POST['pass'];

$user->id = $id;
$user->password = md5($password);

$update = $user->update_account();

if($update)
{
	echo 1;
}	
else
{
	echo 0;
}

?>