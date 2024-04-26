<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>HelpingHands.signup</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="center">
  <h1>Sign up</h1>

  <?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['name'];
    $email = $_POST['email'];
    $pword = $_POST['pass'];

    // Connecting to the Database
    $servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $database = "helpinghands";

    // Create a connection
    $conn = mysqli_connect($servername, $db_username, $db_password, $database);
    // Die if connection was not successful
    if (!$conn) {
      die("Sorry we failed to connect: " . mysqli_connect_error());
    } else {
      // Check if the email already exists
      $check_query = "SELECT * FROM `signups` WHERE `email`='$email'";
      $check_result = mysqli_query($conn, $check_query);
      if(mysqli_num_rows($check_result) > 0) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Error!</strong> This email is already registered. Please choose a different email.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
      } else {
        // Insert new user into the database
        $insert_query = "INSERT INTO `signups` (`name`, `email`, `pass`) VALUES ('$username', '$email', '$pword')";
        $insert_result = mysqli_query($conn, $insert_query);
        if ($insert_result) {
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your account has been created successfully!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        } else {
          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> We are facing some technical issue and your account was not created. Please try again later.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
      }
    }
  }
  ?>

  <form action="./signup.php" method="post">
    <div class="txt_field">
      <input type="text" name="name" id="name" required>
      <span></span>
      <label for="name">User name</label>
    </div>

    <div class="txt_field">
      <input type="email" name="email" id="email" required>
      <span></span>
      <label for="email">Email</label>
    </div>

    <div class="txt_field">
      <input type="password" name="pass" id="pass" required>
      <span></span>
      <label for="pass">Password</label>
    </div>
    <input type="submit" value="Sign up">

    <div class="signup_link">
      <a href="./code/helperVerfiy.html">Helper Verification</a>
      <br>
    <a href="./code/landingpage.html">HOME PAGE</a>
      Thank you! &hearts;
    </div>
  </form>


</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
