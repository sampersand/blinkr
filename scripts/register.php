<?php
	function is_email($email){
		return preg_match('/\w+@\w+\.\w+/', $email);
	}
	function register($user, $email, $pass, $conf_pass){
		if(!($user && $email && $pass && $conf_pass)) return 'required_fields: ';
		if($pass != $conf_pass) return 'password_mismatch';
		if(!is_email($email)) return 'invalid_email';

		require 'user.php';
		$u = new user($user);
		if($u->username_exists()) return 'username_taken';
		if($u->email_exists($email)) return 'email_taken';

		return $u->register($email, $pass);

	}
	echo register($_POST['username'], $_POST['email'], $_POST['password'], $_POST['confirm_password']);

?>