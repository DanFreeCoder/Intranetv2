<?php
 session_start();

 $id = $_SESSION['empid'];
 //$id = 85;

 $code = $_POST['a'];

 //call the connections and the objects here...by Arnie 
 include "../objects/clsEmployee.php";
 include "../config/clsConnection.php";
 include "../objects/clsUsers.php";

 $database = new clsConnection();
 $db = $database->connect();

 $users = new Users($db);
 $users->empid = $id;

 $view_user = $users->verify_security();


 while($row = $view_user->fetch(PDO::FETCH_ASSOC))
 {
    $dbcode = $row['security_a'];
    if($code == $dbcode)
    {
    	echo 1;
    }
    else
    {
    	echo 0;
    }

 } 	
 

?>