<?php
  class Users1
  {
	  private $conn;
	  private $table_name="tblusers";
	  
	  public $empid;
	  public $username;
	  public $password;
	  public $access_type_id;
	  public $status;
	  
	  public function __construct($db)
	  {
		 $this->conn = $db;
	  }
	  
	  public function save_user1()
	  {
		 $query = "INSERT INTO ". $this->table_name . " SET empid = ?, username = ?, password = ?, access_type_id = ?, log_count =?, status=?, intranet_id=?";
		 
		 $ins = $this->conn->prepare($query);
		 
		 $ins->bindParam(1, $this->empid);
		 $ins->bindParam(2, $this->username);
		 $ins->bindParam(3, $this->password);
		 $ins->bindParam(4, $this->access_type_id);
		 $ins->bindParam(5, $this->log_count);
		 $ins->bindParam(6, $this->status);
		 $ins->bindParam(7, $this->intranet_id);
		 
		 if($ins->execute())
		 {
			return true;
		 }
		 else
		 {
			return false;
		 }
	  }
	  
	  public function update_user1()
	  {
	     $query = "UPDATE " . $this->table_name . " SET empid=?, username=?, password=?, access_type_id=? WHERE intranet_id=?";
		
		 $this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
		 $upd = $this->conn->prepare($query);
	  
	  	 $upd->bindParam(1, $this->empid);
	     $upd->bindParam(2, $this->username);
		 $upd->bindParam(3, $this->password);
		 $upd->bindParam(4, $this->access_type_id);
		 $upd->bindParam(5, $this->intranet_id);
		 
		 if($upd->execute())
		 {
		    return true;
		 }
		 else
		 {
		    return false;
		 }
	  }

	  public function delete_user1()
	  {
	  	$query = "UPDATE ". $this->table_name." SET status = '0' WHERE intranet_id = ?";
	  	$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

	  	$del = $this->conn->prepare($query);
	  	$del->bindParam(1, $this->intranet_id);

	  	if($del->execute())
	  	{
	  		return true;
	  	}
	  	else
	  	{
	  		return false;
	  	}
	  }
  }
  
?>