<?php
class Users
{
	private $conn;
	private $table_name = "users";

	public $empid;
	public $firstname;
	public $lastname;
	public $birthday;
	public $username;
	public $password;
	public $access_type_id;
	public $log_count;
	public $security_q;
	public $security_a;
	public $verification_code;

	public function __construct($db)
	{
		$this->conn = $db;
	}

	public function save_users()
	{
		$query = "INSERT INTO " . $this->table_name . " SET firstname = ?, lastname = ?, email = ?, username = ?, password = ?, access_type_id = ?, log_count = ?, verification_code = ?, security_q = ?, security_a = ?, status=?";
		$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
		$ins = $this->conn->prepare($query);

		$ins->bindParam(1, $this->firstname);
		$ins->bindParam(2, $this->lastname);
		$ins->bindParam(3, $this->email);
		$ins->bindParam(4, $this->username);
		$ins->bindParam(5, $this->password);
		$ins->bindParam(6, $this->access_type_id);
		$ins->bindParam(7, $this->log_count);
		$ins->bindParam(8, $this->verification_code);
		$ins->bindParam(9, $this->security_q);
		$ins->bindParam(10, $this->security_a);
		$ins->bindParam(11, $this->status);

		if ($ins->execute()) {
			return true;
		} else {
			return false;
		}
	}

	public function update_users()
	{
		$query = "UPDATE " . $this->table_name . " SET firstname=?, lastname=?, email=?, username=?, access_type_id=? WHERE id=?";
		$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
		$upd = $this->conn->prepare($query);

		$upd->bindParam(1, $this->firstname);
		$upd->bindParam(2, $this->lastname);
		$upd->bindParam(3, $this->email);
		$upd->bindParam(4, $this->username);
		$upd->bindParam(5, $this->access_type_id);
		$upd->bindParam(6, $this->id);

		if ($upd->execute()) {
			return true;
		} else {
			return false;
		}
	}
	public function update_account_changes()
	{
		$query = "UPDATE " . $this->table_name . " SET password=?, security_q=?, security_a=?, log_count = log_count + 1 WHERE empid=?";

		$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
		$upd = $this->conn->prepare($query);

		$upd->bindParam(1, $this->password);
		$upd->bindParam(2, $this->security_q);
		$upd->bindParam(3, $this->security_a);
		$upd->bindParam(4, $this->empid);

		if ($upd->execute()) {
			return true;
		} else {
			return false;
		}
	}

	public function update_account()
	{
		$query = "UPDATE " . $this->table_name . " SET password=? WHERE empid=?";

		$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
		$upd = $this->conn->prepare($query);

		$upd->bindParam(1, $this->password);
		$upd->bindParam(2, $this->id);

		if ($upd->execute()) {
			return true;
		} else {
			return false;
		}
	}

	public function update_password()
	{
		$query = "UPDATE " . $this->table_name . " SET password=?, log_count = log_count + 1 WHERE id=?";

		$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
		$upd = $this->conn->prepare($query);

		$upd->bindParam(1, $this->password);
		$upd->bindParam(2, $this->id);

		if ($upd->execute()) {
			return true;
		} else {
			return false;
		}
	}

	public function upd_later()
	{
		$query = "UPDATE " . $this->table_name . " SET log_count = log_count + 1 WHERE id=?";
		$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
		$upd = $this->conn->prepare($query);

		$upd->bindParam(1, $this->id);

		if ($upd->execute()) {
			return true;
		} else {
			return false;
		}
	}

	public function login()
	{
		$query = "SELECT id, username, CONCAT(firstname, ' ', lastname) as 'fullname', access_type_id, log_count FROM users WHERE username = ? AND password = ? AND status != 0";
		$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
		$sel = $this->conn->prepare($query);

		$sel->bindParam(1, $this->username);
		$sel->bindParam(2, $this->password);

		$sel->execute();
		return $sel;
	}

	public function logout()
	{
		session_start();
		if (session_destroy()) {
			return true;
			unset($_SESSION['username']);
		} else {
			return false;
		}
	}

	public function isloggedin()
	{
		session_start();
		if (isset($_SESSION['username'])) {
			return true;
		}
	}

	public function view_account_settings()
	{
		$query = "SELECT tblemployeepersonal.Firstname as 'firstname', tblemployeepersonal.Lastname as 'lastname', tblemployeepersonal.emailadd as 'emailadd', tblusers.username as 'username', tblusers.empid as 'empid', tblusers.password as 'password' FROM tblemployeepersonal, tblusers WHERE empid=? AND tblemployeepersonal.id = tblusers.empid";
		$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
		$sel = $this->conn->prepare($query);
		$sel->bindParam(1, $this->empid);

		$sel->execute();

		return $sel;
	}

	public function update_code()
	{
		$query = "UPDATE " . $this->table_name . " SET verification_code=? WHERE empid=?";
		$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
		$upd = $this->conn->prepare($query);

		$upd->bindParam(1, $this->verification_code);
		$upd->bindParam(2, $this->empid);


		if ($upd->execute()) {
			return true;
		} else {
			return false;
		}
	}
	public function verify_code()
	{
		$query = "SELECT verification_code FROM " . $this->table_name . " WHERE empid = ?";

		$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
		$sel = $this->conn->prepare($query);

		$sel->bindParam(1, $this->empid);
		$sel->execute();

		return $sel;
	}
	public function verify_security()
	{
		$query = "SELECT security_a FROM " . $this->table_name . " WHERE empid = ?";

		$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
		$sel = $this->conn->prepare($query);

		$sel->bindParam(1, $this->empid);
		$sel->execute();

		return $sel;
	}

	public function view_users()
	{
		$query = "SELECT id, firstname, lastname, username, access_type_id  FROM users WHERE status != 0 ORDER by access_type_id ASC";
		$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
		$sel = $this->conn->prepare($query);
		$sel->execute();

		return $sel;
	}

	public function view_user_byID()
	{
		$query = "SELECT * FROM users WHERE id = ?";
		$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

		$sel = $this->conn->prepare($query);
		$sel->bindParam(1, $this->id);
		$sel->execute();

		return $sel;
	}

	public function delete_user()
	{
		$query = "UPDATE " . $this->table_name . " SET status = '0' WHERE id = ?";
		$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

		$del = $this->conn->prepare($query);
		$del->bindParam(1, $this->id);

		if ($del->execute()) {
			return true;
		} else {
			return false;
		}
	}

	public function check_if_exist()
	{
		$query = "SELECT COUNT(id) as 'count' FROM users WHERE (firstname = ? AND lastname = ?) OR empid = ?";
		$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

		$check = $this->conn->prepare($query);
		$check->bindParam(1, $this->firstname);
		$check->bindParam(2, $this->lastname);
		$check->bindParam(3, $this->empid);

		$check->execute();
		return $check;
	}

	public function get_next_id()
	{
		$query = "SELECT max(id) + 1 as 'intranet_id' from users";
		$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

		$sel = $this->conn->prepare($query);
		$sel->execute();

		return $sel;
	}

	public function get_next_empID()
	{
		$query = "SELECT max(empid) + 1 as 'employee_id' from users";
		$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

		$sel = $this->conn->prepare($query);
		$sel->execute();

		return $sel;
	}

	public function count_visitors()
	{
		$query = "SELECT COUNT(days) as 'day', COUNT(weeks) as 'week', COUNT(months) as 'month', COUNT(years) as 'year', COUNT(cur_year) as 'curyear' FROM counter WHERE cur_year=?";
		$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
		$count = $this->conn->prepare($query);

		$count->bindParam(1, $this->cur_year);

		$count->execute();
		return $count;
	}

	public function addyear()
	{
		$query = "INSERT INTO counter SET days=?, weeks=?, months=?, years=?, day_name=?, cur_year=?";
		$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
		$ins = $this->conn->prepare($query);

		$ins->bindParam(1, $this->days);
		$ins->bindParam(2, $this->weeks);
		$ins->bindParam(3, $this->months);
		$ins->bindParam(4, $this->years);
		$ins->bindParam(5, $this->day_name);
		$ins->bindParam(6, $this->cur_year);



		if ($ins->execute()) {
			return true;
		} else {
			return false;
		}
	}

	public function setval()
	{
		$query = "UPDATE counter SET days=?, weeks=?, months=?, years=?, day_name=? WHERE cur_year=?";
		$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
		$set = $this->conn->prepare($query);

		$set->bindParam(1, $this->days);
		$set->bindParam(2, $this->weeks);
		$set->bindParam(3, $this->months);
		$set->bindParam(4, $this->years);
		$set->bindParam(5, $this->day_name);
		$set->bindParam(6, $this->cur_year);

		if ($set->execute()) {
			return true;
		} else {
			return false;
		}
	}

	public function view_visitors()
	{
		$query = "SELECT * FROM counter WHERE cur_year=?";
		$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
		$sel = $this->conn->prepare($query);

		$sel->bindParam(1, $this->cur_year);

		$sel->execute();
		return $sel;
	}
}
