<?php

$sname= "localhost";
$unmae= "root";
$password = "";

// $db_name = "test_db";
$db_name = "myquestans";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}