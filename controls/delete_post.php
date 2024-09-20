<?php
include '../config/clsConnectionIntranet.php';
include '../objects/clsPosts.php';
include '../objects/clsPostAttachments.php';

$database = new clsConnectionIntranet();
$db = $database->connect();

$post = new Posts($db);
$attach = new PostAttachments($db);

$id = IMPLODE(',',$_POST['post_id']);
$post->id = $id;

//get the details of the post
$attach->attach_id = $id;
$get = $attach->display_attach();
while($row = $get->fetch(PDO::FETCH_ASSOC))
{
	$path = '/var/www/html'.$row['image_path'];
}

$delete = $post->delete_post();

if($delete)
{
	if(unlink($path))
	{
		echo 1;
	}
	else
	{
		echo 0;
	}
}
else
{
	echo 0;
}
?>