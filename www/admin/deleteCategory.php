<?php 

	ob_start();
	session_start();

	$page_title = "Delete Category";

	#include functions
	include 'includes/functions.php';

	# load db connection
	include 'includes/db.php';	


	#include header
	include 'includes/dashboard_header.php';

	
	#get request with id
	if(isset($_GET['category_id'])) {
		$catID = $_GET['category_id'];
	}

	#call delete function
	deleteCategory($conn, $catID);

	#redirect 
	redirect('viewCategory.php', "");
	

?>


