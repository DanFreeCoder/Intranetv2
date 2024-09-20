<?php
	class Jobs{

		private $conn;
		private $table_name = "job_vacancies";

		public $id;
		public $position;
		public $no_of_job;
		public $qualification;
		public $status;

		public function __construct($db)
		{
			$this->conn = $db;
		}

		public function save_job()
		{
			$query = "INSERT INTO ".$this->table_name." SET position=?, no_of_job=?, summary=?, status=?";
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

			$ins = $this->conn->prepare($query);
			$ins->bindParam(1, $this->position);
			$ins->bindParam(2, $this->no_of_job);
			//$ins->bindParam(3, $this->qualification);
			$ins->bindParam(3, $this->summary);
			$ins->bindParam(4, $this->status);

			if($ins->execute())
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		public function update_job()
		{
			$query = "UPDATE ".$this->table_name." SET position=?, no_of_job=?,summary=? WHERE id=?";
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

			$upd = $this->conn->prepare($query);
			$upd->bindParam(1, $this->position);
			$upd->bindParam(2, $this->no_of_job);
			//$upd->bindParam(3, $this->qualification);
			$upd->bindParam(3, $this->summary);
			$upd->bindParam(4, $this->id);

			if($upd->execute())
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		public function delete_job()
		{
			$query = "UPDATE ".$this->table_name." SET status=? WHERE id =?";
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

			$del = $this->conn->prepare($query);
			$del->bindParam(1, $this->status);
			$del->bindParam(2, $this->id);

			if($del->execute())
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		public function view_job()
		{
			$query = "SELECT * FROM ".$this->table_name." WHERE status != 0 ORDER BY id DESC";
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

			$view = $this->conn->prepare($query);
			$view->execute();

			return $view;
		}
	}
?>