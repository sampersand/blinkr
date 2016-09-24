<?php
	function canlogin($user, $pass){
		$conn = new mysqli('localhost', 'westerhack', 'password123', 'blinkr');
		include 'user.php';
		$u = new user($user, $conn);
		return $u->verify($pass);

	}
	echo canlogin($_POST['username'], $_POST['password']) ? 1 : 0;
?>