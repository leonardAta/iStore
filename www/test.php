<?php
/*
define('DBNAME', 'iBook');
define('DBUSER', 'root');
define('DBPASS', 'THINKandflyy');




try {
	#prepare a PDO instance
	$conn = new PDO('mysql:host=localhost;dbname='.DBNAME, DBUSER, DBPASS);

	#set verbose error modes
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);

} catch(PDOException $e) {
	echo $e->getMessage();
}
*/

#max file size
define("MAX-FILE-SIZE", "2097152");

#allowed extension
$ext = ["image/jpg", "image/jpeg", "image/png"];

if(array_key_exists('save', $_POST)) {
	$errors = [];
	#to be sure a file was selected..
	#print_r($_FILES);
	if(empty($_FILES['pic']['name'])) {
		$errors[] = "please choose a file";
	}

	#check file size
	if($_FILES['pic']['size'] > 2097152) {
		$errors[] = "file size exceeds maximum. maximum: ". MAX_FILE_SIZE;
	}

	#check extensions
	if(!in_array($_FILES['pic']['type'], $ext)) {
		$errors[] = "invalid file type";
	}

	#generate random number to append
	$rnd = rand(0000000000, 9999999999);

	#strip filename for spaces
	$strip_name = str_replace(" ", "_", $_FILES['pic']['name']);

	$filename = $rnd.$strip_name;
	$destination = 'uploads/'.$filename;
	print_r($destination);

	if(!copy($_FILES['pic']['tmp_name'], 'uploads/'.$filename)) {
		$errors[] = "file upload failed";
	}


	if(empty($errors)) {
		echo "done";
	} else {
		foreach($errors as $err) {
			echo $err. '</br>';
		}
	}
}


?>


<form id="register" method="POST" enctype="multipart/form-data">
	<p>please upload a file</p>
	<input type="file" name="pic">

	<input type="submit" name="save">
</form>

