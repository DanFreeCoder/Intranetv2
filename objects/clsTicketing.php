<?php
class Ticketing
{
	private $conn;
	private $table_name = 'request';

	public $id;
	public $ticket_no;
	public $requested_by;
	public $category_id;
	public $sub_cat_id;
	public $handled_by;
	public $details;
	public $urgency;
	public $date_requested;
	public $waiting_time;
	public $handled_at;
	public $done_at;
	public $time_consumed;
	public $complexity;
	public $status;

	public function __construct($db)
	{
		$this->conn = $db;
	}

	public function send_ticket()
	{
		$query = 'INSERT INTO '.$this->table_name.' SET ticket_no=?, requested_by=?, location=?, category_id=?, sub_cat_id=?, handled_by=?, details=?, urgency=?, date_requested=?, status=?';
		$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
		$ins = $this->conn->prepare($query);
		
		$ins->bindParam(1, $this->ticket_no);
		$ins->bindParam(2, $this->requested_by);
		$ins->bindParam(3, $this->location);
		$ins->bindParam(4, $this->category_id);
		$ins->bindParam(5, $this->sub_cat_id);
		$ins->bindParam(6, $this->handled_by);
		$ins->bindParam(7, $this->details);
		$ins->bindParam(8, $this->urgency);
		$ins->bindParam(9, $this->date_requested);
		$ins->bindParam(10, $this->status);

		if($ins->execute())
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function save_requestor()
	{
		$query='INSERT INTO requestor SET firstname=?, lastname=?, email=?, department=?, status=?';
		$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
		$ins = $this->conn->prepare($query);

		$ins->bindParam(1, $this->firstname);
		$ins->bindParam(2, $this->lastname);
		$ins->bindParam(3, $this->email);
		$ins->bindParam(4, $this->department);
		$ins->bindParam(5, $this->status);

		if($ins->execute())
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function update_requestor()
	{
		$query='UPDATE requestor SET firstname=?, lastname=?, email=? WHERE id=?';
		$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
		$upd = $this->conn->prepare($query);

		$upd->bindParam(1, $this->firstname);
		$upd->bindParam(2, $this->lastname);
		$upd->bindParam(3, $this->email);
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

	public function delete_requestor()
	{
		$query='UPDATE requestor SET status = 0 WHERE id=?';
		$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
		$upd = $this->conn->prepare($query);

		$upd->bindParam(1, $this->id);

		if($upd->execute())
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function get_ticket_no()
	{
		$query = "SELECT max(id) + 1 as 'ticket_id' from request";
	  	$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );

	  	$sel = $this->conn->prepare($query);
	  	$sel->execute();

	  	return $sel;
	}

	public function get_categories()
	{
		$query='SELECT * FROM category WHERE status !=0 ORDER BY category ASC';
		$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
		$sel = $this->conn->prepare($query);

		$sel->execute();
		return $sel;
	}

	public function get_assignee()
	{
		$query = 'SELECT * from users WHERE status != 0 ORDER BY role ASC';
		$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
		$sel = $this->conn->prepare($query);

		$sel->execute();
		return $sel;
	}

	public function get_sub_cat_bycat()
	{
		$query = 'SELECT subcategory.id as "sub_id", subcategory.cat_id, subcategory.sub_category, category.id as "category_id", category.category, category.status FROM subcategory, category WHERE category.id=subcategory.cat_id AND subcategory.status != 0 AND subcategory.cat_id = ? ORDER BY subcategory.sub_category ASC';
		$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
		$sel = $this->conn->prepare($query);

		$sel->bindParam(1, $this->cat_id);

		$sel->execute();
		return $sel;
	}

	public function get_email_by_id()
	{
		$query = 'SELECT * from requestor WHERE status != 0 AND id = ?';
		$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
		$sel = $this->conn->prepare($query);

		$sel->bindParam(1, $this->id);

		$sel->execute();
		return $sel;
	}
}
?>