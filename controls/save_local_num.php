<?php
include '../config/clsConnectionIntranet.php';
include '../objects/clsContacts.php';

$database = new clsConnectionIntranet();
$db = $database->connect();

$contacts = new Contacts($db);

$contacts->local_no = $_POST['local'];
$contacts->name = $_POST['name'];
$contacts->department = $_POST['dept'];
$contacts->trunkline = $_POST['trunkline'];

$add = $contacts->save_local();
    if($add)
    {
        echo 1;
    }
    else
    {
        echo 0;
    }
?>