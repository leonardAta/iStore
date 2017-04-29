<?php
	ob_start();
	session_start();
	$page_title = "Add Product";
	# load db connection
	include 'includes/db.php';	

	# include functions
	include 'includes/functions.php';

	#include header
	include 'includes/dashboard_header.php';


	$errors = [];


	if(array_key_exists('add', $_POST)) {

		#max file size
		define("MAX_FILE_SIZE", "2097152");
		$ext = ["image/jpeg", "image/jpg", "image/png"];

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
		
			$errors['pic'] = "File size exceeds maximum. maximum".MAX_FILE_SIZE;
		}
		if(!in_array($_FILES['pic']['type'], $ext)) {
			$errors['pic'] = "Invalid file type";
		}

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
			#		':ci' => $clean['Category_id'],
					':p' => $clean['Price'],
					':y' => $clean['Year_of_Publication'],
					':i' => $clean['ISBN'],
					':f' => $destination


			];

			$stmt->execute($data);

		}
	}

?>





<body>

	<form id="register" method="post" action="product.php" enctype="multipart/form-data">
		<h1>Add Product</h1>
		<hr/>

		<label>Book Title:</label>
		<input type="text" name="Title" placeholder="Book Title"/><br/>

		<label>Author:</label>
		<input type="text" name="Author" placeholder="Author"/><br/>
	<!--	<input type="text" name="Category_id" placeholder="Category ID"> -->
		
		<label>Price:</label>
		<input type="text" name="Price" placeholder="Price"/><br/>

		<label>Year of Publication:</label>
		<input type="text" name="Year_of_Publication" placeholder="Year of Publication"/><br/>

		<label>ISBN:</label>
		<input type="text" name="ISBN" placeholder="ISBN"/><br/>

		<label>Image:</label>
		<input type="file" name="pic"/><br/>

		<label>Option:</label>
		<select>
			<option value="Trending" name="Trending">Trending</option>
			<option value="Top_Selling"name="Top_Selling">Top Selling</option>
			
		</select><br/>
		<input type="submit" name="add" value="add"/>
	</form>
	<hr/>
	<div class="wrapper">
		<div id="stream">


<?php
	include 'includes/footer.php'; 
?>
