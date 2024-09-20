<?php
	class Sliders{
		private $conn;
		private $table_name = "sliders";

		public $id;
		public $title;
		public $feature_image_path;
		public $feature_image_title;
		public $added_by;
		public $date_created;
		public $status;

		public function __construct($db)
		{
			$this->conn = $db;
		}

		public function save()
		{
			$query = "INSERT INTO " . $this->table_name . " SET title = ?, feature_image_title = ?, feature_image_path = ?, added_by = ?, date_created = ?, status = ?";
			$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );

			$ins = $this->conn->prepare($query);

			$ins->bindParam(1, $this->title);
			$ins->bindParam(2, $this->feature_image_title);
			$ins->bindParam(3, $this->feature_image_path);
			$ins->bindParam(4, $this->added_by);
			$ins->bindParam(5, $this->date_created);
			$ins->bindParam(6, $this->status);

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
			$query = "UPDATE " .$this->table_name. " SET feature_image_title = ?, feature_image_path = ?, added_by = ?, date_created = ?, status = ? WHERE title = ?";
			$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );

			$upd = $this->conn->prepare($query);
			$upd->bindParam(1, $this->feature_image_title);
			$upd->bindParam(2, $this->feature_image_path);
			$upd->bindParam(3, $this->added_by);
			$upd->bindParam(4, $this->date_created);
			$upd->bindParam(5, $this->status);

			if($upd->execute())
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		public function delete()
		{
		  	$query = "UPDATE " . $this->table_name ." SET status = ?";
		  	$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );

		  	$upd = $this->conn->prepare($query);
		  	$upd->bindParam(1, $this->status);

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
			$query = "SELECT feature_image_title, feature_image_path, added_by, date_created FROM " .$this->table_name. " WHERE status = ? AND title = ?";
			$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );

			$sel = $this->conn->prepare($query);
			$sel->bindParam(1, $this->status);
			$sel->bindParam(2, $this->title);

			$sel->execute();

			return $sel;
		}
	}
?>