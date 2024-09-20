<?php
session_start();	
include '../config/clsConnectionIntranet.php';
include '../objects/clsPosts.php';
include '../objects/clsDepartment.php';

$database = new clsConnectionIntranet();
$db = $database->connect();

$post = new Posts($db);
$dept = new Department($db);

    $post->id = $_POST['id'];
    $post->type = $_POST['title'];
    $post->department = $_POST['department'];
    $post->details = $_POST['details'];
    $post->date_added = date("Y-m-d H:i");
    $post->posted_by = $_SESSION['user-id'];
    $post->status = 1;

    $upd_post = $post->update_post();

    if($upd_post)
    {
        echo 1;
    }
    else
    {
        echo 0;
    }
?>