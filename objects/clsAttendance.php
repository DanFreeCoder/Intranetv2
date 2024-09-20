<?php
class Attendance
{
   // declare connection
   private $conn;
   private $table_name = "tblattendance";
   
   public $id;
   public $empid;
   public $biometrics_id; 
   public $cutoff_id;
   public $date_attend;
   public $day_attend; 
   public $timein;
   public $timeout;
   public $sched_from;
   public $sched_to;
   public $leave_filed;
   public $overtime;
   public $lwop;
   public $remarks;
   
   // inititiate a constructor
   public function __construct($db)
   {
      $this->conn = $db; 
   }
   
   public function save_attendance()
   {
      $query = "INSERT INTO ".$this->table_name. " SET empid = ?, biometrics_id = ?,  cutoff_id = ?, date_attend = ?, day_attend = ?, timein = ?, timeout = ?, sched_from = ?, sched_to = ?, leave_filed = ?, overtime = ?, lwop = ?, remarks = ?";
	  
       $this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
	   
	   $ins = $this->conn->prepare($query);
	   $ins->bindParam(1, $this->empid);
	   $ins->bindParam(2, $this->biometrics_id);
	   $ins->bindParam(3, $this->cutoff_id);
	   $ins->bindParam(4, $this->date_attend);
	   $ins->bindParam(5, $this->day_attend);
	   $ins->bindParam(6, $this->timein);
	   $ins->bindParam(7, $this->timeout);
	   $ins->bindParam(8, $this->sched_from);
	   $ins->bindParam(9, $this->sched_to);
	   $ins->bindParam(10, $this->leave_filed);
	   $ins->bindParam(11, $this->overtime);
	   $ins->bindParam(12, $this->lwop);
	   $ins->bindParam(13, $this->remarks);
	   
	   if($ins->execute())
	   {
	       return true;
	   }
	   else
	   {
	       return false;
	   }
   }
   public function update_attendance()
   {
       $query = "UPDATE ". $this->table_name ." SET overtime = ? WHERE id = ?";
	   $this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
		
	   $upd = $this->conn->prepare($query);
	   $upd->bindParam(1, $this->overtime);
	   $upd->bindParam(2, $this->id);
	   
	    if($upd->execute())
		{
		   return true;
		}
		else
		{
		   return false;
		}
   }
   
   public function get_attendanceid()
   {
      $query = "SELECT id, cutoff_id FROM " . $this->table_name . " WHERE empid = ? AND date_attend = ?";
	  $this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
	  
	  $sel = $this->conn->prepare($query);
		
	  $sel->bindParam(1, $this->empid);
	  $sel->bindParam(2, $this->date_attend);
	  $sel->execute();
		
	  return $sel;
   }
 }

?>