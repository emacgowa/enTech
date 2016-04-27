<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

if(isset($_POST['signup'])) {
	$myusername = strip_tags($_POST['username']);
	$mypassword = strip_tags($_POST['password']);
	$email = strip_tags($_POST['email']);
	$active = 1;

	$myusername = stripslashes($myusername);
	$mypassword = stripslashes($mypassword);
	$email = stripslashes($email);

	include("mysqldatabase.php");
	$connection= mysqli_connect($servername, $dbusername, $dbpassword, $databasename) or die ("could not connect to mysql");

	// stop people from injecting sql commands into string
	$myusername = mysqli_real_escape_string($connection, $myusername);
	$mypassword = mysqli_real_escape_string($connection, $mypassword);
	$email = mysqli_real_escape_string($connection, $email);

	// if username is equal to nothing, please insert username
	if($myusername == "") {
		echo "Please insert a username";
		return;
	}

	if($mypassword == "") {
		echo "Please choose a password";
		return;
	}

	// check if valid email
	if(!filter_var($email, FILTER_VALIDATE_EMAIL) || $email == "") {
		echo "This email is not valid";
		return;
	}

	$mypassword = md5($mypassword);


	$sql_store = "INSERT into users (username, password, email, active) VALUES ('$myusername', '$mypassword', '$email', '$active')";

	// check if people used the same username and email
	$sql_fetch_username = "SELECT username FROM users WHERE username = '$myusername'"; // if this returns ttrue then that means that there is a username there and it will produce an error

	// check if the email already exists in the database
	$sql_fetch_email = "SELECT email FROM users WHERE email = '$email'";

	$query_username = mysqli_query($connection, $sql_fetch_username);
	$query_email = mysqli_query($connection, $sql_fetch_email);

	// check if username is already in the database
	if(mysqli_num_rows($query_username)) {
		echo "There is already a user with that name!";
		return; // this wont run anything below it
	}

	if(mysqli_num_rows($query_email)) {
		echo "That email is already in use";
		return;
	}

	mysqli_query($connection, $sql_store);
	mysqli_close($connection);
	header("Location: index1.php");
	exit;
}
?>