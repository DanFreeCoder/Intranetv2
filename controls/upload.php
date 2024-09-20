<?php
	include "../config/clsConnectionIntranet.php";
	include "../objects/clsPostAttachments.php";

	$database = new clsConnectionIntranet();
	$db = $database->connect();

	//$post = new Posts($db);
	$attach = new PostAttachments($db);

	$post_id = $_POST['post_id'];

		//$directory = 'html\uploads\images/';
		$directory = 'var/www/html/uploads/images/';
		$temp = $_FILES['files']['tmp_name'];
		$name = $_FILES['files']['name'];
		$file = $directory.basename($_FILES['files']['name']);
		$uploadStat = 1;
		$errors = array();

		//check if file already exist 
		if(file_exists($file))
		{
			$errors[] =  "ERROR! File already exist in the directory!";
			$uploadStat = 0;
		}

		//check if the file if uploaded
		if($uploadStat == 1)
		{				
			$attach->attach_id = $post_id;
			$attach->image_path = mysqli_real_escape_string("/"."uploads/images/" . $name);
			$attach->file_name = $name;					

			$saveattach = $attach->save();
			if($saveattach)
			{
				if(move_uploaded_file($temp, $file))
				{
					echo "Image ". basename($_FILES["files"]["name"]). "has been successfully uploaded.";
				}
				else
				{
					print_r($errors);
				}
			}
		}				
?>