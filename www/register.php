<?php
	
	#include title
	$page_title = "Register";
	

	#include header
	include 'includes/header.php';

	if(array_key_exists('register', $_POST)) {
		# cache errors
		$errors = [];

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
		# validate password
		if(empty($_POST['password'])) {
			$errors['password'] = "please enter password";
		}
		
		if($_POST['password'] != $_POST['pword'])
			$errors['pword'] = "passwords do not match";
		if(empty($errors)) {
			# do database stuff
		
			
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
					if(isset($errors['fname'])) { echo '<span class="err">'.$errors['fname']. '</span>'; }
				?>
				<label>first name:</label>
				<input type="text" name="fname" placeholder="first name">
			</div>
			<div>
				<?php
					if(isset($errors['lname'])) { echo '<span class="err">'.$errors['lname']. '</span>'; }
				?>
				<label>last name:</label>	
				<input type="text" name="lname" placeholder="last name">
			</div>

			<div>
				<?php
					if(isset($errors['email'])) { echo '<span class="err">'.$errors['email']. '</span>'; }
				?>
				<label>email:</label>
				<input type="text" name="email" placeholder="email">
			</div>
			<div>
				<?php
					if(isset($errors['password'])) { echo '<span class="err">'.$errors['password']. '</span>'; }
				?>
				<label>password:</label>
				<input type="password" name="password" placeholder="password">
			</div>
 
			<div>
				<?php
					if(isset($errors['pword'])) { echo '<span class="err">'.$errors['pword']. '</span>'; }
				?>
				<label>confirm password:</label>	
				<input type="password" name="pword" placeholder="password">
			</div>

			<input type="submit" name="register" value="register">
		</form>

		<h4 class="jumpto">Have an account? <a href="login.php">login</a></h4>
	</div>