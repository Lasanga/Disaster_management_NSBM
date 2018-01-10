<?php 
require_once 'db.php';
require_once 'comman.php';


/**
* 
*/
class Map extends Comman
{
	
	public $name;
	public $address;
	public $lat;
	public $lng;
	public $type;

	public function insertData()
	{
		global $database;

		$sql = 	"INSERT INTO markers(";
		$sql .=	"name,address,lat,lng,type";
		$sql .=	") VALUES('";
		$sql .=	$database->escape_string($this->name) ."','";
		$sql .=	$database->escape_string($this->address) ."','";
		$sql .=	$database->escape_string($this->lat) ."','";
		$sql .=	$database->escape_string($this->lng) ."','";
		$sql .=	$database->escape_string($this->type) ."')";

	    $database->query($sql);
			
	}

	public function showMarkers()
	{
		$comman = new Comman();

		$result = $comman->selectBySql("SELECT * FROM markers");
		return $result;
	}
}


?>