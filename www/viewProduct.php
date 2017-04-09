<?php

# load db connection
	include 'includes/db.php';	
# include functions
	include 'includes/functions.php';

	#include header
	#include 'includes/header.php';
?>


<html>
<head>
	<title>View Product</title>
	<link rel="stylesheet" type="text/css" href="styles/styles.css">
</head>

<body>
	<section>
		<div class="mast">
			<h1>T<span>SSB</span></h1>
			<nav>
				<ul class="clearfix">
					<li><a href="category.php">CATEGORY</a></li>
					<li><a href="product.php"class="selected">PRODUCTS</a></li>
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
						<th>Book ID</th>
						<th>Title</th>
						<th>Author</th>
						<th>Price</th>
						<th>Year of Publication</th>
						<th>ISBN</th>
						
					</tr>

					<?php

						$stmt = $conn->prepare("SELECT * FROM Books");
						$stmt->execute();
						$viewProduct = viewProduct($stmt);
						echo $viewProduct;


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
