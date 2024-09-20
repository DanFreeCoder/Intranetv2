<?php
//start a session for login
session_start();

include "../config/clsConnection.php";
include "../config/clsConnectionIntranet.php";
include "../objects/clsUsers.php";

//initiate a connection
$database = new clsConnectionIntranet();
$db = $database->connect();

//call the methods for user
$user = new Users($db);

//pass values from forms to classes;
$user->username = $_POST['username'];
$user->password = md5($_POST['password']);

$login = $user->login();

if ($row = $login->fetch(PDO::FETCH_ASSOC)) {
	$_SESSION['user-id'] = $row['id'];
	$_SESSION['access_type_id'] = $row['access_type_id'];
	$_SESSION['logcount'] = $row['log_count'];
	$_SESSION['username'] = $row['username'];
	$_SESSION['fullname'] = $row['fullname'];

	echo 1;
	$time = date('Y');
	$date = date('Y-m-d H:i:s'); //save if row is null
	//check where current year
	$user->cur_year = $time;
	$sel = $user->count_visitors();
	while ($row = $sel->fetch(PDO::FETCH_ASSOC)) {
		$weekly = date('D'); //check to reset weekly
		$yearnow = $row['curyear'];
		//check if row is null
		if ($yearnow == 0) {
			//add value once its's true
			$user->days = 1;
			$user->weeks = 1;
			$user->months = 1;
			$user->years = 1;
			$user->cur_year = $time;
			// $user->timechecker = $date;
			$user->day_name = $weekly;
			$addnew = $user->addyear();

			if ($addnew) {
				echo 2;
			} else {
				echo 00;
			}
		} else {
			//update if year is current
			$user->cur_year = $time;
			$sel = $user->view_visitors();
			while ($row = $sel->fetch(PDO::FETCH_ASSOC)) {
				$hour = date('H');
				$weekly = date('D'); //check to reset weekly
				$day = date('d');
				$date = date('Y-m-d H:i:s');
				// $time_checker = $row['timechecker'];
				$day_name = $row['day_name'];
				//check if date is the same
				if ($day_name != $weekly) {
					$user->days = 1; //reset count to 1
				} else {
					$user->days = $row['days'] + 1;
				}
				if ($weekly == 'Mon' && $hour < 1) {
					$user->weeks = 1; //reset count to 1
				} else {
					$user->weeks = $row['weeks'] + 1;
				}
				if (substr($date, 8) == 1 && $hour < 1) {
					$user->months = 1; //reset count to 1
				} else {
					$user->months = $row['months'] + 1;
				}

				$user->years = $row['years'] + 1; //continuous
				$user->day_name = $weekly;

				$user->cur_year = $time;
				$upd = $user->setval();

				if ($upd) {
					echo 3;
				} else {
					echo 000;
				}
			}
		}
	}
} else {
	echo 0;
}
