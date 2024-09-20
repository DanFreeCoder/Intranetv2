<?php
	class Department
	{	
		private $conn;
		private $table_name ="departments";

		public $department;

		public function __construct($db)
		{
			$this->conn = $db;
		}

		public function view()
		{
			$query = "SELECT * FROM departments ORDER BY id ";
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

			$sel = $this->conn->prepare($query);
			$sel->execute();

			return $sel;
		}

		public function view_dept()
		{
			$query = "SELECT id as 'dept_id', department as 'dept', new_date, last_update FROM departments WHERE id != 21 ORDER BY new_date DESC";
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

			$sel = $this->conn->prepare($query);
			$sel->execute();

			return $sel;
		}

		public function view_announcement()
		{
			$query = "SELECT id as 'dept_id', department as 'dept' FROM departments WHERE id = 21";
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
			$sel = $this->conn->prepare($query);

			$sel->execute();
			return $sel;
		}

		public function view_more_dept()
		{
			$query = "SELECT id as 'deptId', department as 'dept', new_date FROM departments WHERE new_date <= ? AND id != ? ORDER BY new_date DESC LIMIT 5";
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

			$sel = $this->conn->prepare($query);
			$sel->bindParam(1, $this->new_date);
			$sel->bindParam(2, $this->id);

			$sel->execute();

			return $sel;
		}

		public function save_date()
		{
			$query = "UPDATE departments SET new_date = ?, last_update =? WHERE id = ?";
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

			$sel = $this->conn->prepare($query);
			$sel->bindParam(1, $this->new_date);
			$sel->bindParam(2, $this->last_update);
			$sel->bindParam(3, $this->id);

			$sel->execute();

			return $sel;
		}
	}
?>