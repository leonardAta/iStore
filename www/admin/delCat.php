<?php 
	ob_start();
	session_start();

	$page_title = "Delete Category";
	# load db connection
	include 'includes/db.php';	

	# include functions
	include 'includes/functions.php';

	#include header
	include 'includes/header.php';

	

	if(isset($_GET['category_id'])) {
		deleteCat($conn, $_GET['category_id']);
	}
	
include 'includes/footer.php';
?>