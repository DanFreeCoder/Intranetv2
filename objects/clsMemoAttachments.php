<?php
	class clsMemoAttachments
	{
		private $conn;
		private $table_name = "memo_attachments";

		public $id;
		public $memos_id;
		public $path;
		public $file_name;

		public function __construct($db)
		{
			$this->conn = $db;
		}

		public function save()
		{
			$query = "INSERT INTO " . $this->table_name . " SET memos_id = ?, path = ?, file_name = ?";
			$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );

			$ins = $this->conn->prepare($query);
			
			$ins->bindParam(1, $this->memos_id);
			$ins->bindParam(2, $this->path);
			$ins->bindParam(3, $this->file_name);

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