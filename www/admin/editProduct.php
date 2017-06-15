<?php
	ob_start();
	session_start();

	# include functions
	include 'includes/functions.php';

	#add page title
	$page_title = "Edit Product";

	# load db connection
	include 'includes/db.php';	

	#include header
	include 'includes/dashboard_header.php';

	#query string incoming request
	if(isset($_GET['Book_id'])) {
		$bookID = $_GET['Book_id'];
	}

	#get a product object
	$item = getProductByID($conn, $bookID);

	#get item category
	$category = getCategoryByID($conn, $item['Category_id']);

	#track errors
	$errors = [];



	

?>

<div class="wrapper">
	<div id="stream">

			<h1 id="register-label">Edit Product</h1>
			<hr/>


			<form id="register" method="post" action="editproduct.php" enctype="multipart/form-data">
			
			<div>			
				<?php displayErrors($errors, 'Title'); ?>
				<label>Book Title:</label>
				<input type="text" name="Title" placeholder="Book Title" value="<?php echo $item['Title'];?>"/><br/>
			</div>

			<div>
				<?php displayErrors($errors, 'Author'); ?>
				<label>Author:</label>
				<input type="text" name="Author" placeholder="Author" value="<?php echo $item['Author'];?>"/><br/>
			</div>
			
			<div>
				<?php displayErrors($errors, 'Price'); ?>	
				<label>Price:</label>
				<input type="text" name="Price" placeholder="Price" value="<?php echo $item['Price'];?>"/><br/>
			</div>

			<div>
				<?php displayErrors($errors, 'Year_of_Publication'); ?>
				<label>Year:</label>
				<input type="text" name="Year_of_Publication" placeholder="Year of Publication" value="<?php echo $item['Year_of_Publication'];?>"/><br/>
			</div>

			<div>
				<?php displayErrors($errors, 'ISBN'); ?>
				<label>ISBN:</label>
				<input type="text" name="ISBN" placeholder="ISBN" value="<?php echo $item['ISBN'];?>"/><br/>
			</div>

			<div>
				<label>Select Category:</label>
				<select>
					<option><?php echo $category['Category_name']; ?></option>

					<?php 

					/*	fetchCategory($conn, $category['Category_name'], function($stmt, $val) {
							$result = "";

							while($row = $stmt->fetch(PDO::FETCH_BOTH)) {

								if($row['Category_name'] == $val)
									continue;

								$result .= '<option value="'.$row[0].'">'.$row[1].'</option>';
							}

							echo $result;
						});
					*/
					
					$choose = fetchCategory($conn, $cat_name['Category_name']);

					echo $choose;

					?>

				</select>
			</div>


				<input type="submit" name="" value="edit"/>

			</form>

				</div>

				<h4 class="jumpto">Upload a new image? <a href="editimage.php">image</a></h4>
			</div>

	</div>
</div>			
	<hr/>



<?php
	include 'includes/footer.php'; 
?>
