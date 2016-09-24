<?php
function create_database($dbname, $conn){
	if (!$conn->select_db($dbname)) 
		if ($conn->query("CREATE DATABASE $dbname;") and $conn->select_db($dbname))
			return;
		else
			die("Error creating database $dbname: " . $conn->error . "\n");
}

function create_tbl($tblname, $conn){
	$create_tbl = "CREATE TABLE IF NOT EXISTS $tblname (
		username varchar(255) NOT NULL,
		password varchar(255) NOT NULL,
		PRIMARY KEY (username)
	);";

	if (!$conn->query($create_tbl))
		die("Error creating table $tablename: " . $conn->error. "\n");
}

function create_and_setup_mysql($conn, $dbname, $tblname){
	create_database($dbname, $conn);
	create_tbl($tblname, $conn);
	echo "Successfully created table $tblname in database $dbname\n";
}

function main(){
	$dbhost = 'localhost'; $dbuser = get_current_user();
	echo "Username: '$dbuser'@'$dbhost'\n";
	$dbpass = 'password123';
	// $dbpass = readline("Password: ");

	$conn = new mysqli($dbhost, $dbuser, $dbpass);

	if($conn->connect_error)
	    die('Could not connect: ' . $conn->connect_error . "\n");

	$dbname = "blinkr";
	$tblname = "users";

	create_and_setup_mysql($conn, $dbname, $tblname);
}
main();
?>