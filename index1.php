
<head>
	<title>ENTechPortal</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,900|Patrick+Hand' rel='stylesheet' type='text/css'>
</head>
<body>
	<header>
	<nav>
		<ul class= "middlenav">
			<li><a href="index1.php">Home</a></li>
			<li>About</li>
			<li>Contact</li>
			<a href="registration.php" class="signup">Sign up</a>
		</ul>

	</nav>
	</header>
	<section class = "splash">
		<div class = "logo">
		<!-- below is the entech logo -->
			<img src="images2/enTechLogo4.png"> 
		</div>
		<div id="container">
		<form id="login" action="login.php" method="post" accept-charset="UTF-8">

				<legend>Login</legend>
				<br>
				<input type='hidden' name='submitted' id='submitted' value='1'/>
	 
				<label for='username'>Username</label>
				<input type='text' name='username' id='username'  maxlength="50" />
	 			<br>
				<label for='password'>Password</label>
				<input type='password' name='password' id='password' maxlength="50" />
	 			<br>
	 			<br>
				<input type='submit' name='login' value='login' />
		</form>
		</div>
		<!-- this is where I will place the content for the first page -->
		<!-- <h1>Where seniors come to learn about technology</h1> -->
	</section>
</body>