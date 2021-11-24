<?php
  session_start();  
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>TextbookBuddy</title>
    <link rel="stylesheet" href="../styles/login.css">
    <link rel="stylesheet" href="../styles/general.css">
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
        <a href="../index.php"><li>Home</li></a>
        <a href="catalog.php"><li>Catalog</li></a>
        <a href="uploadBooks.php"><li>Sell</li></a> 
        <a href="../account/account.php"><li>Account</li></a>
      </ul>
    </header>

    <!-- Show books-->
    <?php include("filters.php"); ?>



    <footer>
    </footer>
  </body>
</html>