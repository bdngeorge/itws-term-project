<?php
  session_start();
  // $_SESSION is a superglobal variable 
  // echo isset($_SESSION['userEmail']);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>TextbookBuddy</title>
    <link rel="stylesheet" href="styles/general.css">
    <script 
      src="https://code.jquery.com/jquery-3.6.0.min.js" 
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" 
      crossorigin="anonymous">
    </script>
  </head>
  <body>
    <header>
      <a href=""> <h1 class="logo left">  Textbook Buddy </h1> </a>
      <ul class="hmenu right">
        <a href="catalog/catalog.php"><li>Catalog</li></a>
        <a href="catalog/uploadBooks.php"><li>Sell</li></a>
        <!-- if no account, this will direct login page, else accounts page -->
        <a href="account/account.php"><li>Account</li></a>
      </ul>
    </header>
      
    <div id = 'contents'>
      <p>Welcome to TextBookBuddy</p>
      <p>See how you can buy and sell TextBooks </p>
</div>
      <div id = buttons>
      <form method="get" action="account/login.php">
    <button type="submit"class="button1">Login</button>
</form>
<form method="get" action="account/signup.php">
    <button type="submit" class="button1">Create An Account</button>
</form>
</div>
      
  
    <footer>
      
    </footer>
  </body>
</html>