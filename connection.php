<?php
$servername = "localhost"; 
$username = "root";
$password = "1234"; 
$dbname = "clean_energy";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
?>