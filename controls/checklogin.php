<?php

  include "objects/clsUsers.php";
  include "config/clsConnection.php";
  
  $database = new clsConnection();
  $db =  $database->connect();
  
  $user = new Users($db);
  
  $online = $user->isloggedin();
  
  if(!$online)
  {
    header('Location: login.php');
  }
  
?>