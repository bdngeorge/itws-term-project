<?php
  $dbOK = false;

  $dbhost = 'localhost';
  $dbuser = 'root';
  $dbpassword = '';
  $dbname = 'textbook_buddy';

  @ $db = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);

  if ($db->connect_error){
    die("Connection failed: " . $db->connect_error);
  } else {
    $dbOK = true;
  }
?>
