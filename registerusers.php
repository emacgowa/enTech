 <?php
 echo "hello";

$servername = "localhost";
$username = "root";
$password = "root";
$databasename = "users";
$connection= mysqli_connect($servername, $username, $password, $databasename) or die ("could not connect to mysql");

echo "yep";
if (!$connection) {
 	echo "no connection";
 } else {
	echo "yes connection";

if(isset($_SESSION['id'])){
	header("Location: index1.php") // if the session id is true then bring them back to the index1.php page
}

if(isset($_POST['signup'])) {
	include_once("users.php");

	$username = strip_tags($_POST['username']);
	$mypassword = strip_tags($_POST['password']);
	$email = strip_tags($_POST['email']);
	$active = 1;

	$username = stripslashes($username);
	$password = stripslashes($password);
	$email = stripslashes($email);

	$username = mysqli_real_escape_string($connection, $username);
	$password = mysqli_real_escape_string($connection, $password);
	$email = mysqli_real_escape_string($connection, $email);

	$password = md5($password);

	$sql_store = "INSERT into users (username, password, email, active) VALUES ('$username', '$password', '$email', '$active')";

	// check if people used the same username and email
	$sql_fetch_username = "SELECT username FROM users WHERE username = '$username'"; // if this returns ttrue then that means that there is a username there and it will produce an error

	// check if the email already exists in the database
	$sql_fetch_email = "SELECT email FROM users WHERE email = '$email'";

	$query_username = mysqli_query($connection, $sql_fetch_username);
	$query_email = mysqli_query($connection, $sql_fetch_email);

	// check if username is already in the database
	if(mysqli_num_rows($query_username)) {
		echo "There is already a user with that name!";
		return; // this wont run anything below it
	}

	// if username is equal to nothing, please insert username
	if($username == "") {
		echo "Please insert a username";
		return;
	}

	if($password == "") {
		echo "Please choose a password";
		return;
	}

	// check if valid email
	if(!filter_var($email, FILTER_VALIDATE_EMAIL) || $email == "") {
		echo "This email is not valid";
		return;
	}

	if(mysqli_num_rows($query_email)) {
		echo "That email is already in use";
		return;
	}

	mysqli_query($connection, $sql_store);
	header("Location: index1.php");
}


// echo "working";
// 	$servername = "localhost";
// 	$username = "root";
// 	$password = "root";
// 	$databasename = "users";
// $connection= mysqli_connect($servername, $username, $password, $databasename) or die ("could not connect to mysql");
// echo "yep";
// if (!$connection) {
// 	echo "no connection";
// } else {
// 	echo "yes connection";

// }

// $sql1 = "SELECT * FROM users WHERE username = $username";
// echo "fun";
// $result = mysqli_query($connection,$sql1);
// echo "this is fun";
// echo $result->num_rows;

// 	$myusername = $_POST['username'];
// 	$mypassword = $_POST['password'];
// 	$email = $_POST['email'];
// 	$active = 1;

// 	$sql2 = "INSERT INTO users (username, password, email, active) VALUES ('$myusername', '$mypassword', '$email', '$active')";

// 	$result = $connection -> query($sql1);

/* *************************************************
/*
//if(isset($_POST['signup'])){
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$databasename = "users";

	// mysqli is an object in php that connects php to mysql
	// the order of the things in the brackets matter! think of it as a "trickle down approach", you give the servername, you login with the username and password and then you give the database name you want to work with
	$connection= mysqli_connect($servername, $username, $password, $databasename) or die ("could not connect to mysql");

	echo "hello";

	if ($connection->connect_error) {
	    die("Connection failed: " . $connection->connect_error);
	}

	echo "Connected successfully";



	$myusername = $_POST['username'];
	$mypassword = $_POST['password'];
	$email = $_POST['email'];
	$active = 1;

	// $password = md5($password);

	// NEXT STEP IS TO CHECK WHETHER USERNAME AND EMAIL have already been taken
	$sql1 = "SELECT * FROM users WHERE username='$myusername'";
	$sql2 = "INSERT INTO users (username, password, email, active) VALUES ('$myusername', '$mypassword', '$email', '$active')";
	
	$result = $connection -> query($sql1);

	if(!$result) {
		die($connection -> error)
	}

	if($result -> num_rows > 0) {
		echo "duplicate user";
	} else {
		$connection -> query($sql2);
	}
	// users is the name of the table

//}
*/


?>

<html>
<head>
<title>Logged in</title>
</head>
<body>
<p>I am here</p>
</body>
</html>