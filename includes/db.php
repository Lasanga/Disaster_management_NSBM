<?php

require_once 'config.php';

/**
* connect the database 
* close the database connection
* define a query function to execute the query
* function to test the query
* function to escape strings
*/
class MySqlDatabase
{
	private $connection;

	function __construct()
	{
		$this->openConnection();
	}

	public function openConnection()
	{
		$this->connection = mysqli_connect(HOST_NAME,USERNAME,PASSWORD,DB_NAME);
		if (mysqli_connect_errno()) {
			die("database connection failed");
		}
	}

	public function closeConnection()
	{
		if (isset($this->connection)) {
			mysqli_close($this->connection);
			unset($this->connection);
		}
	}

	public function query($sql)
	{
		$result = mysqli_query($this->connection,$sql);
		$this->query_test($result);
		return $result;
	}

	public function fetch_assoc($resultSql)
	{
		return mysqli_fetch_assoc($resultSql);
	}

	public function query_test($result)
	{
		if (!$result) {
			die("query failed");
		}
	}

	public function escape_string($string)
	{
		$escaped = mysqli_real_escape_string($this->connection,$string);
		return $escaped;
	}
}

$database = new MySqlDatabase();

?>