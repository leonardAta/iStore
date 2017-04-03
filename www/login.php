<?php
	ob_start();
	session_start();

	# include title
	$page_title = "Log in";
	# include header
	#include 'includes/header.php';
	# include database
	include 'includes/db.php';
	# include functions
	include 'includes/functions.php';


	$errors = [];
	if(array_key_exists('register', $_POST)) {

		if(empty($_POST['email'])) {
			$errors['email'] = "please enter email";
		}
		if(empty($_POST['password'])) {
			$errors['password'] = "please enter password";
		}
		if(empty($errors)) {
			#do database stuff
			#eliminate unwanted spaces from values in the $_POST array
			$clean = array_map('trim', $_POST);

			doAdminLogin($conn, $clean);
		}
	}

?>


<html>
<head>
	<title><?php echo $page_title; ?></title>
	<link rel="stylesheet" type="text/css" href="styles/styles.css">
</head>
<body>
	<section>
		<div class="mast">
			<h1>T<span>SSB</span></h1>
		</div>
	</section>
	
	<div class="wrapper">
		<h1 id="register-label">Admin Login</h1>
		<hr>
		<form id="register"  action ="category.php" method ="POST">
			<div>
				<?php
					displayErrors($errors, 'email');
				?>
				<label>email:</label>
				<input type="text" name="email" placeholder="email">
			</div>
			<div>
				<?php
					displayErrors($errors, 'password');
				?>
				<label>password:</label>
				<input type="password" name="password" placeholder="password">
			</div>

			<input type="submit" name="register" value="login">
		</form>

		<h4 class="jumpto">Don't have an account? <a href="register.php">register</a></h4>
	</div>

	<section class="foot">
		<div>
			<p>&copy; Copyright 2016</p>
		</div>
	</section>
</body>
</html>