<?php

define('DBNAME', 'iBook');
define('DBUSER', 'root');
define('DBPASS', 'root');


$pdo = new PDO ('mysql:host=localhost;dbname='.DBNAME, DBUSER, DBPASS);


?>
<?php
echo "Awesome";
?>