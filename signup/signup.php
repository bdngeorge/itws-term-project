<?php
  session_start();
  // include("../resources/connection.php");
  // include("../resources/functions.php");

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>TextbookBuddy - Sign Up</title>
    <link rel="stylesheet" href="signup.css">
    <link rel="stylesheet" href="../general.css">
    <script type="text/javascript" src="../scripts/form-validation.js"></script>
  </head>
  <body>
    <header>
      <h1 class="left">Textbook Buddy</h1>
      <ul class="hmenu right">
        <a href=""><li>Home</li></a>
        <a href=""><li>Catalog</li></a>
        <a href=""><li>Sell</li></a>
        <a href=""><li>Account</li></a>
      </ul>
    </header>


    <section class="center-items center-self body">
      <h2 class="bold">Sign Up</h3>
      <form name="signup" class="form" action="#" method="post" onsubmit="event.preventDefault(); validateSignUp(this);">
        <input type="text" id="fname" name="fname" placeholder="First Name:" class="left"><br>
        <input type="text" id="lname" name="lname" placeholder="Last Name:" class="left"><br>
        <input type="email" id="email" name="email" placeholder="RPI Email:" class="left"><br>
        <input type="password" id="password" name="password" placeholder="Password:" class="left"><br>
        <input type="submit" value="Submit">
      </form>
      <button type="button" onclick="window.location.href='../login/login.php'" class="button">Back to Login</button>
    </section>
    
    <footer>
      
    </footer>
  </body>
</html>