<?php
class Events{
	private $conn;
	private $table_name = "event";

	public $id;
	public $event_date;
	public $event_name;
	public $status;

	public function __construct($db)
	{
		$this->conn = $db;
	}

	public function save_event()
	{
		$query = "INSERT INTO ".$this->table_name." SET event_date=?, event_name=?, status=?";
		$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

		$ins = $this->conn->prepare($query);

		$ins->bindParam(1, $this->event_date);
		$ins->bindParam(2, $this->event_name);
		$ins->bindParam(3, $this->status);

		if($ins->execute())
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function get_event()
	{
		$query = "SELECT event_date, event_name FROM event WHERE status = ?";
		$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
		$sel = $this->conn->prepare($query);

		$sel->bindParam(1, $this->status);
		$sel->execute();

		return $sel;
	}
}
?>