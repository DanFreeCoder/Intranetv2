<?php
include '../config/clsConnectionIntranet.php';
include "../objects/clsUsers.php";

$database = new clsConnectionIntranet();
$db = $database->connect();
$visit = new Users($db);

$visit->cur_year = date('Y');
$sel = $visit->view_visitors();
while($row = $sel->fetch(PDO::FETCH_ASSOC))
{
    $day = $row['days'];
    $week = $row['weeks'];
    $month = $row['months'];
    $year = $row['years'];


     if(!$day && !$week && !$month && !$year)
    {
        json_encode(0);
    }else{
        $array = array($day, $week, $month, $year);
        echo json_encode($array);
    }
}
   