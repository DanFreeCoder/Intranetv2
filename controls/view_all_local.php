<?php
include '../config/clsConnectionIntranet.php';
include '../objects/clsContacts.php';

$database = new clsConnectionIntranet();
$db = $database->connect();

$contacts = new Contacts($db);

if($_POST['trunkline'] == 1)
{
    $view = $contacts->getcebulocals();
    while($row = $view->fetch(PDO::FETCH_ASSOC))
    {
        if($row['status'] == 1){
        $status = '<center><p style="color: green">ACTIVE</p></center>';
        }else{
        $status = '<center><p style="color: red">INACTIVE</p></center>';
        }
        echo '
        <tr>
        <td><input type="checkbox" name="checklist" class="checklist" value="'.$row['id'].'"></td>
        <td>'.$row['local_no'].'</td>
        <td>'.$row['name'].'</td>
        <td><center>'.$row['department'].'</center></td>
        <td><center>'.$status.'</center></td>
        </tr>';
    }
}
else
{
    $view = $contacts->getmanilalocals();
    while($row = $view->fetch(PDO::FETCH_ASSOC))
    {
        if($row['status'] == 1){
        $status = '<center><p style="color: green">ACTIVE</p></center>';
        }else{
        $status = '<center><p style="color: red">INACTIVE</p></center>';
        }
        echo '
        <tr>
        <td><input type="checkbox" name="checklist" class="checklist" value="'.$row['id'].'"></td>
        <td>'.$row['local_no'].'</td>
        <td>'.$row['name'].'</td>
        <td><center>'.$row['department'].'</center></td>
        <td><center>'.$status.'</center></td>
        </tr>';
    }
}
?>