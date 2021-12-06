<?php
  $dbOK = false;

  $dbhost = 'localhost';
  $dbuser = 'root';
  $dbpassword = '';
  $dbname = 'textbook_buddy';

  @ $db = new mysqli($dbhost, $dbuser, $dbpassword, $dbname);

  if ($db->connect_error) {
    echo '<div class="message"> Could not connect to the database. Error: ';
    echo $db->connect_errno . ' - ' . $db->connect_error . '</div>';
  } else {
    $dbOK = true;
  }
?>
