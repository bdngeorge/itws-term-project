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
    <section class="center-items center-self body">
      <div class = "center-text ">
        <h1>Account Information</h1>
      </div>

      <?php
        if($dbOK) {
          $userEmail = mysqli_real_escape_string($db, $_SESSION['userEmail']);
          $query = "SELECT * FROM users WHERE email = '$userEmail'";
          $result = $db->query($query);
          $record = $result->fetch_assoc();
          $db->close();

          $fname = $record['fname'];
          $lname = $record['lname'];
          
          echo '<div id = "outer">' ;
          echo 'Name: '.$fname." ";
          echo $lname;
          echo '<br>';
          echo 'Email: '.$userEmail;
        }
      ?>

        <div id = "sellerlog">
          <!-- show all books user sold -->
          <button type="button" onclick="window.location.href='sellerCatalog.php'" class="button">My Books</button>
          <br>
          <!-- logout -->
          <button type="button" onclick="window.location.href='logout.php'" class="button">Logout</button>
          
        </div>
      </div>
    </section>
    
  </body>
</html>

  

