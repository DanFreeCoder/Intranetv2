<?php
	session_start();
	include '../config/clsConnectionIntranet.php';
	include '../config/clsConnectionTicketing.php';
	include '../objects/clsUsers.php';
	include '../objects/clsTicketing.php';

	//initialize db connection(intranetdb)
	$database = new clsConnectionIntranet();
	$db = $database->connect();

	//initialize db connection(ticketingdb)
	$database2 = new clsConnectionTicketing();
	$db2 = $database2->connect();

	//initialized objects
	$users = new Users($db);
	$ticket = new Ticketing($db2);

	if(isset($_POST['id']))
	{
		$id = $_POST['id'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		$username = $_POST['username'];
		$access_type_id = $_POST['access_type_id'];

		//passing of data to intranetdb
		$users->firstname = $firstname;
		$users->lastname = $lastname;
		$users->email = $email;
		$users->username = $username;
		$users->access_type_id = $access_type_id;
		$users->id = $id;
		//call the function to update user in intranet
		$update_users = $users->update_users();

		//passing data to ticketing
		$ticket->firstname = $firstname;
		$ticket->lastname = $lastname;
		$ticket->email = $email;
		$ticket->id = $id;
		//call the function to update requestor in ticketing
		$update_requestor = $ticket->update_requestor();

		if($update_users && $update_requestor)
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
		echo "No data is being passed!!";
	}
?>