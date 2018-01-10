<?php

/**
* session class
*/
class session 
{
	private $logged_in = false;
	public $user_id;
	public $username;
	public $token =0;

	function __construct()
	{
		session_start();
		$this->check_login();
	}

	private  function check_login()
	{
		if (isset($_SESSION['user_id'])) {
			$this->username = $_SESSION['user_id'];
			$this->logged_in = true;
		}else{
			unset($this->user_id);
			$this->logged_in = false;
		}
	}

	public function is_logged_in()
	{
		return $this->logged_in;
	}

	public function login($user)
	{
		if ($user) {
			$this->user_id = $_SESSION['user_id'] = $user['user_id'];
			$this->username = $_SESSION['username'] = $user['username'];
			$this->token = $_SESSION['token'] = $user['token'];
			$this->logged_in = true;
		}
	}

	public function logout()
	{
		unset($_SESSION['user_id']);
		unset($this->user_id);
		unset($this->username);
		unset($this->token);
		unset($_SESSION['token']);
		$this->logged_in = false;
	}
}
$Session = new session();

?>