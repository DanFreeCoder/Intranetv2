<?php
	class Memos{
		private $conn;
		private $table_name;

		public $type;
		public $filename;
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
			$query = "INSERT INTO " . $this->table_name . " SET type = ?, filename = ?, keywords = ?, description = ?, posted_by = ?, date_posted = ?";
			$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );

			$ins =  $this->conn->prepare($query);
			$ins->bindParam(1, $this->type);
			$ins->bindParam(2, $this->filename);
			$ins->bindParam(3, $this->keywords);
			$ins->bindParam(4, $this->description);
			$ins->bindParam(5, $this->posted_by);
			$ins->bindParam(6, $this->date_posted);

			if($ins->execute())
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