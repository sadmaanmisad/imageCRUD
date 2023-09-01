<?php

// Include the connection file
include('connection.php');

// Get the id of the record to be deleted
$id = $_GET['id'];

// Delete the record from the MySQL table
$sql = "DELETE FROM crud_table WHERE id=$id";
mysqli_query($conn, $sql);

// Redirect the user to the index page
header('Location: index.php');

?>
