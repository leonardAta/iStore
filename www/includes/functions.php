<?php
	function doAdminRegister($dbconn, $input) {
		# hash the password
		$hash = password_hash($input['password'], PASSWORD_BCRYPT);

		# insert data
		$stmt = $dbconn->prepare("INSERT INTO Admin(firstname, lastname, email, hash) VALUES(:fn, :ln, :e, :h )");

		#bind parameters
		$data = [
			':fn' => $input['fname'],
			':ln' => $input['lname'],
			':e' => $input['email'],
			':h' => $hash

		];

		$stmt ->execute($data);

	}