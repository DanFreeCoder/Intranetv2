<?php
  class Employee
  {
     private $conn;
	 private $table_name = "tblemployeepersonal";
	 
	 public $id;
	 public $Current_Position;
	 public $date_hired;
	 public $Firstname;
	 public $Lastname;
	 public $Middlename;
	 public $Nickname;
	 public $gender;
	 public $Current_Address;
	 public $czipcode;
	 public $Permanent_Address;
	 public $pzipcode;
	 public $Municipality;
	 public $Province;
	 public $Birthdate;
	 public $Birthplace;
	 public $civilstatus;
	 public $religion;
	 public $citizenship;
	 public $hometelno;
	 public $cellno;
	 public $emailadd;
	 public $hobbies_talents;
	 public $height_in_ft;
	 public $weight_in_lbs;
	 public $blood_type;
	 public $allergies;
	 public $sssno;
	 public $ssstat;
	 public $tin;
	 public $tinstat;
	 public $philhealthno;
	 public $philhealthstat;
	 public $pagibigstat;
	 public $pagibigno;
	 public $company_id;
	 public $department_id;
	 public $biometric_id;
	 public $employee_type;
	 public $added_by;
	 public $date_added;
	 public $status;
	 
 	 /*	 
	 public $Current_Position = "IR Consultant";
	 public $date_hired = "2015-01-01";
	 public $Firstname = "IN SIDE CODE";
	 public $Lastname = "TEST";
	 public $Middlename = "TEST";
	 public $Nickname = "Arnie";
	 public $gender = "Male";
	 public $Current_Address = "Cebu";
	 public $czipcode= "6000";
	 public $Permanent_Address= "Cebu";
	 public $pzipcode = "6000";
	 public $Municipality = "Cebu";
	 public $Province = "Cebu";
	 public $Birthdate = "1991-11-29";
	 public $Birthplace = "Manila";
	 public $civilstatus = "Single";
	 public $religion = "Roman Catholic";
	 public $citizenship = "Filipino";
	 public $hometelno = "0000";
	 public $cellno = "00000";
	 public $emailadd = "tes@innogroup.com.ph";
	 public $hobbies_talents = "singing";
	 public $height_in_ft = "1.0";
	 public $weight_in_lbs = "1.0";
	 public $blood_type = "B+";
	 public $allergies = "none";
	 public $sssno = "011110";
	 public $ssstat = 1;
	 public $tin= "011110";
	 public $tinstat = 1;
	 public $philhealthno = "011110";
	 public $philhealthstat = 1;
	 public $pagibigstat = 1;
	 public $pagibigno= "011110";
	 public $company_id = "0085";
	 public $department_id;
	 public $biometric_id;
	 public $employee_type;
	 public $added_by;
	 public $date_added;
	 public $status;
	*/
	 
	 
	 public function __construct($db)
	 {
	    $this->conn = $db;
	 }
	 
	 public function save_employee()
	 { 
	    
		$query = "INSERT INTO ". $this->table_name . " SET intranet_id = ?, Firstname = ?, Lastname = ?, Birthdate = ?, company_id = ?";

		$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
		$ins = $this->conn->prepare($query);

		$ins->bindParam(1, $this->intranet_id);
		$ins->bindParam(2, $this->Firstname);
		$ins->bindParam(3, $this->Lastname);
		$ins->bindParam(4, $this->Birthdate);
		$ins->bindParam(5, $this->company_id);
		
		if($ins->execute())
		{
		    return true;		
		}
		else 
		{
		    return false;
		}
	 }
	 
	 public function display_next_id()
	 {
	    $query = "SELECT max(id) as 'id' FROM tblemployeepersonal"; 
		$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
		
		$sel = $this->conn->prepare($query);
		$sel->execute();
		
		return $sel;
	 }
	 
	 public function display_employee()
	 {
	    $query = "SELECT tblemployeepersonal.id, tblemployeepersonal.Firstname, tblemployeepersonal.Lastname, tblemployeepersonal.biometric_id, tblemployeepersonal.status, tbldepartment.department, tblcompany.name FROM tblemployeepersonal, tbldepartment, tblcompany WHERE tblemployeepersonal.department_id = tbldepartment.id and tblemployeepersonal.company_id = tblcompany.id and tblemployeepersonal.status != 0 ORDER by tblemployeepersonal.id";
		$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
		
		$sel = $this->conn->prepare($query);
		$sel->execute();
		
		return $sel;
	 }
	 
	  public function display_employee_for_balances()
	 {
	    $query = "SELECT tblemployeepersonal.id, tblemployeepersonal.Firstname, tblemployeepersonal.Lastname, tblemployeepersonal.biometric_id, tblemployeepersonal.status FROM tblemployeepersonal, tblleave_balances WHERE tblemployeepersonal.id not in (SELECT empid FROM tblleave_balances) GROUP BY tblemployeepersonal.id";
		$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
		
		$sel = $this->conn->prepare($query);
		$sel->execute();
		
		return $sel;
	 }
	 
	 public function view_employee()
	 {
	    $query = "SELECT id, Current_Position, date_hired, Firstname, Lastname, Middlename, gender, Current_Address, czipcode, Permanent_Address, pzipcode, Municipality, Province, Birthdate, Birthplace, civilstatus, religion, citizenship, hometelno, cellno, emailadd, hobbies_talents, height_in_ft, weight_in_lbs, blood_type, allergies, sssno, tin, philhealthno, pagibigno, company_id, department_id, biometric_id, employee_type, added_by, date_added, status FROM tblemployeepersonal WHERE id = ?";
		
		$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
		$sel = $this->conn->prepare($query);
		
		$sel->bindParam(1, $this->id);
		$sel->execute();
		
		return $sel;
	 }
     public function view_account()
     {
     	$query = "SELECT tblemployeepersonal.Firstname as 'firstname', tblemployeepersonal.Lastname as 'lastname', tblemployeepersonal.emailadd as 'email', tblusers.username as 'username', tblusers.password as 'password' FROM tblemployeepersonal, tblusers WHERE tblemployeepersonal.id = tblusers.empid AND tblemployeepersonal.id = ?";
     	$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
		$sel = $this->conn->prepare($query);
		
		$sel->bindParam(1, $this->id);
		$sel->execute();
		
		return $sel;
     }

	 //Update status to Remove
	 public function delete_employee()
	 {
	    $query = "UPDATE ". $this->table_name ." SET status = '0' WHERE intranet_id = ?";
		$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
		
		$upd = $this->conn->prepare($query);
		$upd->bindParam(1, $this->intranet_id);
		
		if($upd->execute())
		{
		   return true;
		}
		else
		{
		   return false;
		}
		
	 }

	 public function verify_email_if_exist()
	 {
	 	$query = "SELECT id FROM ". $this->table_name . " WHERE emailadd = ?";

	 	$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
	 	$sel = $this->conn->prepare($query);

	 	$sel->bindParam(1, $this->emailadd);
		$sel->execute();
		
		return $sel;
	 }
	 
	 public function update_employee()
	 {
		$query = "UPDATE ". $this->table_name ." SET Firstname = ?, Lastname = ?, Birthdate = ?, company_id = ? WHERE intranet_id = ?";	
			
		$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
		
		$upd = $this->conn->prepare($query);
		$upd->bindParam(1, $this->Firstname);
		$upd->bindParam(2, $this->Lastname);
		$upd->bindParam(3, $this->Birthdate);
		$upd->bindParam(4, $this->company_id);
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
  }
?>