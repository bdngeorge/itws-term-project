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
  

    <!-- show all books user sold -->
    <a href="sellerCatalog.php"> My books </a> <br>
    <!-- option to delete books -->

    <!-- show all books users requested -->

    <!-- logout -->
    <a href="logout.php">Logout</a>
  
</html>

