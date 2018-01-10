<?php
session_start();
require_once 'db.php';
require_once 'user.php';

if (isset($_GET['delete'])) {

	$id = intval($database->escape_string($_GET['id']));
	$result = $user1->deleteUser($id);
	if ($result) {
		$_SESSION['deleted'] = "Deleted Successfully";
		header("location:../admin/profiles.php");
	}else{
		$_SESSION['deleted'] = "no";
		header("location:../admin/profiles.php");
	}

}

if (isset($_POST['submitEdit'])) {
	
	$id 	  = $database->escape_string($_POST['id']);
	$username = $database->escape_string($_POST['username']);
	$password = $database->escape_string($_POST['newPass']);
	$token	  = $database->escape_string($_POST['token']);

	$result = $user1->updateUser($username,$password,$token,$id);
	if ($result) {
		$_SESSION['updated'] = "updated Successfully";
		header("location:../admin/profiles.php");
	}else{
		$_SESSION['updated'] = "no";
		header("location:../admin/profiles.php");
	}
}

?>