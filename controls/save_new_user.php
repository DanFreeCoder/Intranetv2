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
	$database1 = new clsConnectionTicketing();
	$db2 = $database1->connect();

	//initialized objects
	$users = new Users($db);
	$ticket = new Ticketing($db2);

	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email =  $_POST['email'];
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$access_type_id = $_POST['access_type_id'];
	$log_count = "0";
	$verification_code = "0";
	$security_q = "0";
	$security_a = "0";

	//passing data to users(intranetdb)
	$users->firstname = $firstname;
	$users->lastname = $lastname;
	$users->email = $email;
	$users->access_type_id = $access_type_id;
	$users->username = $username;
	$users->password = $password;
	$users->log_count = $log_count;
	$users->verification_code = $verification_code;
	$users->security_q = $security_q;
	$users->security_a = $security_a;
	$users->status = 1;

	//passing data to requestor(ticketing)
	$ticket->firstname = $_POST['firstname'];
	$ticket->lastname = $_POST['lastname'];
	$ticket->email = $_POST['email'];
	$ticket->department = $_POST['department'];
	$ticket->status = 1;

	//call function from clsUser(intranet)
	$save_users = $users->save_users();

	//call function from clsTicketing(ticketing)
	$save_requestor = $ticket->save_requestor();

	if($save_users && $save_requestor)
	{
		echo 1;
	}
	else
	{
		echo 0;
	}	
?>