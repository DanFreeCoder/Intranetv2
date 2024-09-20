<?php
include '../config/clsConnectionIntranet.php';
include '../objects/clsJobVacancies.php';

$database = new clsConnectionIntranet();
$db = $database->connect();

$job = new Jobs($db);

$id = $_POST['id'];
$position = $_POST['position'];
$no_of_job = $_POST['no_of_job'];
//$qualification = $_POST['qualification'];
$summary = $_POST['summary'];

$job->id = $id;
$job->position = $position;
$job->no_of_job = $no_of_job;
//$job->qualification = $qualification;
$job->summary = $summary;

$update = $job->update_job();

if($update)
{
	echo 1;
}
else
{
	echo 0;
}

?>