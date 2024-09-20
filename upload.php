<?php
$file = $_FILES['files']['name'];
$path = '/var/www/html/uploads/images/'.$file;
//$path = 'uploads/images/'.$file;
$temp = $_FILES['files']['tmp_name'];
$name = $_FILES['files']['name'];
$uploadStat = 1;
$errors = array();

//check if file already exist 
if(file_exists("/var/www/html/uploads/images/".$file))
//if(file_exists("uploads/images/".$file))
{
	$errors[] =  "ERROR! File already exist in the directory!";
	$uploadStat = 0;
}

//check if the file if uploaded
if($uploadStat == 1)
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
?>