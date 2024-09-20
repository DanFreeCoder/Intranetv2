<?php
	include '../config/clsConnectionIntranet.php';
	include '../objects/clsCategory_Form.php';

	$name = $_POST['name'];

	$database = new clsConnectionIntranet();
	$db = $database->connect();

	$form_cat = new FormCategories($db);
	$form_cat->name = $name;

	if($form_cat->save())
	{
		$get_result = $form_cat->view();
		
		while($row = $get_result->fetch(PDO::FETCH_ASSOC))
		{
			echo '<tr>';
	        echo '<td><input type="checkbox" value = "'.$row['id'].'" name="form_category" id="form_category" class="form_category"></input></td>';
	        echo '<td>'.$row['id'].'</td>';
	        echo '<td>'.$row['name'].'</td>';
	        echo '</tr>';
		}

	}
	else
	{
		echo 0;
	}

?>