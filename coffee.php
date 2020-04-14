<?php

$dbhost = 'localhost';
$dbuser = 'coffee';
$dbpass = '123456789';
$dbname = 'coffee';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if(! $conn ){
	die('Could not connect: ' . mysqli_error());
}
?>