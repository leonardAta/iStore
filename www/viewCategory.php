<?php

# load db connection
	include 'includes/db.php';	
# include functions
	include 'includes/functions.php';

	#include header
	include 'includes/header.php';
?>


<html>
<head>
	<title>View iBook</title>
	<link rel="stylesheet" type="text/css" href="styles/styles.css">
</head>

<body>
	<section>
		<div class="mast">
			<h1>T<span>SSB</span></h1>
			<nav>
				<ul class="clearfix">
					<li><a href="category.php" class="selected">CATEGORY</a></li>
					<li><a href="product.php">PRODUCTS</a></li>
					<li><a href="#">logout</a></li>
				</ul>
			</nav>
		</div>
	</section>
	<div class="wrapper">
		<div id="stream">
			<table id="tab">
				<thead>
					<tr>
						<th>Category ID</th>
						<th>Category Name</th>
						<th>Edit</th>
						<th>Delete</th>
						
					</tr>

					<?php

						$stmt = $conn->prepare("SELECT * FROM Category");
						$stmt->execute();
						$viewCat = viewCategory($stmt);
						echo $viewCat;


					?>
				</thead>
			<!--	<tbody>
					<tr>
						<td>the knowledge gap</td>
						<td>maja</td>
						<td>January, 10</td>
						<td><a href="#">edit</a></td>
						<td><a href="#">delete</a></td>
					</tr>
          		</tbody> -->
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
