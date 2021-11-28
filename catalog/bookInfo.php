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


<?php
  include("../includes/dbconnect.php");

  if($dbOK) {
    $id = $_GET['id'];
    // $id = mysqli_real_escape_string($db, $id);
    $query = "SELECT * FROM books WHERE id = $id limit 1";
    $result = $db->query($query);
    $record = $result->fetch_assoc();
    $file = $record['imgID'];
    var_dump($record);

    echo "<br>";

    echo "<img style='width:250px;' src='../resources/bookImg/$file'>";

  }
?>