<?php
	include "config/clsConnectionIntranet.php";
	include "objects/clsPostAttachments.php";

	$database = new clsConnectionIntranet();
	$db = $database->connect();

	//$post = new Posts($db);
	$attach = new PostAttachments($db);

	$post_id = $_POST['id'];

		$file = $_FILES['files']['name'];
		$path = 'uploads/images/'.$file;
		$temp = $_FILES['files']['tmp_name'];
		$name = $_FILES['files']['name'];
		$uploadStat = 1;
		$errors = array();

		//check if file already exist 
		if(file_exists("uploads/images/".$file))
		{
			$errors[] =  "ERROR! File already exist in the directory!";
			$uploadStat = 0;
		}

		//check if the file if uploaded
		if($uploadStat == 1)
		{				
			$attach->attach_id = $post_id;
			$attach->image_path = "/".$path;
			$attach->file_name = $name;					

			$saveattach = $attach->update();
			if($saveattach)
			{
				if(move_uploaded_file($temp, $path))
				{
					echo 1;
				}
				else
				{
					echo 0;
				}
			}
		}				
?>