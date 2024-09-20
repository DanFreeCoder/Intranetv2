<?php
include "../config/clsConnectionIntranet.php";
include "../objects/clsPosts.php";
include "../objects/clsPostAttachments.php";

$database = new clsConnectionIntranet();
$db = $database->connect();

$post = new Posts($db);
$attachment = new PostAttachments($db);

	//$post_id = $_POST['post-id'];
	if(isset($_FILES["file"]["type"]))
	{
		$Folder = "C:\wamp\www\innogroupv2\uploads\images";
		$target_file = $Folder.basename($_FILES["fileToUpload"]["name"]);
		$uploadOK = 1;
		$imageFileType = strtolower(pathinfo($Folder,PATHINFO_EXTENSION));

			//check if file already exixt
			if(file_exist($target_file))
			{
				echo "File already exist";
				$uploadOK = 0;
			}
			//check file size
			if($_FILES["fileToUpload"]["size"] > 1500000)
			{
				echo "Sorry your file is too large";
				$uploadOK = 0;
			}
			//Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif")
			{
				echo "Invalid Format";
			}

			if($uploadOK == 0)
			{
				echo "ERROR!! File was not uploaded";
			}
			else
			{
				if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$target_file))
				{
					echo "Upload successfull";
				}
				else
				{
					echo "ERROR!!";
				}
			}
	}
	else
	{
		echo "No Image to upload";
	}
?>
