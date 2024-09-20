<?php
	class Web_App{

		private $conn;
		private $table_name = "web_apps";

		public $id;
		public $logo;
		public $link;
		public $dateadd;
		public $addby;

		public function __construct($db)
		{
			$this->conn = $db;
		}

		public function save()
		{
			$query = "INSERT INTO " . $this->table_name . " SET logo = ?, link = ?, date_added = ?, added_by = ?";
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

			$ins = $this->conn->prepare($query);
			$ins->bindParam(1, $this->logo);
			$ins->bindParam(2, $this->link);
			$ins->bindParam(3, $this->dateadd);
			$ins->bindParam(4, $this->addby);

			if($ins->execute())
			{
				return true;
			}
			else
			{
				return false;`
			}
		}
	}