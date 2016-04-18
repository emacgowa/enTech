<?php

if(isset($_POST['signup'])){
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$databasename = "users";

	// mysqli is an object in php that connects php to mysql
	// the order of the things in the brackets matter! think of it as a "trickle down approach", you give the servername, you login with the username and password and then you give the database name you want to work with
	$connection = new mysqli($servername, $username, $password, $databasename);

	if ($connection->connect_error) {
	    die("Connection failed: " . $connection->connect_error);
	}

	// echo "Connected successfully";



	$myusername = $_POST['username'];
	$mypassword = $_POST['password'];
	$email = $_POST['email'];
	$active = 1;

	// $password = md5($password);

	// NEXT STEP IS TO CHECK WHETHER USERNAME AND EMAIL have already been taken
	$sql1 = "SELECT * FROM users WHERE username='$myusername'";
	$sql2 = "INSERT INTO users (username, password, email, active) VALUES ('$myusername', '$mypassword', '$email', '$active')";
	
	$result = $connection -> query($sql);

	if(!$result) {
		die($connection -> error)
	}

	if($result -> num_rows > 0) {
		echo "duplicate user";
	} else {
		$connection -> query($sql2);
	}
	// users is the name of the table

}



?>