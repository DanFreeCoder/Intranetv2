<?php
session_start();
include '../config/clsConnectionIntranet.php';
include '../objects/clsEvent.php';

$database = new clsConnectionIntranet();
$db = $database->connect();

$event = new Events($db);

$event_date = date('Y-m-d', strtotime($_POST['event_date']));
$event_name = $_POST['event_name'];
$status = 1;

$event->event_date = $event_date;
$event->event_name = $event_name;
$event->status = $status;

$save_event = $event->save_event();
	if($save_event)
	{
		echo 1;
	}
	else
	{
		echo 0;
	}
?>