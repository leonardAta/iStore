<?php

	ob_start();
	session_start();

	#include functions
	include 'includes/functions.php';

	#page title
	$page_title = "Edit Category";

	#include header
	include 'includes/dashboard_header.php';

	
	#include database
	include 'includes/db.php';

	if(isset($_GET['category_id'])) {
		$catID = $_GET['category_id'];
	}

	#use Data Access Object
	$item = getCategoryByID($conn, $catID);
	//print_r($item); exit();
	#track errors
	$errors = [];

	if(array_key_exists("edit", $_POST)) {
		if(empty($_POST["cat_name"])) {
			$errors["cat_name"] = "Please enter a category name";
		}

		if(empty($errors)) {
			$clean = array_map('trim', $_POST);
			$clean['cid'] = $catID;

			#do update
			updateCategory($conn, $clean);

			#redirect
			redirect("viewCategory.php", "");
		}
	}



?>
	<div class="wrapper">
		<div id="stream">	

			<h1>Edit Category</h1>
			<hr/>
			<form id="register" action="<?php echo 'editCategory.php?category_id='.$catID; ?>" method="POST">
				<div>

					<?php displayErrors("cat_name", $errors);?>
					<label>Category Name:</label>
					<input type="text" name="cat_name" placeholder="category name" value="<?php echo $item[1]; ?>"/>

				</div>
				<br/>

				<input type="submit" name="edit" value="edit">

			</form>



		</div>
	</div>

<?php
	
	#include footer
	include 'includes/footer.php';

?>
