<?php
	function doAdminRegister($dbconn, $input) {
		# hash the password
		$hash = password_hash($input['password'], PASSWORD_BCRYPT);

		# insert data
		$stmt = $dbconn->prepare("INSERT INTO Admin(firstname, lastname, email, hash) VALUES(:fn, :ln, :e, :h )");

		# bind parameters
		$data = [
			':fn' => $input['fname'],
			':ln' => $input['lname'],
			':e' => $input['email'],
			':h' => $hash

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

		if($count > 0) {
			$result = true;
		}

		return $result;

	}

	function displayErrors($show, $pass) {
		if(isset($show[$pass])) {
			echo '<span class="err">'.$show[$pass].'</span>';
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

				header('Location:category.php');
			}
			else {
				$error_login = "incorrect email and/or password";
				header("Location:login.php?error_login=$error_login");
			}
		} 
	}
/*
	function addCategory($conn, $add) {

		$stmt = $conn->prepare("INSERT INTO Category(category_name) VALUES(:c)");

		#bind params
		$stmt->bindParam(":c", $add['Category']);
		$category_name = 'category_name';
		
		$stmt->execute();
	}
	*/
	function viewCategory($view) {
		$result = "";
		while($return = $view->fetch(PDO::FETCH_ASSOC)) {
			$catID = $return['category_id'];
			$catName = $return['category_name'];

			$result .= '<tr><td>'.$return['category_id'].'</td>';
			$result .= '<td>'.$return['category_name'].'</td>';
			$result .= "<td><a href='viewCategory.php?action=edit&category_id=$catID&category_name=$catName'>edit </a></td>";
			$result .= "<td><a href='viewCategory.php?del=delete&category_id=$catID'>delete</a></td><tr>";
		}
		return $result;
	}
	function viewProduct($view) {
		$result = "";
		while($return = $view->fetch(PDO::FETCH_ASSOC)) {
			$bookID = $return['Book_id'];
			$title = $return['Title'];
			$author = $return['Author'];
			$price = $return['Price'];
			$year = $return['Year_of_Publication'];
			$isbn = $return['ISBN'];

			$result ="<tr>";
			$result .= "<td>".$return['Book_id']."</td><td>".$return['Title']."</td><td>".$return['Author']."</td><td>".$return['Price']."</td><td>".$return['Year_of_Publication']."</td><td>".$return['ISBN']."</td>";
			$result .= "</tr>";
		}
		return $result;
	}

	function deleteCat($conn, $all ) {
		$stmt = $conn->prepare("DELETE FROM Category WHERE Book_id= :c");
		$stmt->bindParam(":c", $all);
		$stmt->execute();
		redirect("viewCategory.php");
	}





