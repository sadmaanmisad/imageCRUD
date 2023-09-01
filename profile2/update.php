<?php 
include "connection.php";
$id = $_GET['id'];

if(isset($_POST['submit'])){
    // Get the data from the form
  $image = $_FILES['image']['name'];
  $district_name = $_POST['district_name'];
  $date_of_birth = $_POST['date_of_birth'];
  $education = $_POST['education'];
  $gender = $_POST['gender'];
  $description = $_POST['description'];

    // Update the record in the MySQL table
  $sql = "UPDATE crud_table SET image='$image', district_name='$district_name', date_of_birth='$date_of_birth', education='$education', gender='$gender', description='$description' WHERE id=$id";
  mysqli_query($conn, $sql);

  $result = mysqli_query($conn, $sql);
    if($result) {
  // Redirect the user to the index page
  header('Location: index.php');
    }
    else{
        echo "Failed:" .mysqli_error($conn);
    }
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
  <?php
            $sql ="SELECT * FROM `crud_table` WHERE id = $id LIMIT 1";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc( $result);
            ?>
  <form action="form.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="image">Image</label>
      <input type="file" name="image" class="form-control"value="<?php echo $row['first_name'] ?>">
    </div>
    <div class="form-group">
      <label for="district_name">District Name</label>
      <select class="form-control" name="district_name">
        <option value="<?php echo $row['district_name'] ?>">Select District</option>
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
      <input type="date" name="date_of_birth" class="form-control"value="<?php echo $row['district_name'] ?>">
    </div>

    <div class="form-group">
      <label for="education">Education</label>
      <input type="checkbox" name="education" value="SSC"<?php if (isset($row)) {  echo $row['education'] == 'SSC' ? 'checked' : '';} else {  echo '';} ?>>SSC
      <input type="checkbox" name="education" value="HSC"<?php if (isset($row)) {  echo $row['education'] == 'HSC' ? 'checked' : '';} else {  echo '';} ?>>HSC
      <input type="checkbox" name="education" value="BSE"<?php if (isset($row)) {  echo $row['education'] == 'BSE' ? 'checked' : '';} else {  echo '';} ?>>BSE
      <input type="checkbox" name="education" value="BBA"<?php if (isset($row)) {  echo $row['education'] == 'BBA' ? 'checked' : '';} else {  echo '';} ?>>BBA
    </div>


    <div class="form-group">
      <label for="gender">Gender</label>
      <input type="radio" name="gender" value="male"<?php if (isset($row)) {
  echo $row['gender'] == 'male' ? 'checked' : '';
} else {
  echo '';
}
 ?>>Male
      <input type="radio" name="gender" value="female"<?php if (isset($row)) {
  echo $row['gender'] == 'Female' ? 'checked' : '';
} else {
  echo '';
}
 ?>>Female
    </div>


    <div class="form-group">
      <label for="description">Description</label>
      <textarea name="description" class="form-control"value="<?php echo $row['last_name'] ?>"></textarea>
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  </form>

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
