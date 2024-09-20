<?php
include '../config/clsConnectionIntranet.php';
include '../objects/clsPosts.php';

$database = new clsConnectionIntranet();
$db = $database->connect();

$post = new Posts($db);

$get = $post->view_all_post();
while($row = $get->fetch(PDO:: FETCH_ASSOC))
{
    $date = date('m/d/Y', strtotime($row['date_added']));
    if($row['status'] == 1){
        $status = '<center><p style="color: green;">ACTIVE</p></center>';
    }else{
        $status = '<center><p style="color: red;">INACTIVE</p></center>';
    }
    echo '<tr>
            <td><input type="checkbox" name="checklist" class="checklist" value="'.$row['post-id'].'"></td>
            <td>'.$row['type'].'</td>
            <td><center>'.$row['dept-name'].'</center></td>
            <td><center>'.$date.'</center></td>
            <td>'.$status.'</td>
        </tr>';
}

?>