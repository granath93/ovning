<?php

$mysqli = new mysqli('localhost', 'root', '', 'ovning'); // (HOST, USER, PASSWORD, DATABASE) 

if(mysqli_connect_error()){
	echo "Kontakten misslyckades: " . mysqli_connect_error() . "<br>";
	exit();
}

$mysqli->set_charset("utf8");
?>