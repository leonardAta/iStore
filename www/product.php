<?php
	ob_start();
	session_start();
	$page_title = "Add Product";
	# load db connection
	include 'includes/db.php';	

	# include functions
	include 'includes/functions.php';

	#include header
	include 'includes/header.php';


	$errors = [];


	if(array_key_exists('add', $_POST)) {

		#max file size
	#	define("MAX_FILE_SIZE", "2097152");
	#	$ext = ["image/jpeg", "image/jpeg", "image/png"];

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
		#if(empty($_FILES['pic']['name'])) {
		#	$errors['pic'] = "Please select a file";
		#}
		#if($_FILES['pic']['size'] > MAX_FILE_SIZE) {
		#	$errors['pic'] = "File size exceeds maximum. maximum".MAX_FILE_SIZE;
		#}
		#if(!in_array($_FILES['pic']['type'], $ext)) {
		#	$errors['pic'] = "Invalid file type";
		#}

		#	$check = doUpload($_FILES, 'pic', 'uploads/');
		#	if($check[0]) {
		#		$destination = $check[1];
		#	} else {
		#		$errors['pic'] = "File upload failed";
		#	}


		if(empty($errors)) {
			//do database stuff
			#eliminate unwanted spaces
			$clean = array_map('trim', $_POST);
			$stmt = $conn->prepare("INSERT INTO Books(Title, Author, Price, Year_of_Publication, ISBN) VALUES(:t, :a, :p, :y, :i)");
			#$stmt->bindParam(':t',':a', ':ci', ':p', ':y', ':i') $clean['Title', 'Author', 'Category_id', 'Price', 'Year_of_Publication', 'ISBN']);
			$data = [
					':t' => $clean['Title'],
					':a' => $clean['Author'],
			#		':ci' => $clean['Category_id'],
					':p' => $clean['Price'],
					':y' => $clean['Year_of_Publication'],
					':i' => $clean['ISBN']
					#':f' => $destination


			];
			$stmt->execute($data);

		}
	}

?>



<html>
<head>
	<title><?echo $page_title ?></title>
	<link rel="stylesheet" type="text/css" href="styles/styles.css">
</head>

<body>

	<form id="register" method="post" action="product.php">
		<input type="text" name="Title" placeholder="Book Title"/>
		<input type="text" name="Author" placeholder="Author"/>
	<!--	<input type="text" name="Category_id" placeholder="Category ID"> -->
		<input type="text" name="Price" placeholder="Price"/>
		<input type="text" name="Year_of_Publication" placeholder="Year of Publication"/>
		<input type="text" name="ISBN" placeholder="ISBN"/>
	<!--	<input type="file" name="pic"/> -->
		<input type="submit" name="add" value="add"/>
	</form>
	<hr/>
	<div class="wrapper">
		<div id="stream">
		<!--	<table id="tab">
				<thead>
					<tr>
						<th>title</th>
						<th>author</th>
						<th>date created</th>
						<th>edit</th>
						<th>delete</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>the knowledge gap</td>
						<td>maja</td>
						<td>January, 10</td>
						<td><a href="#">edit</a></td>
						<td><a href="#">delete</a></td>
					</tr>
          		</tbody>
			</table>	-->
		</div>

	<!--	<div class="paginated">
			<a href="#">1</a>
			<a href="#">2</a>
			<span>3</span>
			<a href="#">2</a>
		</div>
	</div>	-->

	<section class="foot">
		<div>
			<?php
			include 'includes/footer.php'; 
			?>
		</div>
	</section>
</body>
</html>
