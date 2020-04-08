<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "whitelakeinformationmanagementsystem";
/*$servername = "localhost";
$username = "root";
$password = "";
$dbname = "whitelake";
*/
//create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//check connection
if ($conn->connect_error){
	die("connection failed: ". $conn->connect_error);
}

?>