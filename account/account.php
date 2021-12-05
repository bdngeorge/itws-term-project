<?php
  include("../includes/dbconnect.inc.php");
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
    <link rel="stylesheet" href="../styles/general.css">
    <link rel="stylesheet" href="../styles/catalog.css">
    <link rel="stylesheet" href="../styles/account.css">
  </head>
  <body>
    <?php include("../includes/header2.inc.php"); ?>
    <div class = "center-text ">
      <h1> Account Information </h1>
    </div>
    <?php
      if($dbOK) {
        $userEmail = mysqli_real_escape_string($db, $_SESSION['userEmail']);
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
        <!-- logout -->
        <a href="logout.php">Logout</a>
      </div>
    </div>
  </body>
</html>

  

