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
						<th>Edit</th>
						<th>Delete</th>
						
					</tr>

					

				</thead>
				<tbody>
				<?php

						$viewProduct = viewProduct($conn);
						echo $viewProduct;

				?>
          		</tbody>

			</table>
		</div>
	</div>

<?php

	#include footer
	include 'includes/footer.php';
?>