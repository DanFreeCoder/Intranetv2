<?php
	class Posts{

		private $conn;
		private $table_name = "posts";

		public $type;
		public $privacy;
		public $details;
		public $date_added;
		public $posted_by;

		public function __construct($db)
		{
			$this->conn = $db;
		}

		public function save_post()
		{
			$query = "INSERT INTO " . $this->table_name . " SET type = ?, department = ?, details = ?, date_added = ?, posted_by = ?, status = ?";
			$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );

			$ins = $this->conn->prepare($query);
			$ins->bindParam(1, $this->type);
			$ins->bindParam(2, $this->department);
			$ins->bindParam(3, $this->details);
			$ins->bindParam(4, $this->date_added);
			$ins->bindParam(5, $this->posted_by);
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

		public function update_post()
		{
			$query = "UPDATE " . $this->table_name . " SET type = ?, department = ?, details = ?, date_added = ?, posted_by = ?, status = ? WHERE id=?";
			$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );

			$ins = $this->conn->prepare($query);
			$ins->bindParam(1, $this->type);
			$ins->bindParam(2, $this->department);
			$ins->bindParam(3, $this->details);
			$ins->bindParam(4, $this->date_added);
			$ins->bindParam(5, $this->posted_by);
			$ins->bindParam(6, $this->status);
			$ins->bindParam(7, $this->id);

			if($ins->execute())
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		public function delete_post()
	  	{
	  		$query = "UPDATE ".$this->table_name." SET status = 0 WHERE id = ?";
	  		$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
	  		$del = $this->conn->prepare($query);

	  		$del->bindParam(1, $this->id);

	  		if($del->execute())
	  		{
	  			return true;
	  		}
	  		else
	  		{
	  			return false;
	  		}
	  	}

		  public function activate_post()
	  	{
	  		$query = "UPDATE ".$this->table_name." SET status = 1 WHERE id = ?";
	  		$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
	  		$del = $this->conn->prepare($query);

	  		$del->bindParam(1, $this->id);

	  		if($del->execute())
	  		{
	  			return true;
	  		}
	  		else
	  		{
	  			return false;
	  		}
	  	}

		public function check_if_exist()
		{
			$query = "SELECT id, type, department, details, image_path, date_added, posted_by FROM posts WHERE status = ? AND id = ?";
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

			$sel = $this->conn->prepare($query);
			$sel->bindParam(1, $this->status);
			$sel->bindParam(2, $this->id);

			$sel->execute();

			return $sel;
		}

		public function view_post_details()
		{
			$query = "SELECT id, type, department, details, date_added, posted_by FROM posts WHERE id=?";
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
			$sel = $this->conn->prepare($query);

			$sel->bindParam(1, $this->id);

			$sel->execute();

			return $sel;
		}

		public function view_post()
		{
			$query = "SELECT posts.id, posts.type, posts.details, posts.date_added, posts.posted_by, posts.image FROM posts ORDER by id DESC LIMIT 5";
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

			$sel = $this->conn->prepare($query);
			$sel->execute();

			return $sel;
		}

		public function view_all_post()
		{
			$query = "SELECT posts.id as 'post-id', posts.type, posts.details, posts.date_added, posts.posted_by, posts.department, posts.status, departments.id, departments.department as 'dept-name' FROM posts, departments WHERE posts.department = departments.id AND status != 0 ORDER by posts.id DESC";
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

			$sel = $this->conn->prepare($query);
			$sel->execute();

			return $sel;
		}

		public function view_more_post()
		{
			//$query = "SELECT departments.id as 'dept_id', departments.department as 'dept_name', posts.date_added FROM departments, posts WHERE departments.id=posts.department AND posts.date_added < ? ORDER BY posts.date_added DESC LIMIT 5";
			$query = "SELECT departments.id as 'dept_id', departments.department as 'dept_name', posts.id, posts.type, posts.department, posts.details, posts.date_added, posts.posted_by, posts.status FROM departments, posts WHERE departments.id=posts.department AND posts.date_added < ? ORDER BY posts.date_added DESC LIMIT 2";
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

			$sel = $this->conn->prepare($query);
			$sel->bindParam(1, $this->date_added);

			$sel->execute();

			return $sel;
		}

		public function display_next_postid()
	  	{
		  	$query = "SELECT max(id) as 'post_id' from posts";
		  	$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );

		  	$sel = $this->conn->prepare($query);
		  	$sel->execute();

		  	return $sel;
	  	}

	  	public function display_post_bydept()
	  	{
	  		$query = "SELECT departments.id, posts.id as 'post_ID', posts.type, posts.department, posts.details, posts.date_added, posts.status FROM departments, posts WHERE departments.id=posts.department AND posts.status != 0 AND posts.department = ? ORDER BY posts.id DESC LIMIT 2";
	  		$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

	  		$sel = $this->conn->prepare($query);
	  		$sel->bindParam(1, $this->department);

	  		$sel->execute();

	  		return $sel;
	  	}

	  	public function display_bydept()
	  	{
	  		$query = "SELECT departments.id as 'dept_id', departments.department as 'dept_name', posts.date_added FROM departments, posts WHERE departments.id=posts.department ORDER BY posts.date_added DESC LIMIT 5";
	  		$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

	  		$sel = $this->conn->prepare($query);
	  		$sel->execute();

	  		return $sel;
	  	}

		  public function display_announcement()
	  	{
	  		$query = "SELECT departments.id, posts.id as 'post_ID', posts.type, posts.department, posts.details, posts.date_added, posts.status FROM departments, posts WHERE departments.id=posts.department AND posts.status != 0 AND posts.department = 21 ORDER BY posts.id DESC LIMIT 2";
	  		$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

	  		$sel = $this->conn->prepare($query);
	  		$sel->execute();

	  		return $sel;
	  	}
	}
?>