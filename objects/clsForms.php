<?php
	class Forms{
		private $conn;
		private $table_name = "Forms";

		public $id;
		public $type;
		public $code;
		public $keywords;
		public $description;
		public $posted_by;
		public $date_posted;

		public function __construct($db)
		{
			$this->conn = $db;
		}

		public function save()
		{
			$query = "INSERT INTO " . $this->table_name . " SET type = ?, code = ?, keywords = ?, description = ?, posted_by = ?, date_posted = ?";
			$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );

			$ins = $this->conn->prepare($query);
			$ins->bindParam(1, $this->type);
			$ins->bindParam(2, $this->code);
			$ins->bindParam(3, $this->keywords);
			$ins->bindParam(4, $this->description);
			$ins->bindParam(5, $this->posted_by);
			$ins->bindParam(6, $this->date_posted);

			if($ins->execute())
			{
				echo 1;
			}
			else
			{
				echo 0;
			}
		}
	}
?>