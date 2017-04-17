<?php

function registerAdmin($dbconn, $input) {
	#hash password
	$hash = password_hash($input['password'], PASSWORD_BCRYPT);

	#insert data
	$stmt = $dbconn->prepare("INSERT INTO User(fname, lname, email, username, hash) VALUES(:f, :l, :e, :u, :h)");

	#bind paramters
	$data = [
		':f' => $input['fname'],
		':l' => $input['lname'],
		':e' => $input['email'],
		':u' => $input['username'],
		':h' => $hash

	];
	$stmt->execute($data);

}

function displayErrors($show, $pass) {
	if(isset($show[$pass])) {
		echo '<span class="err">'.$show[$pass].'</span>';
		return true;
	}
}

function userLogin($dbconn, $enter) {
	$result = [];
	#insert data
	$stmt = $dbconn->prepare("SELECT * FROM User WHERE email = :e");

	#bind parameters
	$stmt->bindParam(":e", $enter['email']);
	$stmt->execute();

	$count = $stmt->rowCount();
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	/*
	if($count == 1) {
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		if(password_verify($enter['password'], $row['hash'])) {
			$_SESSION['id'] = $row['User'];
			$_SESSION['email'] = $row['email'];

			header("Location:index.php");
		} else {
			$error_login = "Incorrect email and/or password";
			header("Location:userLogin.php?error_login=$error_login");
		}
	} */
	if($count !== 1 || password_verify($enter['password'], $row['hash'])) {
		$result[] = false;

	} else {
		$result[] = true;
		$result[] = $row;
	}
		return $result;
}

?>