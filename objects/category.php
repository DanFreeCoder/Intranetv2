<?php
  //this is a class for blog category
  //Note: in oop include will not run inside the class, it should be declared outside the class
  include_once 'config.php';
  
  class Category
  {
     //declaration of variable for database connection
     private $db = null; // database
     private $conn = null; // connection to database
	 
	 //declare array to handle data
	 private $data = array();
	 
	 //declare variables that was in the database
	 public $id;
	 public $name;
	 public $dateadded;
     
	 //Note: opening a connection must be inside the constructor function, cause it will cause a parse error when called outside the function
	 public function __construct()
	 {
		if(!isset($_SESSION['LOGIN_STATUS']))
		{
		    header('../login.php');
		}
		else
		{
		    //Opens a connection
		    $this->db = new Database();
			$this->conn = $this->db->connect();
			$this->db->selectdb($this->conn, "itranetdb");
		}
	 }
	 
	 
	 
	 //Start the methods of the objects
	 //This is query for getting blog categories
	 public function get_blog_categories()
	 {	
	    //query
		$id = 0;
		
		$query = "SELECT id, name FROM blog_category where id != ? ORDER by id";
		
	    if($stmt = $this->conn->prepare($query))
		{
		   $stmt->bind_param('s', 0);
		   
		   $stmt->execute();
		 
		   //*bind the result/
		   $stmt->bind_result($id, $name);
		   
		   //*fetch the values/
		   while($stmt->fetch())
		   {
		      array_push($data, $id, $name);
		   }
		}
	 } 
	 
  }//*end of the class category
   

?>
	 
	 
	 
	 
	 