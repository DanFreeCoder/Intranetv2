<?php
	session_start();	
	include '../config/clsConnectionIntranet.php';
	include '../objects/clsPosts.php';
	include '../objects/clsDepartment.php';
	include '../objects/clsPostAttachments.php';

	$database = new clsConnectionIntranet();
	$db = $database->connect();

	$post = new Posts($db);
	$dept = new Department($db);
	$attach = new PostAttachments($db);

	//post details
	$post->type = $_POST['title'];
	$post->department = $_POST['department'];
	$post->details = $_POST['details'];
	$post->date_added = date("Y-m-d H:i");
	$post->posted_by = $_SESSION['user-id'];
	$post->status = 1;
	$save_post = $post->save_post();

	//POST attachment
	if(isset($_FILES['files']['name'])){
		$file = $_FILES['files']['name'];
		$path = '/uploads/images/'.$file;
		$temp = $_FILES['files']['tmp_name'];
		$name = $_FILES['files']['name'];
		//post attachment details
		$attach->attach_id = $_POST['post_id'];
		$attach->image_path = $path;
		$attach->file_name = $name;	
	}else{
		$attach->attach_id = $_POST['post_id'];
		$attach->image_path = null;
		$attach->file_name = null;	
	}		
	$saveattach = $attach->save();

	//get the dept dates
	$get = $dept->view_dept();
	while($row = $get->fetch(PDO:: FETCH_ASSOC))
	{
		$last_date = $row['new_date'];
	}
	//update the date in the department
	$dept->new_date = date("Y-m-d H:i");
	$dept->last_update = $last_date;
	$dept->id = $_POST['department'];

	$save_dept = $dept->save_date();

	if($save_post)
	{
		if($save_dept){
			if($saveattach){
				echo 1;
			}else{
				echo 0;
			}
		}else{
			echo 0;
		}
	}
	else
	{
		echo 0;
	}	
?>