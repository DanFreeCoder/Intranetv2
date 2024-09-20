<?php
include_once "../config/clsConnection.php";
include_once "../objects/clsUsers.php";

$database = new clsConnection();
$db = $database->connect();

$user = new Users($db);
if ($user->logout()) {
  header('Location: ../index.php');
}
