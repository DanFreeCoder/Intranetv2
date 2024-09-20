<?php
	class SliderCategories{

		private $conn;
		private $table_name = "slider_categories";

		public $id;
		public $name;
		public $status;

		public function __construct($db)
		{
			$this->conn = $db;
		}

		public function save()
		{
			$query = "INSERT INTO " . $this->table_name . " SET name = ?, status = ?";
			$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );

			$ins = $this->conn->prepare($query);
			$ins->bindParam(1, $this->name);
			$ins->bindParam(2, $this->status);

			if($ins->execute())
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		public function update()
		{
			$query = "UPDATE " .$this->table_name. " SET name = ?, status = ? WHERE id = ?";
			$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );

			$upd = $this->conn->prepare($query);
			$upd->bindParam(1, $this->name);
			$upd->bindParam(2, $this->status);
			$upd->bindParam(3, $this->id);


			if($upd->execute())
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		public function view()
		{
			$query = "SELECT id, name FROM " . $this->table_name;
			$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );

			$sel = $this->conn->prepare($query);

			$sel->execute();

			return $sel;
		}	

		public function getfirst()
		{
			$query = "SELECT id, name FROM " . $this->table_name . " WHERE id = ?";
			$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );

			$sel = $this->conn->prepare($query);
			$sel->bindParam(1, $this->id);

			$sel->execute();

			return $sel;
		}

	}

?>