<?php
  session_start();
  include ('../includes/dbconnect.php');

  //  if ($_SERVER['REQUEST_METHOD'] === 'POST') 
  if (isset($_POST['Submit']))
  {
    $fname = htmlspecialchars(trim($_POST['fname']));
    $lname = htmlspecialchars(trim($_POST['lname']));
    $email = htmlspecialchars(trim($_POST['email']));
    // can you do this for a password?
    $pass  = htmlspecialchars($_POST['password']);

    
    // $query = "insert into users(fname, lname, email, password) values('$fname', '$lname', '$email', '$pass')";
    $insQuery = "insert into users(fname, lname, email, password) values(?,?,?,?)";
    $statement = $db->prepare($insQuery);
    $statement->bind_param("ssss", $fname, $lname, $email, $pass);
    $statement->execute();

    $statement->close();
    header("Location: ../login/login.php");
  }

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
        <a href="../catalog/catalog.php"><li>Catalog</li></a>
        <a href=""><li>Sell</li></a>
        <a href=""><li>Account</li></a>
      </ul>
    </header>


    <section class="center-items center-self body">
      <h2 class="bold">Sign Up</h2>
      <form name="signup" class="form" action="#" method="post"
      onsubmit="validateSignUp(this);">
        <input type="text" id="fname" name="fname" placeholder="First Name:" class="left"><br>
        <input type="text" id="lname" name="lname" placeholder="Last Name:" class="left"><br>
        <input type="email" id="email" name="email" placeholder="RPI Email:" class="left"><br>
        <input type="password" id="password" name="password" placeholder="Password:" class="left"><br>
       
        <!-- can you make this button bigger? --> 
        <input type="submit" name="Submit" value="Submit">
      </form>
      <button type="button" onclick="window.location.href='../login/login.php'" class="button">Back to Login</button>
    </section>
    
    <footer>
      
    </footer>
  </body>
</html>