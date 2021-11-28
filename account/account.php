<?php
  // redirect to login page if not logged in
  session_start();
  if(!isset($_SESSION['userEmail'])){
    header("Location: login.php");
    exit();
  }


?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>TextbookBuddy - Account </title>
  </head>
  <h1> Welcome <?php echo $_SESSION['userEmail']; ?></h1>

  <a href="logout.php">Logout</a>

  <?php
    // show all books user sold

    // option to delete books

    // show all books users requested
  ?>


  
</html>

