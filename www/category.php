<?php
	ob_start();
	session_start();

	#$Book_id = $_SESSION['Book_id'];
	$admin_id = $_SESSION['admin_id'];
	$firstname = $_SESSION['firstname'];

	$category_id = $_SESSION['category_id'];
	$catgory_name = $_SESSION['category_name'];

	#insert data
	$link = $dbconn->prepare("INSERT INTO Category(category_id, category_name) VALUES(:ci, :cn)");

	#bind parameters
	$data = [
		':ci' => $input['category_id'];
		':cn' => $input['category_name'];

	]


?>


<!DOCTYPE html>
<html>
<head>
	<title>Category</title>
	<link rel="stylesheet" type="text/css" href="styles/styles.css">
</head>

<body>
	<section>
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
	</section>
	<div class="wrapper">
		<div id="stream">
			<table id="tab">
				<thead>
					<tr>
						<th>post title</th>
						<th>post author</th>
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
			</table>
		</div>

		<div class="paginated">
			<a href="#">1</a>
			<a href="#">2</a>
			<span>3</span>
			<a href="#">2</a>
		</div>
	</div>

	<section class="foot">
		<div>
			<p>&copy; 2016;
		</div>
	</section>
</body>
</html>
