<?php
require_once 'db.php';
require_once 'comman.php';
/**
* user functions 
*/
class User extends Comman
{
	public $user_id;
	public $first_name;
	public $last_name;
	public $username;
	public $type;
	public $email;
	public $password;
	public $token;


	public function addUser()
	{
		global $database;

		$sql = 	"INSERT INTO users(";
		$sql .=	"first_name,last_name,username,type,email,password,token";
		$sql .=	") VALUES('";
		$sql .=	$database->escape_string($this->first_name) ."','";
		$sql .=	$database->escape_string($this->last_name) ."','";
		$sql .=	$database->escape_string($this->username) ."','";
		$sql .=	$database->escape_string($this->type) ."','";
		$sql .=	$database->escape_string($this->email) ."','";
		$sql .=	$database->escape_string($this->password) ."','";
		$sql .=	$database->escape_string($this->token) ."')";

		$result = $database->query($sql);
		return $result;

	}

	public function authanticate($new_username, $new_password)
	{
		global $database;

		$this->username = $database->escape_string($new_username);
		$this->password = ($new_password);

		$result = self::selectBySql("SELECT * FROM users WHERE username ='{$new_username}'");
		$row = $database->fetch_assoc($result);

		if (password_verify($this->password,$row['password'])) {
			return $row;
		}else{
			$_SESSION['not_found'] = "yes";
			header("location: ../public/index1.php");
		}
	}
	public function deleteUser($value)
	{
		global $database;
		$sql = "DELETE FROM users WHERE user_id = {$value} ";
		$result = $database->query($sql);

		return $result;
	}
	public function updateUser($username,$password,$token,$id)
	{
		global $database;

		$hashpassword = $database->hash_password($password);
		$sql = "UPDATE users SET username ='{$username}',password = '{$hashpassword}',token='{$token}' WHERE user_id = {$id}";
		$result = $database->query($sql);

		return $result;
		
	}
}

$user1 = new User();

?>	