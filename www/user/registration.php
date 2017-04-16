<?php

#include title
$page_title = "Registration";

#load db connection
include 'includes/database.php';

#include header
#include 'includes/header.php';

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
	if($_POST["password"] != $_POST["pword"])
}
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="style/styles.css">
    <title>Registration</title>
</head>

    <title><?php echo $page_title; ?></title>

<body id="registration">
  <!-- DO NOT TAMPER WITH CLASS NAMES! -->

  <!-- top bar starts here -->
  <div class="top-bar">
    <div class="top-nav">
      <a href="index.html"><h3 class="brand"><span>B</span>rain<span>F</span>ood</h3></a>
      <ul class="top-nav-list">
        <li class="top-nav-listItem Home"><a href="index.html">Home</a></li>
        <li class="top-nav-listItem catalogue"><a href="catalogue.html">Catalogue</a></li>
        <li class="top-nav-listItem login"><a href="login.html">Login</a></li>
        <li class="top-nav-listItem register"><a href="registration.php">Register</a></li>
        <li class="top-nav-listItem cart">
          <div class="cart-item-indicator">
            <p>12</p>
          </div>
          <a href="cart.html">Cart</a>
        </li>
      </ul>
      <form class="search-brainfood">
        <input type="text" class="text-field" placeholder="Search all books">
      </form>
    </div>
  </div>
  <!-- main content starts here -->
  <div class="main">
    <div class="registration-form">
      <form class="def-modal-form">
        <div class="cancel-icon close-form"></div>
        <label for="registration-from" class="header"><h3>User Registration</h3></label>
        <input type="text" class="text-field first-name" name="fname" placeholder="Firstname">
        <input type="text" class="text-field last-name" name="lname" placeholder="Lastname">
        <input type="email" class="text-field email" name="email" placeholder="Email">
        <input type="text" class="text-field username" name="username" placeholder="Username">
        <input type="password" class="text-field password" name="password" placeholder="Password">
        <input type="password" class="text-field confirm-password" name="pword" placeholder="Confirm Password">
        <input type="submit" class="def-button" value="register">
        <p class="login-option">Have an account already? Login</p>
      </form>
    </div>
  </div>
  <!-- footer starts here-->
  <div class="footer">
    <p class="copyright">&copy; copyright 2016</p>
  </div>
</body>
</html>
