<head>
	<title>Registration</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,900|Patrick+Hand' rel='stylesheet' type='text/css'>
</head>
<body class = "register">
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

	<section class = "registration">
		<div class = "form">
			<h1 class = "myreg"> Registration</h1>
			<form method="post" action="registerusers.php">

    			<fieldset>
    
			    	<ul>
			    		<label for="username">Username</label>
			    		<li>
			    			<input type="text" name="username" required />
			    		</li>
			    		<label for="password">Password</label>
			    		<li>
			    			<input type="password" name="password" required/>
			    		</li>
			    		<label for="email">Email</label>
			    		<li>
			    			<input type="text" name="email" required/>	
			    		</li>
			    		<li>
			    			<input type="submit" value="Signup Now" class="large blue button" name="signup" />			
			    		</li>
			    	</ul>
    	
    			</fieldset>
    
			</form>		
		</div>
	</section>

</body>