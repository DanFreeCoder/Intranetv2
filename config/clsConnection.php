<?php
class clsConnection
{
   private $host = "192.168.2.2";
   private $dbname = "timesheetsdb";
   private $username = "admin";
   private $password = "admin";
   
   private $conn;
   
   public function connect()
   { 
	  $this->conn = null; //initialize
	  
	  try
	  {
         $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" .$this->dbname, $this->username, $this->password); //open a conection
	  }
	  catch(PDOException $exception)
	  {
	     echo "Connection error: ". $exception->getMessage();   // Get errors;
	  }
	  
	  return $this->conn;
   }
   
}
?>