<?php
include '../config/clsConnectionIntranet.php';
include '../objects/clsContacts.php';

$database = new clsConnectionIntranet();
$db = $database->connect();

$contacts = new Contacts($db);

$contacts->id = IMPLODE(',',$_POST['num_id']);;

$upd = $contacts->remove_local();
    if($upd)
    {
        echo 1;
    }
    else
    {
        echo 0;
    }
?>