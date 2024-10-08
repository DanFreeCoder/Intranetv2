<?php
	class PostsCategories{

		private $conn;
		private $table_name = "post_categories";

		public $id;
		public $name;

		public function __construct($db)
		{
			$this->conn = $db;
		}

		public function save()
		{
			$query = "INSERT INTO " . $this->table_name . " SET name = ?";
			$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );

			$ins = $this->conn->prepare($query);
			$ins->bindParam(1, $this->name);

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