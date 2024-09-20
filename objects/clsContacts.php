<?php
class Contacts
{
    // declare connection
   private $conn;
   private $table_name = "locals";
   
   public $id;
   public $local_no;
   public $name;
   public $department;
   public $trunkline;
   
   // inititiate a constructor
   public function __construct($db)
   {
      $this->conn = $db; 
   }

   public function save_local()
   {
      $query = 'INSERT INTO '.$this->table_name.' SET local_no=?, name=?, department=?, trunkline=?, status = 1';
      $this->conn->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_WARNING);
      $add = $this->conn->prepare($query);

      $add->bindParam(1, $this->local_no);
      $add->bindParam(2, $this->name);
      $add->bindParam(3, $this->department);
      $add->bindParam(4, $this->trunkline);

      if($add->execute())
      {
         return true;
      }
      else
      {
         return false;
      }
   }

   public function update_local()
   {
      $query = 'UPDATE '.$this->table_name.' SET local_no=?, name=?, department=?, trunkline=? WHERE id=?';
      $this->conn->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_WARNING);
      $upd = $this->conn->prepare($query);

      $upd->bindParam(1, $this->local_no);
      $upd->bindParam(2, $this->name);
      $upd->bindParam(3, $this->department);
      $upd->bindParam(4, $this->trunkline);
      $upd->bindParam(5, $this->id);

      if($upd->execute())
      {
         return true;
      }
      else
      {
         return false;
      }
   }

   public function remove_local()
   {
      $query = 'UPDATE '.$this->table_name.' SET status=0 WHERE id=?';
      $this->conn->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_WARNING);
      $upd = $this->conn->prepare($query);

      $upd->bindParam(1, $this->id);

      if($upd->execute())
      {
         return true;
      }
      else
      {
         return false;
      }
   }

   public function getcebulocals()
   {
      $query = "SELECT id, local_no, name, department, status FROM " . $this->table_name . " WHERE trunkline = 1 AND status != 0";
	   $this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
	  
	   $sel = $this->conn->prepare($query);
	   $sel->execute();
		
	   return $sel;
   }

    public function getmanilalocals()
   {
      $query = "SELECT id, local_no, name, department, status FROM " . $this->table_name . " WHERE trunkline = 2 AND status != 0";
	   $this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
	  
	   $sel = $this->conn->prepare($query);
	   $sel->execute();
		
	   return $sel;
   }

   public function view_local_details()
   {
      $query = "SELECT id, local_no, name, department, trunkline, status FROM " . $this->table_name . " WHERE id=?";
	   $this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );	  
	   $sel = $this->conn->prepare($query);

      $sel->bindParam(1, $this->id);

	   $sel->execute();
		
	  return $sel;
   }
}
?>