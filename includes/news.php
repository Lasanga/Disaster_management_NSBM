<?php
require_once 'db.php';
require_once 'comman.php';
/**
* News class
*/
class News extends Comman
{
	public $author_id;
	public $author_name;
	public $headline;
	public $description;
	public $location;
	public $image;

	public function insertNews($table)
	{
		global $database;

		$sql = 	"INSERT INTO {$table}(";
		$sql .=	"author_id,author_name,headline,description,location,images";
		$sql .=	") VALUES('";
		$sql .=	$database->escape_string($this->author_id) ."','";
		$sql .=	$database->escape_string($this->author_name) ."','";
		$sql .=	$database->escape_string($this->headline) ."','";
		$sql .=	$database->escape_string($this->description) ."','";
		$sql .=	$database->escape_string($this->location) ."','";
		$sql .=	$database->escape_string($this->image) ."')";

		$result = $database->query($sql);
		return $result;	
	}

	public function showNews($table)
	{
		$comman = new Comman();

		$result = $comman->selectBySql("SELECT * FROM {$table} ORDER BY temp_disaster_id DESC ");
		return $result;
	}
	public function showPublicNews($table,$page,$per_page)
	{
		$comman = new Comman();

		$result = $comman->selectBySql("SELECT SQL_CALC_FOUND_ROWS * FROM {$table} ORDER BY disaster_id DESC LIMIT {$page},{$per_page}");
		return $result;
	}

		public function showAllNews($table)
	{
		$comman = new Comman();

		$result = $comman->selectBySql("SELECT * FROM {$table} ORDER BY disaster_id DESC ");
		return $result;
	}

	public function deleteNews($news_id,$col,$table)
	{
		$comman = new Comman();

		$result = $comman->selectBySql("DELETE FROM {$table} WHERE {$col} ={$news_id}");
		return $result;
	}

	public function updateNews()
	{
		$comman = new Comman();

		global $database;

		$sql  =  "UPDATE temp_disasters SET ";
		$sql .= "headline= '". $database->escape_string($this->headline)."', ";
		$sql .= "description= '". $database->escape_string($this->description)."', ";
		$sql .= "location= '". $database->escape_string($this->location)."' ";
		$sql .= "WHERE temp_disaster_id = ". $database->escape_string($this->author_id);

		$result = $database->query($sql);
		return $result;
	}


}

$news = new News();

?>
