<?php
	include '../config/clsConnectionIntranet.php';
	include '../objects/clsUsers.php';

	$database = new clsConnectionIntranet();
	$db = $database->connect();

	$users = new Users($db);
	if(isset($_POST['empid']))
	{
		$users->firstname = $_POST['firstname'];
		$users->lastname = $_POST['lastname'];
		$users->empid = $_POST['empid'];

		$ifExist = $users->check_if_exist();
		if($row = $ifExist->fetch(PDO::FETCH_ASSOC))
		{
			echo $row['count'];
		}
		else
		{
			echo 0;
		}
	}

?>