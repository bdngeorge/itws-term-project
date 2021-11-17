<?php
  session_start();
  include ('../includes/dbconnect.php');
  if ($dbOK) {
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    // if (isset($_POST['login']))
    {
      $email = $_POST['login']['email'];
      $password = $_POST['login']['password'];
         
      // error checking 

      $query = "select * from users where email = '$email'";
      $result = mysqli_query($db, $query);
      
      echo mysqli_num_rows($result);
      if($result && mysqli_num_rows($result) > 0)
      {      
        $user_data = mysqli_fetch_assoc($result);
        
        if($user_data['password'] === $password) 
        {
          $_SESSION['userEmail'] = $user_data['email'];
          // redirect to Home page
          header("Location: ../");
          die;
        }
      }

    } 
  }

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>TextbookBuddy - Login</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="../general.css">
    <script 
      src="https://code.jquery.com/jquery-3.6.0.min.js" 
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" 
      crossorigin="anonymous">
    </script>
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
      <h2 class="bold">Login</h2>
      <form id="login" name="login" class="form" action="#" method="post" 
      >
      <!-- onsubmit="event.preventDefault(); validateLogin(this);"
      > -->
        <input type="email" id="email" name="login[email]" placeholder="RPI Email:" class="left"><br>
        <input type="password" id="password" name="login[password]" placeholder="Password:" class="left"><br>
        <input type="submit" id="lsubmit" value="Submit" class="button">
      </form>
      <button type="button" onclick="window.location.href='../signup/signup.php'" class="button">Sign Up</button>
    </section>
    
    <footer>
      
    </footer>
  </body>
</html>