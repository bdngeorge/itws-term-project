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
  <div id = "welcome">
  <h1> Welcome <?php echo $_SESSION['userEmail']; ?></h1>
</div>
  <link rel="stylesheet" href="../styles/account.css">
  <?php
  include("../includes/dbconnect.php");
if($dbOK) {
  $userEmail = $_SESSION['userEmail'];
 
  // $id = mysqli_real_escape_string($db, $id);
  $query = "SELECT * FROM users WHERE email = '$userEmail'";
  $result = $db->query($query);
  $record = $result->fetch_assoc();

  $fname = $record['fname'];
  $lname = $record['lname'];
  
 echo '<div id = "outer">' ;
 echo '<div id = "middle">';
echo '<strong>Name: </strong>'.$fname." ";
echo $lname;
echo '<br>';
echo '<strong>Email: </strong>'.$userEmail;
echo '</div>';

  }

?>
  

  
  <div id = "sellerlog">

    <!-- show all books user sold -->
    <a href="sellerCatalog.php"> My books </a> <br>
    <!-- option to delete books -->

    <!-- show all books users requested -->

    <!-- logout -->
    <a href="logout.php">Logout</a>
</div>
</div>

<div id = "goto"> 
<h2>If you would like to view our catalog, go ahead!</h2>
<a href="catalog/catalog.php"><li>Catalog</li></a>

<!--<a href="catalog/uploadBooks.php"><li>Sell</li></a>-->
       

</div>
</html>

  

