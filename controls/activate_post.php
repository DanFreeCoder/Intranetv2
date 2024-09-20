<?php
include '../config/clsConnectionIntranet.php';
include '../objects/clsPosts.php';

$database = new clsConnectionIntranet();
$db = $database->connect();

$post = new Posts($db);
$id = IMPLODE(',',$_POST['post_id']);
$post->id = $id;

$delete = $post->activate_post();

if($delete)
{
	echo 1;
}
else
{
	echo 0;
}
?>