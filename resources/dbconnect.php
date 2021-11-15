<?php
  $dbOK = false;

  $dbhost = 'localhost';
  $dbuser = 'root';
  $dbpassword = '';
  $dbname = 'textbook_buddy';

  $conn = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);

  if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
  } else {
    $dbOK = true;
  }
?>
