<?php
	include_once "../config/clsConnectionIntranet.php";
	include_once "../objects/clsSliders.php";

	$database = new clsConnectionIntranet();
	$db = $database->connect();

	$slider = new Sliders($db);
	$category_id = '1';

	//Determinie ACTION IF SAVE OR UPDATE, 0 if new and 1 if update
	$action = 0;
	$slider->title = 1;
	$slider->status = 1;
	$view = $slider->view();
	if($row = $view->fetch(PDO::FETCH_ASSOC))
	{
		$action = 1;
	}
	else
	{
		echo "test";
	}
?>