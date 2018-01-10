<?php
require_once 'db.php';
/**
* 
*/
class Comman{
	
	function __construct()
	{
		# code...
	}

	public static function findAll(){
		global $database;
		$result = $database->query("SELECT * FROM users");
		return $result;
	}

	public static function selectBySql($sql='')
	{
		global $database;
		$result = $database->query($sql);
		return $result;
	}

	public static function numOfRows()
	{
		$result    = self::selectBySql("SELECT username FROM users");
		$numOfRows = mysqli_num_rows($result);
		return $numOfRows;
	}
}

?>