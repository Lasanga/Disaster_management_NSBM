<?php

require_once 'db.php';
require_once 'map.php';

$map = new Map();

// Gets data from URL parameters
$map->name 		= $_GET['name'];
$map->address 	= $_GET['address'];
$map->lat 		= $_GET['lat'];
$map->lng  		= $_GET['lng'];
$map->type 		= $_GET['type'];

$map->insertData();

?>