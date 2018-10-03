<?php

try {
	$conn = new PDO("mysql:dbname=coletas;host=localhost","root","");
} catch (PDOException $e) {
	echo "erro no banco ".$e->getMessage();
}

?>