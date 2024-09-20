<?php
include "../config/clsConnectionIntranet.php";
include "../objects/clsJobVacancies.php";

$database = new clsConnectionIntranet();
$db = $database->connect();

$job = new Jobs($db);

$view = $job->view_job();
while($row = $view->fetch(PDO::FETCH_ASSOC))
{
  	extract($row);
  	echo '
          <div class="col-sm-3">'.$row['position'].'</div>
          <div class="col-sm-1"><center>'.$row['no_of_job'].'</center></div>
          <div class="col-sm-6">
            <div class="text-container">
                <div class="content hideContent">'.nl2br($row['summary']).'</div>
                <div class="show-more">
                  <a id="show_job" href="#">Show more</a>
                </div><br>
            </div>
          </div>
          <div class="col-sm-2">
            <center><a href="#" value='.$row['id'].' id="edit_job">Edit</a> <b>|</b><a href="#" value='.$row['id'].' id="remove_job"> Remove</a></center>
          </div>
	';
}
?>