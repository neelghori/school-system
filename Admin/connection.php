<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "smss";
$conn = mysqli_connect($servername,$username,$password,$dbname);

if($conn)
{
	// echo "connection successfuly";

}
else
{
	echo 'not connected ';
	header("location:not_found.php");
	
}


?>