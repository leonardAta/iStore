<?php

	include 'library.php';
	include 'result.php';


	$conn = new MYSQLConn();
	$stmt = $conn->prepare("SELECT * FROM Admin WHERE admin_id=:a ");
	$stmt->bindParam(":a", 3);
	$stmt->execute();

	while($row = $stmt->fetch(MYSQLResult::FETCH_ASSOC)){
		echo $row["firstname"]."<br/>";
	
	}





?>