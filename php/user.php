<?php
class user{
	const CRED_TABLE_NAME = "";

	public $username;
	private $conn;
	public function __construct($username, $conn){
		$this->conn = $conn;
		$this->username = $this->scrub_str($username);
	}

	public function scrub_str($password){
		return $this->conn->real_escape_string($password);
	}

	public function __toString(){
		return $this->username;
	}

	public function write($password){
		$password = password_hash($password, PASSWORD_DEFAULT);
		$insert_into_table = "INSERT INTO credentials VALUES ('{$this->username}', '$password');";
		return (bool)$this->conn->query($insert_into_table);
	}


	public function verify($password){
		$check_if_exists = "SELECT password FROM credentials WHERE username='{$this->username}';";
		$dbpassw_hash = $this->conn->query($check_if_exists)->fetch_row();

		assert(count($dbpassw_hash) == 1);

		return password_verify($password, $dbpassw_hash[0]);
	}
}
// $conn = new mysqli('localhost', 'westerhack', 'password123', 'refried_beans_db');
// $conn or die('ohno');
// $u = new user("usern",$conn);
// $u->write('passw');
// echo '@' . $u->verify('passw') . '@';
// echo password_verify("passw", $u->scrub_str("passw"));
// echo $u->validate("passw");
?>

