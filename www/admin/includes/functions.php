<?php

	function checkLogin() {
		if(!isset($_SESSION['admin_id'])) {
			redirect("login.php", "");
		}
	}


	function doAdminRegister($dbconn, $input) {
		# insert data
		$stmt = $dbconn->prepare("INSERT INTO Admin(firstname, lastname, email, hash) VALUES(:fn, :ln, :e, :h )");

		# bind parameters
		$data = [
			':fn' => $input['fname'],
			':ln' => $input['lname'],
			':e' => $input['email'],
			':h' => $input['password']

		];

		$stmt ->execute($data);

	}

	function doesEmailExist($dbconn, $email) {
		$result = true;
		$stmt = $dbconn->prepare("SELECT email FROM Admin WHERE email=:e");

		# bind parameters
		$stmt->bindParam(":e", $email);
		$stmt->execute();

		# get number of rows returned
		$count = $stmt->rowCount();

		if($count > 0) { $result = true; }

		return $result;

	}

	function displayErrors($array, $key) {
		if(isset($array[$key])) {
			echo '<span class="err">'.$array[$key].'</span>';
			return true;
		}
	}

	function doAdminLogin($dbconn, $enter) {
		#insert data
		$statement = $dbconn->prepare("SELECT * FROM Admin where email=:e");

		#bind parameters
		$statement->bindParam(":e", $enter['email']);
		$statement->execute();

		$count = $statement->rowCount();
		

		if($count == 1) {
			$row = $statement->fetch(PDO::FETCH_ASSOC);
			if(password_verify($enter['password'], $row['hash'])) {
				$_SESSION['id'] = $row['Admin'];
				$_SESSION['email'] = $row['email'];

				header('Location:viewcategory.php');
			}
			else {
				$error_login = "incorrect email and/or password";
				header("Location:login.php?error_login=$error_login");
			}
		} 
	}

	function redirect($loc, $msg) {
		header("Location: ".$loc.$msg);
	}


	function addCategory($dbconn, $add) {
		$stmt = $dbconn->prepare("INSERT INTO Category(category_name) VALUES(:c)");
		$stmt->bindParam(":c", $add['category_name']);

		$stmt->execute();
	}

	function fetchCategory($dbconn) {
		$result = "";

		$stmt = $dbconn->prepare("SELECT * FROM Category");
		$stmt->execute();

		return $result;
	}

	function viewCategory($view) {
		$result = "";
		while($return = $view->fetch(PDO::FETCH_ASSOC)) {
			$catID = $return['category_id'];
			$catName = $return['category_name'];

			$result .= '<tr><td>'.$return['category_id'].'</td>';
			$result .= '<td>'.$return['category_name'].'</td>';
			$result .= '<td><a href="editCategory.php?category_id='.$return['category_id'].'">edit</a></td>';
			$result .= '<td><a href="deleteCategory.php?category_id='.$return['category_id'].'">delete</a></td></tr>';
		}
		return $result;
	}

	function getCategoryByID($dbconn, $cat_id) {

		$stmt = $dbconn->prepare("SELECT * FROM Category WHERE category_id=:cid");
		$stmt->bindParam(":cid", $cat_id);
		$stmt->execute();

		$row = $stmt->fetch(PDO::FETCH_BOTH);

		return $row;

	}

	function updateCategory($dbconn, $input) {
		$stmt = $dbconn->prepare("UPDATE Category SET category_name=:name WHERE category_id=:catid");

		$data = [
					":name"=>$input['cat_name'],
					":catid"=>$input['cid']


		];
		$stmt->execute($data);
	}


	function viewProduct($dbconn) {
		$result = "";

		$stmt = $dbconn->prepare("SELECT * FROM Books");
		$stmt->execute();

		while($return = $stmt->fetch(PDO::FETCH_BOTH)) {
				$bookID = $return['Book_id'];
				$title = $return['Title'];
				$author = $return['Author'];
				$price = $return['Price'];
				$year = $return['Year_of_Publication'];
				$isbn = $return['ISBN'];

				$result ="<tr>";
				$result .= "<td>".$return['Book_id']."</td><td>".$return['Title']."</td>
							<td>".$return['Author']."</td><td>".$return['Price']."</td>
							<td>".$return['Year_of_Publication']."</td><td>".$return['ISBN']."</td>";
				$result .='<td><a href="editProduct.php?category_id='.$return[0].'">edit</a></td>';
				$result .='<td><a href="deleteProduct.php?category_id='.$return[0].'">delete</a></td></tr>';			
				$result .= "</tr>";
		}
		return $result;
	}

	function deleteCategory($dbconn, $catid) {
		$stmt = $dbconn->prepare("DELETE FROM Category WHERE category_id=:cid");
		$stmt->bindParam(":cid", $catid);

		$stmt->execute();

	}

	function doUpload($files, $names, $uploadir) {
		$data = [];
		$rnd = rand(0000000000, 9999999999);

	$strip_name = str_replace(" ", "_", $files[$names]['name']);
	$filename = $rnd.$strip_name;
	$destination = $uploadir.$filename;

	if(!move_uploaded_file($files[$names]['tmp_name'], $destination)) {
		$data[] = false;
	} else {
		$data[] = true;
		$data[] = $destination;
	}
		return $data;
	}

	function getProductByID($dbconn, $pid) {
		$stmt = $dbconn->prepare("SELECT * FROM Books WHERE Book_id=:bid");
		$stmt->bindParam(":bid", $pid);

		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_BOTH);

		return $row;




	}




