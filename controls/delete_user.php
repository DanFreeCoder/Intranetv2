<?php
	session_start();
	include '../config/clsConnectionIntranet.php';
	include '../config/clsConnectionTicketing.php';
	include '../objects/clsUsers.php';
	include '../objects/clsTicketing.php';

	//initialize db connection(intranetdb)
	$database = new clsConnectionIntranet();
	$db = $database->connect();

	//initialize db connection(ticketing)
	$database2 = new clsConnectionTicketing();
	$db2 = $database2->connect();

	//initialized objects
	$user = new Users($db);
	//initialized objects
	$ticket = new Ticketing($db2);

	if(isset($_POST['id']))
	{
		$user->id = $_POST['id'];
		$ticket->id = $_POST['id'];
		//call each function
		$del_user = $user->delete_user();
		$del_req = $ticket->delete_requestor();

		if($del_user) 
		{
			if($del_req)
			{
				echo 1;
			}
			else
			{
				echo 0;
			}
		}
		else
		{
			echo 0;
		}
	}
?>