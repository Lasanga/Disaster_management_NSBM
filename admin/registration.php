<?php
require_once '../includes/db.php';

if (isset($_POST['submitDetails'])) {
	
	$firstname 	=$database->escape_string($_POST['firstname']);
	$lastname  	=$database->escape_string($_POST['lastname']);
	$username	=$database->escape_string($_POST['username']);
	$type		=$database->escape_string($_POST['type']);
	$email		=$database->escape_string($_POST['email']);
	$password	=$_POST['password'];

	// hashed password
	$hashedPassword = $database->hash_password($password);

	$sql = "INSERT INTO users (first_name,last_name,username,type,email,password) VALUES('{$firstname}','{$lastname}','{$username}','{$type}','{$email}','{$hashedPassword}')";

	$result= $database->query($sql);

	if ($result) {
		header("location:profiles.php");
	}else{
		die("error");
	}
}

?>

