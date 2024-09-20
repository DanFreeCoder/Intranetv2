<?php
session_start();

 if(isset($_SESSION['access_type_id']))
 {
     $access_type = $_SESSION['access_type_id'];
     $count = $_SESSION['logcount'];
    
      if($access_type == 1)
      {
        header('Location: ../admin.php');
      }
      elseif($access_type == 2)
      {
        header('Location: ../hr.php');
      }
      else
      {
        header('Location: ../user.php');
      }
  }
?>