<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
    <style>
  .container {
    margin: 0 auto;
    width: 75%;
  }
</style>
</head>

<div class="container">
<a href="form.php" class="btn btn-success mb-3">Add New</a>
<?php

// Include the connection file
include('connection.php');

// Get all the data from the MySQL table
$sql = "SELECT * FROM crud_table";
$result = mysqli_query($conn, $sql);

// Check if the query was successful
if ($result === false) {
  die("Query failed: " . mysqli_error($conn));
}

// Create a table to display the data
echo "<table border='3' class='table table-striped'>";
echo "<tr>";
echo "<th>Image</th>";
echo "<th>District Name</th>";
echo "<th>Date of Birth</th>";
echo "<th>Education</th>";
echo "<th>Gender</th>";
echo "<th>Description</th>";
echo "<th>Delete</th>";
echo "<th>Update</th>";
echo "</tr>";

// Loop through the results and display the data
while ($row = mysqli_fetch_assoc($result)) {
  echo "<tr>";
  echo "<td><img src='uploads/" . $row['image'] . "' width='100'></td>";
  echo "<td>" . $row['district_name'] . "</td>";
  echo "<td>" . $row['date_of_birth'] . "</td>";
  echo "<td>" . $row['education'] . "</td>";
  echo "<td>" . $row['gender'] . "</td>";
  echo "<td>" . $row['description'] . "</td>";

  // Delete function
  echo "<td><a href='delete.php?id=" . $row['id'] . "' class='btn btn-danger'>Delete</a></td>";

  // Update function
  echo "<td><a href='update.php?id=" . $row['id'] . "' class='btn btn-primary'>Update</a></td>";

  echo "</tr>";
}

// Close the table
echo "</table>";

// Close the connection
mysqli_close($conn);

?>

</div>


</body>
</html>
