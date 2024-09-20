<?php
include '../../config/clsConnectionTicketing.php';
include '../../objects/clsTicketing.php';

$database = new clsConnectionTicketing();
$db = $database->connect();

$sub = new Ticketing($db);

$sub->cat_id = $_POST['id'];

$view = $sub->get_sub_cat_bycat();

while($row = $view->fetch(PDO::FETCH_ASSOC))
{
	echo '<option value="'.$row['sub_id'].'">'.$row['sub_category'].'</option>';	
}
?>