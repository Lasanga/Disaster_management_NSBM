<?php
function allErrors($errors=array()){
	$output ="";
	if (!empty($errors)) {
		foreach ($errors as $key => $error) {
			$output =$error;
		}
	}
	return $output;
}

function comparePassword($pass,$repass){
	if ($pass != $repass) {
		return "didnt match";
	}
}

function lengthValidation($field){
	$min = 5;
	$max = 30;
  	return strlen($field)<$min || strlen($field) >$max;
	
}
?>