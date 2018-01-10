<?php
session_start();
require_once '../includes/db.php';
require_once '../includes/news.php';

if (isset($_POST['submitApprove'])) {
	
	$news = new News();
	global $database;

	$id = $database->escape_string($_POST['news_id']);

	$news->author_id	= $_POST['author_id'];
	$news->author_name	= $_POST['author'];
	$news->headline 	= $_POST['headline'];
	$news->description 	= $_POST['description'];
	$news->location 	= $_POST['location'];
	$news->image 		= base64_decode($_POST['images']);

	$result = $news->insertNews("disaster");

	if ($result) {
		$news->deleteNews($id,"temp_disaster_id","temp_disasters");
		$_SESSION['added']="yes";
		header("location:admin_index.php");
	}else{
		$_SESSION['added']="no";
		header("location:admin_index.php");
	}
	

}


if (isset($_POST['submitDel'])) {
	
	$news = new News();
	global $database;
	$id = $database->escape_string($_POST['news_id']);
	$result = $news->deleteNews($id,"temp_disaster_id","temp_disasters");

	if ($result) {
		$_SESSION['deleted'] = "yes";
		header("location:admin_index.php");
	}else{
		$_SESSION['deleted'] = "no";
		header("location:admin_index.php");
	}
}

if (isset($_POST['submitDelete'])) {
	$news = new News();
	global $database;
	$id = $database->escape_string($_POST['id']);
	$result = $news->deleteNews($id,"disaster_id","disaster");

	if ($result) {
		$_SESSION['deleted'] = "yes";
		header("location:admin_index.php");
	}else{
		$_SESSION['deleted'] = "no";
		header("location:admin_index.php");
	}
}


?>