<?php
  session_start();  
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>TextbookBuddy</title>
    <!-- <link rel="stylesheet" href="../styles/login.css"> -->
    <link rel="stylesheet" href="../styles/general.css">
    <link rel="stylesheet" href="../styles/filters.css">
    <script 
      src="https://code.jquery.com/jquery-3.6.0.min.js" 
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" 
      crossorigin="anonymous">
    </script>
  </head>
  <body>
    <header>
      <a href="../"> <h1 class="logo left">  Textbook Buddy </h1> </a>
      <ul class="hmenu right">
        <a href="catalog.php"><li>Catalog</li></a>
        <a href="uploadBooks.php"><li>Sell</li></a> 
        <a href="../account/account.php"><li>Account</li></a>
      </ul>
    </header>

    <!-- Show books-->
    <?php include("filters.php"); ?>

    <div >
      <?php
        include("../includes/dbconnect.php");
        // $subjects = "('csci', 'math')";
        $subjects = "('" . implode("','", $subjs) . "')";
        $conditions = "('" . implode("','", $conds) . "')";
        
  
        if ($dbOK){
          // show all books for now
          $query = "SELECT * from books";

          if (isset($_POST['price'])) {
            $priceCeil = $_POST['price'];
            // $query = "SELECT * FROM books WHERE price < $priceCeil and subjectCode IN $subjects and condition IN $conditions";
            $query = "SELECT * FROM books WHERE price <= $priceCeil and subjectCode IN $subjects";

            echo "yes price ceil";
          } else {
            $query = "SELECT * FROM books WHERE subjectCode IN $subjects";
            echo "no price ceil";
          }

          $result = $db->query($query);
          $numRecords = $result->num_rows;

          // if numRecords = 0, show message 
          for ($i=0; $i < $numRecords; $i++) {
            $record = $result->fetch_assoc();
            $title = $record['title'];
            $id = $record['id'];
            $file = $record['imgID'];

            echo "<strong>$title</strong>";

            echo "<a href='bookInfo.php?id=$id'><img style='width:250px;' src='../resources/bookImg/$file'></a>";

            echo $record['desc'];
            
            echo "<br><br><br>";
          }
        }
      ?>

      </div>



    <footer>
    </footer>
  </body>
</html>