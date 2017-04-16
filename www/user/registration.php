<?php

#include title
$page_title = "Registration";

#load db connection
include 'includes/database.php';

#include functions
include 'includes/functions.php';

#include header
include 'includes/header.php';

#cache errors
$errors = [];

if(array_key_exists('register', $_POST)) {

	#validate first name
	if(empty($_POST['fname'])) {
		$errors['fname'] = "Enter first name";
	}
	#validate last name
	if(empty($_POST['lname'])) {
		$errors['lname'] = "Enter last name";
	}
	#validate email 
	if(empty($_POST['email'])) {
		$errors['email'] = "Enter email";
	}
	#validate username
	if(empty($_POST['username'])) {
		$errors['username'] = "Enter username";
	}
	#validate password
	if(empty($_POST['password'])) {
		$errors['password'] = "Enter password";
	}
	#validate confirm password
	if($_POST["password"] != $_POST["pword"]) {
		$errors["pword"] = "Passwords do not match";
	}	
	if(empty($errors)) {
		#eliminate unwanted spaces from values in the $_POST array
		$clean = array_map('trim', $_POST);
		registerAdmin($conn, $clean);
	}
}
?>



<body id="registration">
  
  <div class="main">
    <div class="registration-form">

      <form class="def-modal-form" action="registration.php" method="POST">
        <div class="cancel-icon close-form"></div>
        <label for="registration-from" class="header"><h3>User Registration</h3></label>
        <?php
        	if(isset($_GET['msg'])) {
        		echo '<p class="form-error">'.$_GET['msg'].'</p>';
        	}
        ?> 
        <?php displayErrors($errors, 'fname'); ?>
        <input type="text" class="text-field first-name" name="fname" placeholder="Firstname">
       
       	<?php displayErrors($errors, 'lname');?> 
        <input type="text" class="text-field last-name" name="lname" placeholder="Lastname">
       
        <?php displayErrors($errors, 'email');?>
        <input type="email" class="text-field email" name="email" placeholder="Email">
        
        <?php displayErrors($errors, 'username');?>
        <input type="text" class="text-field username" name="username" placeholder="Username">
        
        <?php displayErrors($errors, 'password');?>
        <input type="password" class="text-field password" name="password" placeholder="Password">
        
        <?php displayErrors($errors, 'pword');?>
        <input type="password" class="text-field confirm-password" name="pword" placeholder="Confirm Password">
        <?php displayErrors($errors, 'pword');?>
        <input type="submit" class="def-button" name="register" value="Register">
        <p class="login-option">Have an account already? Login</p>
      </form>
    </div>
  </div>
  <!-- footer starts here-->
  
    <?php 
    	include 'includes/footer.php';
    ?>

</body>
