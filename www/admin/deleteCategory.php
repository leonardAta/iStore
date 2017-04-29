<?php 

	ob_start();
	session_start();

	$page_title = "Delete Category";

	#include functions
	include 'includes/functions.php';

	# load db connection
	include 'includes/db.php';	


	#include header
	include 'includes/header.php';

	
	#get request with id
	if(isset($_GET['Category_id'])) {
		$catID = $_GET['Category_id'];
	}

	#call delete function
	deleteCat($conn, $catID);

	#redirect 
	redirect('viewCategory.php', "");
	

?>


