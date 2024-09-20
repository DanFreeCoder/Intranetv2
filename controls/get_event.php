<?php
include "../config/clsConnectionIntranet.php";
include "../objects/clsEvent.php";

$database = new clsConnectionIntranet();
$db = $database->connect();

$event = new Event($db);
$event->status = 1;

$view = $event->get_event();

	if(!$view)
	{
		echo json_encode(0);
		//echo "error";
	}
	else
	{
		$array = "";
		while($row = $view->fetch(PDO::FETCH_ASSOC))
		{
			$array = array($row['event_date'], $row['event_name']);
		}

		echo json_encode($array);
	}


?>