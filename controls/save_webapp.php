<?php
	session_start();
	include '../config/clsConnectionIntranet.php';
	include '../objects/clsWeb_App.php';

	$database = new clsConnectionIntranet();
	$db = $database->connect();

	$web_app = new Web_App($db);
	
	$logo = $_POST['logo'];
	$link = $_POST['link'];

	//$logo = "Test";
	//$link = "a.link";
	$dateadd = date("Y-m-d");
	$addby = $_SESSION['empid'];

	$web_app->logo = $logo;
	$web_app->link = $link;
	$web_app->dateadd = $dateadd;
	$web_app->addby = $addby;

	$save = $web_app->save();

	if($save)
	{
		echo 1;
	}
	else
	{
		echo 0;
	}
		
	$dir = '../images';
	foreach ($_FILES["pictures"]["error"] as $key => $error) {
	    if ($error == UPLOAD_ERR_OK) {
	        $tmp_name = $_FILES["pictures"]["tmp_name"][$key];
	        // basename() may prevent filesystem traversal attacks;
	        // further validation/sanitation of the filename may be appropriate
	        $name = basename($_FILES["pictures"]["name"][$key]);
	        move_uploaded_file($tmp_name, "$dir/$name");
	    }
	}
?>