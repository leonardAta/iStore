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