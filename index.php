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
      <h1 class="left">Textbook Buddy</h1>
      <ul class="hmenu right">
        <a href=""><li>Home</li></a>
        <a href="catalog/catalog.php"><li>Catalog</li></a>
        <a href="catalog/uploadBooks.php"><li>Sell</li></a>
        <!-- if no account, this will direct login page, else accounts page -->
        <a href="account/account.php"><li>Account</li></a>
      </ul>
    </header>


    <footer>
      
    </footer>
  </body>
</html>