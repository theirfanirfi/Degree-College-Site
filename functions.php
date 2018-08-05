<?php 

class Functions {

	private $connection;
	public function __construct()
	{
		$this->open_connection();
	}
	private function open_connection()
	{
		$this->connection = mysqli_connect("localhost","root","","degree_college");
	}
	public function query($sql)
	{
		return mysqli_query($this->connection,$sql);
	}

	public function fetch_array($row)
	{
		return mysqli_fetch_array($row);
	}

	public function find_by_id($sql)
	{
		$result = $this->find_by_sql($sql);
		return $result;
	}
	public function find_by_sql_in_shift($sql)
	{
		$result = $this->find_by_sql($sql);
		return array_shift($result);
	}
	public function find_by_sql_in_all($sql)
	{
		$result = $this->find_by_sql($sql);
		return $result;
	}
	public function find_by_sql($sql)
	{
		$object_array = array();
		$row = $this->query($sql);
		while($res = $this->fetch_array($row))
		{
			$object_array[] = self::instantiate($res);
		}
		return $object_array;

	}

	public static function instantiate($record)
	{
		$object = new self;
		foreach ($record as $attribute => $value) {
			$object->$attribute = $value;
		}
		return $object;
	}
}




?>