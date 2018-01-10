w<?php
session_start();
require_once 'db.php';
require_once 'news.php';

if (isset($_POST['submitDetails'])) {
	
	$news = new News();

	$news->author_id	= $_GET['id'];
	$news->author_name	= $_POST['author'];
	$news->headline 	= $_POST['headline'];
	$news->description 	= $_POST['description'];
	$news->location 	= $_POST['location'];

	global $database;

	// check file type 
	$type = $database->escape_string($_FILES['image']['type']);

	if (substr($type,0,5) == "image") {
		$news->image =file_get_contents($_FILES['image']['tmp_name']);
	}else{
		$_SESSION['error']= "yes";
		header("location:../users/users_index.php");
		die();
	}

	$result = $news->insertNews("temp_disasters");

	if ($result) {
		$_SESSION['added']="yes";
		header("location:../users/users_index.php");
	}else{
		$_SESSION['added']="no";
		header("location:../users/users_index.php");
	}
	

}

if (isset($_POST['submitSave'])) {

	$news = new News();

	$news->author_id 	=  $_POST['news_id'];
	$news->headline 	=  $_POST['headline'];
	$news->description 	=  $_POST['description'];
	$news->location 	=  $_POST['location'];

	$result = $news->updateNews();

	if ($result) {
		$_SESSION['updated'] = "yes";
		header("location:../users/users_index.php");
	}else{
		$_SESSION['updated'] = "no";
		header("location:../users/users_index.php");
	}
}


if (isset($_POST['submitDel'])) {
	
	$news = new News();

	$id = $database->escape_string($_POST['news_id']);
	$result = $news->deleteNews($id,"temp_disaster_id","temp_disasters");

	if ($result) {
		$_SESSION['deleted'] = "yes";
		header("location:../users/users_index.php");
	}else{
		$_SESSION['deleted'] = "no";
		header("location:../users/users_index.php");
	}
}



?>