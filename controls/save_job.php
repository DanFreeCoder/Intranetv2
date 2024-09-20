<?php
session_start();

	include '../config/clsConnectionIntranet.php';
	include '../objects/clsJobVacancies.php';

	$database = new clsConnectionIntranet();
	$db = $database->connect();

	$job = new Jobs($db);

	$position = $_POST['position'];
	$no_of_job = $_POST['vacancies'];
	//$qualification = $_POST['qualification'];
	$summary = $_POST['summary'];

	$job->position = $position;
	$job->no_of_job = $no_of_job;
	//$job->qualification = $qualification;
	$job->summary = $summary;
	$job->status = 1;

	$save_job = $job->save_job();

	if($save_job)
	{
		echo 1;
	}
	else
	{
		echo 0;
	}
?>