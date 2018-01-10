<?php
require_once 'session.php';

if (isset($_POST['Logout'])) {
	$Session->logout();
	header("location: ../public/index1.php");
}
?>