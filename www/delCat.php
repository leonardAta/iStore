<?php 
	ob_start();
	session_start();

	# load db connection
	include 'includes/db.php';	

	# include functions
	include 'includes/functions.php';

	#include header
	include 'includes/header.php';

	#include page title
	$page_title = "Delete Category";

	if(isset($_GET['category_id'])) {
		deleteCat($conn, $_GET['category_id']);
	}
	

?>