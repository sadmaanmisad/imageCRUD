<?php

// Database connection information
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crud_db";

// Create a connection to the database
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn === false) {
  die("Connection failed: " . mysqli_connect_error());
}

?>
