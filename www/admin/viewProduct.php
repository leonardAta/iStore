<?php
	ob_start();
	session_start();

	$page_title = "View Product";

	#load db connection
	include 'includes/db.php';	
	
	#include functions
	include 'includes/functions.php';

	#include header
	include 'includes/dashboard_header.php';
?>


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

					

				</thead>
				<tbody>
				<?php

						$stmt = $conn->prepare("SELECT * FROM Books");
						$stmt->execute();
						$viewProduct = viewProduct($stmt);
						echo $viewProduct;


					?>
          		</tbody>

			</table>
		</div>

		<div class="paginated">
			<a href="product.php">Add Products</a>
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
