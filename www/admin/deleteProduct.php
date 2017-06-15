<?php 

	ob_start();
	session_start();

	$page_title = "Delete Product";

	#include functions
	include 'includes/functions.php';

	# load db connection
	include 'includes/db.php';	


	#include header
	include 'includes/dashboard_header.php';

	
	#get request with id
	if(isset($_GET['Book_id'])) {
		$bookID = $_GET['Book_id'];
	}

	#call delete function
	deleteProduct($conn, $bookID);

	#redirect 
	redirect('viewProduct.php', "");
	

?>


