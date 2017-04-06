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






