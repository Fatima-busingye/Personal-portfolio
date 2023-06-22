<?php
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $UserName = mysqli_real_escape_string($conn, $_POST['UserName']);
    $Email = mysqli_real_escape_string($conn, $_POST['Email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $Password = mysqli_real_escape_string($conn, $_POST['Password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);
    
    if ($Password !== $confirm_password) {
      echo "Passwords do not match";
      exit();
    }
    
    // Connect to the database
    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "login-db";
    
    $conn = mysqli_connect($host, $user, $pass, $dbname);
    
    if (!$conn) {
      echo "Error connecting to database: " . mysqli_connect_error();
      exit();
    }
    
    // Hash the password before inserting it into the database
    $hashed_password = password_hash($Password, PASSWORD_DEFAULT);
    
    // Insert the new user into the database
    $sql = "INSERT INTO users (UserName, Email, phone, Password) VALUES ('$UserName', '$Email', '$phone', '$hashed_password')";
    
    if (mysqli_query($conn, $sql)) {
      echo "New user created successfully";
    } else {
      echo "Error creating user: " . mysqli_error($conn);
    }
    
    mysqli_close($conn);
  }
?>          
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
    <meta http-equiv="X-UA-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width", initial-scale="1.0">
    <title>Sign In</title>
    <!--Link To CSS-->
    <link rel="stylesheet" href="style.css">
    <!--Box Icons-->
    <link rel="stylesheet"
    href="http;//cdn.jsdelivr.net/nmp/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"/>

</head>
<body>
    <!--navbar-->
    <header>
        <div class="nav container">
            <!--logo-->
            <a href="index.html" class="logo"><i class="bx bx-home"></i>fatie rentals</a>

            <!--Login Button-->
            <a href="login.php" class="btn">login</a>
        </div>
    </header> 
    <!--sign up-->
    <div class="login">
      <div class="login-container">
        <h2>WELCOME</h2>
        <p>Already have account<a href="login.php"> login</a></p>
        <!--login form-->
        <form action="login.php" method="POST">
          <span>UserName</span>
          <input type="text" id=""placeholder="UserName"  name="UserName"required>
          <span>Enter Your Email Address</span>
          <input type="Email" id="Email"placeholder="your mail@gmail.com" name="Email" required>
          <span>phone</span>
          <input type="tel" id="tel"placeholder="Enter Your number" name="phone" required>
          <span>Enter Your Password</span>
          <input type="Password" id="Password"placeholder="Atleast 8 Characters" name="Password" required>
          <span>confirm pasword</span>
          <input type="confirm_password" id="confirm_password"placeholder="Atleast 8 Characters" required>
          <input type="submit" value="Sign In" class="button">
          <a href="login.php">Already Have Account</a>
        </form>
        
      </div>
      <!--login-image-->
      <div class="login-image">
        <img src="images/P21.jpg">
      </div>
    </div>
<section class="footer">
    <div class="footer-container container">
        <h2>FATIE RENTALS</h2>
        <div class="footer-box">
            <h3>Quick Links</h3>
            <a href="Reachable Agents.html">Agents</a>
            <a href="Profile.html">profile</a>
            <a href="#">Rates</a>
        </div>
        <div class="footer-box">
            <h3>Locations</h3>
            <a href="#">Bushenyi</a>
            <a href="#">Mbarara</a>
            <a href="#">Ibabda</a>
        </div>
        <div class="footer-social-icons"> 
            <h3>Contact</h3>
            
        </div>
    </div>
    <div class="copyright">
        <p>@fb All Rights Reserved</p> 
    </div>>
    </div>
</section>

</body>  
</html>