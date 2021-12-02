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
    <link rel="stylesheet" href="../styles/catalog.css">
    <script 
      src="https://code.jquery.com/jquery-3.6.0.min.js" 
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" 
      crossorigin="anonymous">
    </script>
  </head>
  <body>
    <?php include("../includes/header.php"); ?>

    <!-- Show books-->
    <div id="body">
      <?php include("filters.php"); ?>
  
      <div id="books">
        <h1 style="margin-left:20px;">Books</h1>
        <div id="bookList">
          <?php
            // include("../includes/dbconnect.php");
            if ($dbOK){
              // show all books for if none selected
              $query = "SELECT * from books";

              if (!empty($where)) {
                $sqlcond = implode(" and ", $where);
                $query .= " where $sqlcond";
              }

              $result = $db->query($query);
              $numRecords = $result->num_rows;

              // if numRecords = 0, show message 
              for ($i=0; $i < $numRecords; $i++) {
                $record = $result->fetch_assoc();
                $title = $record['title'];
                $id = $record['id'];
                $file = $record['imgID'];

                echo "<div class='book'>";

                echo "<a href='bookInfo.php?id=$id'><img style='width:250px;height:300px;' src='../resources/bookImg/$file'></a>";

                echo "<strong>$title</strong>";

                echo $record['desc'];

                echo "<br>";

                echo $record['condition'];
                
                echo "<br><br><br>";
                echo "</div>";

              }
            }

          ?>
        </div>
        
      </div>
    </div>
    

    <footer>
    </footer>
  </body>
</html>