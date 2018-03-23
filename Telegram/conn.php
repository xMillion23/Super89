<?php
   ini_set('error_reporting', E_ALL);
$servername = "localhost";
$username = "root";
$password = "asd12345";
$dbname = "bot";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>