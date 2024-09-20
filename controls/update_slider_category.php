<?php
	include '../config/clsConnectionIntranet.php';
	include '../objects/clsSliderCategories.php';

	$name = $_POST['name'];
	$id = $_POST['id'];

	$database = new clsConnectionIntranet();
	$db = $database->connect();

	$slider_cat = new SliderCategories($db);
	$slider_cat->name = $name;
	$slider_cat->id = $id;
	$slider_cat->status = 2; //disabled

	if($slider_cat->update())
	{
		echo 1;
	}
	else
	{
		echo 0;
	}

?>