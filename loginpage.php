<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>HelpingHands.login</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="center">
  <h1>Login</h1>

  <?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email']; // Correct 'username' to 'name'
    $pword = $_POST['pass'];    // Correct 'password' to 'pass'

    // Connecting to the Database
    $servername = "localhost";
    $db_username = "root"; // Change variable name to avoid conflict
    $db_password = "";
    $database = "helpinghands";

    // Create a connection
    $conn = mysqli_connect($servername, $db_username, $db_password, $database); // Correct variable name
    // Die if connection was not successful
    if (!$conn) {
      die("Sorry we failed to connect: " . mysqli_connect_error());
    } else {
      // Submit these to a database
      // Sql query to be executed
      $sql = "INSERT INTO `login` (`email`, `pass`) VALUES ('$email', '$pword')";
      $result = mysqli_query($conn, $sql);

      if ($result) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong> Your entry has been submitted successfully!
            <span aria-hidden="true"></span>
          </button>
        </div>';
      } else {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Error!</strong> We are facing some technical issue and your entry was not submitted successfully! We regret the inconvenience caused!
         
            <span aria-hidden="true">×</span>
          </button>
        </div>';
      }
    }
  }
  ?>

  <form action="./loginpage.php" method="post"> <!-- Fix 'aaction' to 'action' -->
    <div class="txt_field">
      <input type="text" name="email" id="email" required>
      <span></span>
      <label for="email">Email</label>
    </div>

    <div class="txt_field">
      <input type="password" name="pass" id="pass" required>
      <span></span>
      <label for="pass">Password</label>
    </div>
    <div class="pass">Forgot Password?</div>
    <input type="submit" value="Login">
    <div class="signup_link">
      Not a member?
       <a href="http://localhost/ridehack/signup.php">Signup</a> 
     <br> <a  href="./code/landingpage.html"> HOME PAGE</a>
    </div>
  </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
