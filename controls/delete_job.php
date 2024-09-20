<?php
include '../config/clsConnectionIntranet.php';
include '../objects/clsJobVacancies.php';

$database = new clsConnectionIntranet();
$db = $database->connect();

$job = new Jobs($db);

$id = $_POST['id'];

$job->id = $id;
$job->status = 0;

$delete = $job->delete_job();

if($delete)
{
	echo 1;
}
else
{
	echo 0;
}

?>