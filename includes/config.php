<?php
 
 class Database
 {
     private $host = '192.168.2.2';
	 private $user = 'admin';
	 private $pass = 'admin';
	 
	 private $conn = null;
	
	 public function __construct()
	 {
	    $this->conn = mysqli_connect($this->host, $this->user, $this->pass) or die(mysqli_error()); //initiate a connection
	 }
	 
	 public function connect()
	 {
	    return $this->conn; 
	 }
	 
	 public function selectdb($conn, $database)
	 {
	     mysqli_select_db($conn, $database);
	 }
	 
 }
 
?>