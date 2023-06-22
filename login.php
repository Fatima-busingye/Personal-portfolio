<?php

$conn = mysqli_connect("localhost","root","","login_db");
if(isset($_POST["submit"]))
{
    $user = $_POST["user"];
    $pass = $_POST["pass"];

    //prepaire the SQL statement

    $stmt = mysqli_prepare($conn, "SELECT count(*) as total FROM logi WHERE USERNAME=? and PASSWORD=?");

    //bind the param to the statement
    mysqli_stmt_bind_param($stmt, "ss",$user,$pass);

    //execute the statement

    mysqli_stmt_execute($stmt);

    //store the result

    mysqli_stmt_store_result($stmt);

    //bind the result to a variable

    mysqli_stmt_bind_result($stmt,$total);

    //fetch the result

    mysqli_stmt_fetch($stmt);

    //close the statement

    mysqli_stmt_close($stmt);

    if ($total>0){
        header("location:index.html");
    }
    else{
        echo"<script>alert('username and password incorrect')</script>";
    }
}

// close the connection
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
    <meta http-equiv="X-UA-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width", initial-scale="1.0">
    <title>Log In</title>
    <!--Link To CSS-->
    <link rel="stylesheet" href="style.css">
    <!--Box Icons-->
    <link rel="stylesheet"
    href="http;//cdn.jsdelivr.net/nmp/boxicons@latest/css/boxicons.min.css">

</head>
<body>
    <!--navbar-->
    <header>
        <div class="nav container">
            <!--logo-->
            <a href="index.html" class="logo"><i class="bx bx-home"></i>fatie rentals</a>

            <!--Login Button-->
            <a href="signin.php" class="btn">Sign In</a>
        </div>
    </header> 
    <!--log in-->
    <div class="login">
      <div class="login-container">
        <h2>Login To Continue</h2>
        <p>login with your data</p>
        <!--login form-->
        <form action="index.html" method="POST">
            <span> ENTER USERNAME</span>
          <input type="Text" id=""placeholder="USERNAME" required>
          <span>Enter Your Password</span>
          <input type="PASSWORD" id=""placeholder="PASSWORD" required>
          <input type="submit" value="login" class="button">
          <a href="signin.php">Forgot Password?</a>
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
        <a href="Services.html">Services</a>
        </div>
        <div class="footer-box">
            <h3>Quick Links</h3>
            <a href="Reachable Agents.html">Agents</a>
            <a href="#">Building</a>
            <a href="#">Rates</a>
        </div>
        <div class="footer-box">
            <h3>Locations</h3>
            <a href="#">Bushenyi</a>
            <a href="#">Mbarara</a>
            <a href="#">Ibabda</a>
        </div>
        <div class="footer-social-icons img"> 
            <h3>Contact</h3>
            
        </div>
    </div>
    <div class="copyright">
        <p>@fb All Rights Reserved</p> 
    </div>
    </div>
</section>

</body>  
</html>