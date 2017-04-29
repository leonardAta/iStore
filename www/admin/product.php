<?php
	ob_start();
	session_start();

	#add page title
	$page_title = "Add Product";

	# load db connection
	include 'includes/db.php';	

	# include functions
	include 'includes/functions.php';

	#include header
	include 'includes/dashboard_header.php';

	#track errors
	$errors = [];

	#max file size
	define("MAX_FILE_SIZE", "2097152");

	#permitted image extensions
	$ext = ["image/jpeg", "image/jpg", "image/png"];

	if(array_key_exists('add', $_POST)) {


		if(empty($_POST['Title'])) {
			$errors['Title'] = "Enter Title";
		}
		if(empty($_POST['Author'])) {
			$errors['Author'] = "Enter Author";
		}
	
		if(empty($_POST['Price'])) {
			$errors['Price'] = "Enter Price";
		}
		if(empty($_POST['Year_of_Publication'])) {
			$errors['Year_of_Publication'] = "Enter Year of Publication";
		}
		if(empty($_POST['ISBN'])) {
			$errors['ISBN'] = "Enter ISBN";
		}
	
		if(empty($_FILES['pic']['name'])) {
			$errors['pic'] = "Please select a file";
		}
		
		if($_FILES['pic']['size'] > MAX_FILE_SIZE) {
				$errors['pic'] = "File size exceeds maximum. max size: 2mb";
		}

		#check file format
		if(!in_array($_FILES['pic']['type'], $ext)) {
			$errors['pic'] = "File type not supported";
		}

		#upload files
		$check = doUpload($_FILES, 'pic', 'uploads/');

		if($check[0]) {
			$destination = $check[1];
		} else {
				$errors['pic'] = "File upload failed";
		}


		if(empty($errors)) {
			//do database stuff
			#eliminate unwanted spaces
			$clean = array_map('trim', $_POST);
			$stmt = $conn->prepare("INSERT INTO Books(Title, Author, Price, Year_of_Publication, ISBN, filepath) VALUES(:t, :a, :p, :y, :i, :f)");
	
			$data = [
					':t' => $clean['Title'],
					':a' => $clean['Author'],
				#	':cid' => $clean['category_id'],
					':p' => $clean['Price'],
					':y' => $clean['Year_of_Publication'],
					':i' => $clean['ISBN'],
					':f' => $destination


			];

			$stmt->execute($data);

		}
	}

?>



	<h1 id="register-label">Add Product</h1>
	<hr/>


	<form id="register" method="post" action="product.php" enctype="multipart/form-data">
	
	<div>			
		<?php displayErrors($errors, 'Title'); ?>
		<label>Book Title:</label>
		<input type="text" name="Title" placeholder="Book Title"/><br/>
	</div>

	<div>
		<?php displayErrors($errors, 'Author'); ?>
		<label>Author:</label>
		<input type="text" name="Author" placeholder="Author"/><br/>
	</div>
	
	<div>
		<?php displayErrors($errors, 'Price'); ?>	
		<label>Price:</label>
		<input type="text" name="Price" placeholder="Price"/><br/>
	</div>

	<div>
		<?php displayErrors($errors, 'Year_of_Publication'); ?>
		<label>Year:</label>
		<input type="text" name="Year_of_Publication" placeholder="Year of Publication"/><br/>
	</div>

	<div>
		<?php displayErrors($errors, 'ISBN'); ?>
		<label>ISBN:</label>
		<input type="text" name="ISBN" placeholder="ISBN"/><br/>
	</div>

	<div>
		<?php displayErrors($errors, 'pic'); ?>
		<label>Image:</label>
		<input type="file" name="pic"/><br/>
	</div>

<!--	<div>
		<label>Option:</label>
		<select>
			<option value="Trending" name="Trending">Trending</option>
			<option value="Top_Selling"name="Top_Selling">Top Selling</option>
	</div>		
		</select><br/>
-->
		<input type="submit" name="add" value="add"/>

	</form>
	<hr/>



<?php
	include 'includes/footer.php'; 
?>
