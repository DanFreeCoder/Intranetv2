<?php
include '../config/clsConnectionIntranet.php';
include '../objects/clsContacts.php';

$database = new clsConnectionIntranet();
$db = $database->connect();

$contacts = new Contacts($db);

$contacts->id = $_POST['id'];
$contacts->local_no = $_POST['num'];
$contacts->name = $_POST['name'];
$contacts->department = $_POST['dept'];
$contacts->trunkline = $_POST['trunkline'];

$upd = $contacts->update_local();
    if($upd)
    {
        echo 1;
    }
    else
    {
        echo 0;
    }
?>