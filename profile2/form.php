<?php

// Include the connection file
include('connection.php');

// Check if the user has submitted the form
if (isset($_POST['submit'])) {

  // Get the form data
  $image = $_FILES['image']['name'];
  $district_name = $_POST['district_name'];
  $date_of_birth = $_POST['date_of_birth'];
  $education = $_POST['education'];
  $gender = $_POST['gender'];
  $description = $_POST['description'];

  // Check if the user has uploaded an image
  if ($image) {
    // Upload the image to the server.
    move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/' . $image);
  } else {
    // Display an error message.
    echo "Please upload an image.";
  }

  // Insert the data into the MySQL table
  $sql = "INSERT INTO crud_table (image, district_name, date_of_birth, education, gender, description) VALUES ('$image', '$district_name', '$date_of_birth', '$education', '$gender', '$description')";
  mysqli_query($conn, $sql);

  // Redirect the user to the index page.
  header('Location: index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Bootstrap CRUD Form</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<div class="container">

  <h1>Bootstrap CRUD Form</h1>

  <form action="form.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="image">Image</label>
      <input type="file" name="image" class="form-control">
    </div>
    <div class="form-group">
      <label for="district_name">District Name</label>
      <select class="form-control" name="district_name">
        <option value="">Select District</option>
        <option value="Dhaka">Dhaka</option>
        <option value="Chittagong">Chittagong</option>
        <option value="Khulna">Khulna</option>
        <option value="Rajshahi">Rajshahi</option>
        <option value="Sylhet">Sylhet</option>
        <option value="Barisal">Barisal</option>
        <option value="Rangpur">Rangpur</option>
        <option value="Mymensingh">Mymensingh</option>
        <option value="Jessore">Jessore</option>
        <option value="Comilla">Comilla</option>
      </select>  
    </div>
    <div class="form-group">
      <label for="date_of_birth">Date of Birth</label>
      <input type="date" name="date_of_birth" class="form-control">
    </div>
    <div class="form-group">
      <label for="education">Education</label>
      <input type="checkbox" name="education" value="SSC">SSC
      <input type="checkbox" name="education" value="HSC">HSC
      <input type="checkbox" name="education" value="BSE">BSE
      <input type="checkbox" name="education" value="BBA">BBA
    </div>
    <div class="form-group">
      <label for="gender">Gender</label>
      <input type="radio" name="gender" value="male">Male
      <input type="radio" name="gender" value="female">Female
    </div>
    <div class="form-group">
      <label for="description">Description</label>
      <textarea name="description" class="form-control"></textarea>
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  </form>

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
