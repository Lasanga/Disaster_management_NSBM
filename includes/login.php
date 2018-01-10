<?php
require_once 'session.php';
require_once 'user.php';

if (isset($_POST['submit'])) {

	$username = $_POST['username'];
	$password = $_POST['password'];

	$found_user = $user1->authanticate($username,$password);

	if ($found_user['token'] ==1) {
		$Session->login($found_user);
		header("location: ../admin/admin_index.php");
	}
	elseif($found_user) {
		$Session->login($found_user);
		header("location: ../users/users_index.php");
	}

}



?>