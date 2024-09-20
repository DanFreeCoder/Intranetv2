<?php
 
 include 'config.php';
 
 class Category
 {
    //Instantiate of database
	private $db = null;
	private $conn = null;
	
	//declare array for values
	private $data = array();
	
	//declares variables in a database
    public $id;
	public $department;
	
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
			$this->db->selectdb($this->conn, "innopayrolldb");
		}
	 }
	 
	  //Start the methods of the objects
	 //This is query for getting blog categories
	 public function get_department()
	 {	
	    //query
		$id = 0;
		
		$query = "SELECT id, Department FROM tbldepartment where id != ? ORDER by id";
		
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
	 
 } 
?>