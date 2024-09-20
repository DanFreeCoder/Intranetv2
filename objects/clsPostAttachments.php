<?php
	class PostAttachments{
		private $db;
		private $table_name = "post_attachments";

		public $attach_id;
		public $image_path;
		public $file_name;

		public function __construct($db)
		{
			$this->conn = $db;
		}	

		public function save()
		{
			$query = "INSERT INTO " . $this->table_name . " SET attach_id = ?, image_path = ?, file_name = ?";
			$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );

			$ins = $this->conn->prepare($query);
			$ins->bindParam(1, $this->attach_id);
			$ins->bindParam(2, $this->image_path);
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

		public function update()
		{
			$query = "UPDATE " . $this->table_name . " SET image_path = ?, file_name = ? WHERE attach_id = ?";
			$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
			$upd = $this->conn->prepare($query);

			$upd->bindParam(1, $this->image_path);
			$upd->bindParam(2, $this->file_name);
			$upd->bindParam(3, $this->attach_id);

			if($upd->execute())
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		public function display_attach()
		{
			$query = "SELECT attach_id, image_path, file_name FROM post_attachments WHERE attach_id = ?";
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

			$sel = $this->conn->prepare($query);
			$sel->bindParam(1, $this->attach_id);

			$sel->execute();

			return $sel;
		}
	}
?>