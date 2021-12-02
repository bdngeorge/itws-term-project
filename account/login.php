<?php
  session_start();
  include ('../includes/dbconnect.php');
  if ($dbOK) {
    // if($_SERVER['REQUEST_METHOD'] == 'POST')
    if (isset($_POST['submit']))
    {
      $email = $_POST['email'];
      $password = $_POST['password'];
         
      // error checking 

      $query = "select * from users where email = '$email'";
      $result = $db->query($query);
      $numRecords = $result->num_rows;
      
      // echo mysqli_num_rows($result);
      if($numRecords > 0)
      {      
        $user_data = $result->fetch_assoc();
        
        // if password is correct, log user in
        if($user_data['password'] === $password) 
        {
          $_SESSION['userEmail'] = $user_data['email'];
          // redirect to Home page
          header("Location: ../");
          // exit
          die;
        } 
      }
      echo "your password or username is incorrect";
    } 
  }

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>TextbookBuddy - Login</title>
    <link rel="stylesheet" href="../styles/login.css">
    <link rel="stylesheet" href="../styles/general.css">
    <script 
      src="https://code.jquery.com/jquery-3.6.0.min.js" 
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" 
      crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="../scripts/form-validation.js"></script>
  </head>
  <body>
    <?php include("../includes/header.php"); ?>

    <section class="center-items center-self body">
      <h2 class="bold">Login</h2>
      <form id="login" name="login" class="form" action="#" method="post" 
        onsubmit="return validateLogin(this);"
      >
        <input type="email" id="email" name="email" placeholder="RPI Email:" class="left"><br>
        <input type="password" id="password" name="password" placeholder="Password:" class="left"><br>
        <!-- if i changed value="save" font size changes? -->
        <input type="submit" id="lsubmit" name="submit" value="submit" class="button">
      </form>
      <button type="button" onclick="window.location.href='signup.php'" class="button">Sign Up</button>
    </section>
    
    <footer>
    </footer>
  </body>
</html>