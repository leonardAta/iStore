<?php
	ob_start();
	session_start();

	$page_title = "Add Category";
	# load db connection
	include 'includes/db.php';	

	# include functions
	include 'includes/functions.php';

	#include header
	include 'includes/header.php';


	#$Book_id = $_SESSION['Book_id'];
	$admin_id = 'admin_id';
	$firstname = 'firstname';

	$category_id = 'category_id';
	$category_name ='category_name';

	/*
	#insert data
	$stmt = $conn->prepare("INSERT INTO Category(category_id, category_name) VALUES(:ci, :cn)");

	#bind parameters
	$data = [
		':ci' => $input['category_id'],
		':cn' => $input['category_name']

	];

	$stmt->execute($data);
	

	/*addCategory($conn, $category_name);
*/
	$errors = [];
	
	if(array_key_exists('add', $_POST)) {
		if(empty($_POST['category_name'])) {
			$errors['category_name'] = "Enter Product Category Name";
		}
		if(empty($errors)) {
			//do database stuff
			#eliminate unwanted spaces
			$clean = array_map('trim', $_POST);
			$stmt = $conn->prepare("INSERT INTO Category(category_name) VALUES(:c)");
			$stmt->bindParam(':c', $clean['category_name']);
			$stmt->execute();

		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Add Category</title>
	<link rel="stylesheet" type="text/css" href="styles/styles.css">
</head>

<body>
<!--	<section>
		<div class="mast">
			<h1>T<span>SSB</span></h1>
			<hr/>
			<h1>C<span>ategory</span></h1>
			<nav>
				<ul class="mast">
					<li><a href="#" class="selected">Create</a></li>
					<li><a href="#"></a>Add</li>
					<li><a href="#"></a>Edit</li>
					<li><a href="#"></a>Delete</li>
					<li><a href="#"></a>View</li>
					<li><a href="#"></a>Logout</li>

				</ul>
			</nav>
		</div>
	</section> -->
	<form id="register" method="post" action="category.php">
		<input type="text" name="category_name" placeholder="Category Name">
		<input type="submit" name="add" value="add">
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
			include "includes/footer.php";
			?>
		</div>
	</section>
</body>
</html>
