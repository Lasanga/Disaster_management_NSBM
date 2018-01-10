<?php
session_start();
require_once '../includes/db.php';
require_once '../includes/user.php';
require_once '../includes/functions.php';

$error = array();

if (isset($_POST['submitDetails'])) {
	
	global $user1;

	$user1->first_name = $_POST['firstname'];
	$user1->last_name  = $_POST['lastname'];
	$user1->username   = $_POST['username'];
	$user1->type       = $_POST['type'];
	$user1->email      = $_POST['email'];
	$user1->token       = $_POST['token'];

	$username  = $database->escape_string($_POST['username']);
	$password  = $database->escape_string($_POST['password']);
	$password2 = $database->escape_string($_POST['re_password']);

	// hashed password
	$hashedPassword = $database->hash_password($password);
	$user1->password = $hashedPassword;
}

if (lengthValidation($username)) {
		$error['length'] = "username size must be between 5-30";
		header("location:../admin/profiles.php");

	}elseif ($password != $password2) {
		 $error['password_error'] = "passwords didnt match";
		 header("location:../admin/profiles.php");
	}
	else{
		
		$result = $user1->addUser();

	// validation for affected rows
		if ($result) {
			$_SESSION['register'] = "User successfully added! Thank you!";
			header("location:profiles.php");
		}else{
			$_SESSION['register'] = "User registeration failed! Please try again.";
			header("location:profiles.php");
		}
	}
	$_SESSION['errorValidations'] = allErrors($error);
?>

