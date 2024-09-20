<?php
include '../config/clsConnectionIntranet.php';
include '../objects/clsJobVacancies.php';

$database = new clsConnectionIntranet();
$db = $database->connect();

$job = new Jobs($db);

$job->id = $_POST['id'];
$job->status = 0;

$view_job = $job->view_job();
if($row = $view_job->fetch(PDO::FETCH_ASSOC))
{
	extract($row);

	echo '
		<div class="row">
	        <div class="col-md-6">
	          <div class="card-header">Add a Job Vacancies
	          	<input type="text" class="form-control" placeholder="Position" aria-label="Username" id="job_id" value="'.$row['id'].'" style="display:none">
	            <input type="text" class="form-control" placeholder="Position" aria-label="Username" id="edit_position" value="'.$row['position'].'">
	          </div>
	        </div>
	        <div class="col-md-6">
	          <div class="card-header">Number of Vacancies
	            <input type="text" class="form-control" placeholder="No. of Vacancies" aria-label="Username" aria-describedby="addon-wrapping" id="edit_job_no" value="'.$row['no_of_job'].'">
	          </div>
	        </div>                                        
	    </div>
        <div class="row" style="padding-top:5px;">
	        <div class="col-md-12">Job Summary
	          <textarea class="form-control" style="width:100%;" rows="7" placeholder="Job Qualifications" id="edit_summary">'.$row['summary'].'</textarea>
	        </div>
	    <div>
	';
}

?>