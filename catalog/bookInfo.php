<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>TextbookBuddy</title>
    <link rel="stylesheet" href="../styles/general.css">
    <link rel="stylesheet" href="../styles/bookinfo.css">

    <script 
      src="https://code.jquery.com/jquery-3.6.0.min.js" 
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" 
      crossorigin="anonymous">
    </script>
  </head>
  <body>
    <?php include("../includes/header.inc.php"); ?>
    <?php
      include("../includes/dbconnect.inc.php");

      if($dbOK) {
        $id = mysqli_real_escape_string($db, $_GET['id']);
        $query = "SELECT * FROM books WHERE id = $id limit 1";
        $result = $db->query($query);
        $record = $result->fetch_assoc();
        $db->close();

        $title = $record['title'];
        $authors = $record['authors'];
        $isbn = $record['isbn'];
        $subj = $record['subjectCode'];
        $condition = $record['condition'];
        $desc = $record['desc'];
        $file = $record['imgID'];
        $price = $record['price'];
        $contact = $record['sellerEmail'];

        echo "<div id='item'>";
        echo "<img src='../resources/bookImg/$file'>";
      

        echo "<div id='bookInfo'>";
        
        echo '<h1>'.$title.'</h1>';
        echo '<br>';
        echo '<strong>Authors:</strong> '.$authors;
        echo '<br>';
        echo '<strong>ISBN:</strong> '.$isbn;
        echo '<br>';
        echo '<strong>Subject Code:</strong> '.strtoupper($subj);
        echo '<br>';
        echo '<strong>Condition:</strong> '.$condition;
        echo '<br>';
        echo '<strong>Description:</strong> '.$desc;
        echo '<br>';
        echo '<strong>Price: </strong> '.'$'.$price;
        echo '<br>';
        echo '<strong>Contact: </strong> '. $contact;
        echo '</div>';
        echo "</div>";
      }
    ?>
  </body>
</html>