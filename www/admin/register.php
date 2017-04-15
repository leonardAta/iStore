<?php
	
	#include title
	$page_title = "Register";

	# load db connection
	include 'includes/db.php';	

	# include functions
	include 'includes/functions.php';

	#include header
	include 'includes/header.php';

	# cache errors
	$errors = [];

	if(array_key_exists('register', $_POST)) {

		

		# validate first name
		if(empty($_POST['fname'])) {
			$errors['fname'] = "please enter first name";
		}
		# validate last name
		if(empty($_POST['lname'])) {
			$errors['lname'] = "please enter last name";
		}
		# validate email
		if(empty($_POST['email'])) {
			$errors['email'] = "please enter email";
		}
		if(doesEmailExist($conn, $_POST['email'])) {
			$errors['email'] = "email already exists";
		}
		# validate password
		if(empty($_POST['password'])) {
			$errors['password'] = "please enter password";
		}
		
		if($_POST['password'] != $_POST['pword'])
			$errors['pword'] = "passwords do not match";
		if(empty($errors)) {
			# do database stuff
			# eliminate unwanted spaces from values in the $_POST array
			$clean = array_map('trim', $_POST);

			# register Admin
			doAdminRegister($conn, $clean);
			
		}

	} 

?>
<title><?php echo $page_title; ?></title>
<div class="wrapper">
		<h1 id="register-label">Admin Register</h1>
		<hr>
		<form id="register"  action="register.php" method="POST">
			<div>
				<?php
					displayErrors($errors, 'fname');
				?>
				<label>first name:</label>
				<input type="text" name="fname" placeholder="first name">
			</div>
			<div>
				<?php
					displayErrors($errors, 'lname');
				?>
				<label>last name:</label>	
				<input type="text" name="lname" placeholder="last name">
			</div>

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
 
			<div>
				<?php
					displayErrors($errors, 'pword');
				?>
				<label>confirm password:</label>	
				<input type="password" name="pword" placeholder="password">
			</div>

			<input type="submit" name="register" value="register">
		</form>

		<h4 class="jumpto">Have an account? <a href="login.php">login</a></h4>
	</div>