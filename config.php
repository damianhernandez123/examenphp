<?php
	$servername = "127.0.0.1";
	$username = "root";
	$password = "1q2w3e!Q";
	$dbname = "mysql";
	

$link = mysqli_connect($servername, $username, $password, $dbname);
 

if($link === false){
    die("ERROR: no se puede conectar. " . mysqli_connect_error());
}
?>