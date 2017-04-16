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



?>