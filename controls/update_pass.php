<?php
include '../config/clsConnectionIntranet.php';
include '../config/clsConnection.php';
include '../objects/clsUsers.php';
include '../objects/clsEmployee.php';
include '../objects/clsUsers_timesheet.php';

//initialize db connection(intranetdb)
$database = new clsConnectionIntranet();
$db = $database->connect();

$user = new Users($db);
$remark = $_POST['remark'];

if($remark == 1 || $remark == "1")//update the password
{
	$id = $_POST['id'];
	$password = $_POST['password'];

	$user->id = $id;
	$user->password = md5($password);

	$update = $user->update_password();

		if($update)
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
}
else//update later
{
	$id = $_POST['id'];

	$user->id = $id;

	$update_later = $user->upd_later();

	if($update_later)
	{
		echo 1;
	}
	else
	{
		echo 0;
	}
}

?>