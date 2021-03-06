<?php
  session_start();
  include ('../includes/dbconnect.inc.php');

  if (isset($_POST['Submit']))
  {
    $fname = htmlspecialchars(trim($_POST['fname']));
    $lname = htmlspecialchars(trim($_POST['lname']));
    $email = htmlspecialchars(trim($_POST['email']));
    $pass = htmlspecialchars($_POST['password']);

    $fname = mysqli_real_escape_string($db, $fname);
    $lname = mysqli_real_escape_string($db, $lname);
    $email = mysqli_real_escape_string($db, $email);
    $pass  = mysqli_real_escape_string($db, $pass);

    $insQuery = "insert into users(fname, lname, email, password) values(?,?,?,?)";
    $statement = $db->prepare($insQuery);
    $statement->bind_param("ssss", $fname, $lname, $email, $pass);
    $success = $statement->execute();
    $statement->close();

    // insert would fail if email address is already on file
    if ($success) {
      header("Location: login.php");
    } else {
      echo "<script> alert('this email address is already on file'); </script>";
    }
  }

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>TextbookBuddy - Sign Up</title>
    <link rel="stylesheet" href="../styles/signup.css">
    <link rel="stylesheet" href="../styles/general.css">
    <script type="text/javascript" src="../scripts/form-validation.js"></script>
  </head>
  <body>
    <?php include("../includes/header2.inc.php"); ?>
    <section class="center-items center-self body">
      <h2 class="bold">Sign Up</h2>
      <form name="signup" class="form" action="signup.php" method="post"
      onsubmit="return validateSignUp(this);">
        <input type="text" id="fname" name="fname" placeholder="First Name:" class="left"><br>
        <input type="text" id="lname" name="lname" placeholder="Last Name:" class="left"><br>
        <input type="email" id="email" name="email" placeholder="RPI Email:" class="left"><br>
        <input type="password" id="password" name="password" placeholder="Password:" class="left"><br>
        <input type="submit" name="Submit" value="Submit">
      </form>
      <button type="button" onclick="window.location.href='login.php'" class="button">Back to Login</button>
    </section>
    <footer>
    </footer>
  </body>
</html>