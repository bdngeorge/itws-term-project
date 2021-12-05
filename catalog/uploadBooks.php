<?php
  session_start();

  // redirect to login page if not
  if(!isset($_SESSION['userEmail'])){
    header("Location: ../account/login.php");
    die();
  }

  include("../includes/dbconnect.inc.php");

  $userEmail= $_SESSION['userEmail'];

  // if ($_SERVER["REQUEST_METHOD"] === 'POST')
  if (isset($_POST['submit']))
  {

    $title = htmlspecialchars(trim($_POST['title']));
    $authors = htmlspecialchars(trim($_POST['authors']));
    $isbn  = htmlspecialchars(trim($_POST['isbn']));
    $subj  = htmlspecialchars(trim($_POST['subj']));
    $cond  = htmlspecialchars(trim($_POST['cond']));
    $desc  = htmlspecialchars(trim($_POST['desc']));
    $price  = htmlspecialchars(trim($_POST['price']));

    $title = mysqli_real_escape_string($db, $title);
    $authors = mysqli_real_escape_string($db, $authors);
    $isbn = mysqli_real_escape_string($db, $isbn);
    $desc = mysqli_real_escape_string($db, $desc);

    $fileName = $_FILES['file']['name'];
    $tmploc = $_FILES['file']['tmp_name'];
    $filesize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileSplit = explode('.', $fileName);
    $fileExt = strtolower(end($fileSplit));

    $imgExt = array('jpeg', 'jpg', 'png');

    if (!in_array($fileExt, $imgExt) or !$fileError === 0 or $filesize >= 10000000){
      echo "Error with file, please upload a different file";
      die();
    } 

    $uploads_dir = "../resources/bookImg";
    $imgIdentifier=  $subj .'-'. rand(999999999, 9999999999).'.'.$fileExt;
    echo $imgIdentifier;
    move_uploaded_file($tmploc, $uploads_dir.'/'.$imgIdentifier);

    $insQuery = "insert into books(imgID, title, authors, isbn, subjectCode, `condition`, `desc`, price, `sellerEmail`) values(?,?,?,?,?,?,?,?,?)";
    $statement = $db->prepare($insQuery);
    $statement->bind_param("sssssssds", $imgIdentifier, $title, $authors, $isbn, $subj, $cond, $desc, $price, $userEmail);
    $success = $statement->execute();
    $statement->close();

    if ($success) {
      echo "success";
    } else {
      echo "Error on server, please try again";
    }
  }
  
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>TextbookBuddy</title>
    <link rel="stylesheet" href="../styles/signup.css">
    <link rel="stylesheet" href="../styles/general.css">
    <script 
      src="https://code.jquery.com/jquery-3.6.0.min.js" 
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" 
      crossorigin="anonymous">
    </script>
  </head>
  <body>
    <?php include("../includes/header.inc.php"); ?>
    <section class="">
      <h2 class="bold"> Sell Book </h2>

      <form id="upload" name="login" class="form" 
      method="post" action="uploadBooks.php"  enctype="multipart/form-data">
        <label class="field" for="title"> Book Title:</label>
        <input type="text" id="title" size="200" name="title" ></br>

        <label class="field" for="authors"> Authors</label>
        <input type="text" id="authors" name="authors"></br>

        <label class="field" for="subj"> Subject</label>
        <select id="subj" name="subj">
          <?php
            if($dbOK) {
              $query = "select * from subjects";
              $result = $db->query($query);
              $numRecord = $result->num_rows;
              for($i=0; $i < $numRecord; $i++){
                $record = $result->fetch_assoc();
                echo '<option value="'.$record['subjectCode'].'">'
                      .strtoupper($record['subjectCode']). '</option>';
              }
            }
          ?>
        </select>

        <label class="field" for="desc"> Description</label>
        <input type="text" id="desc" name="desc" class="left"></br>

        <label class="field" for="isbn"> ISBN </label>
        <input type="text" id="isbn" name="isbn" class="right"></br>

        <label class="field" for="cond"> Condition </label>
        <select id="cond" name="cond">
          <option value="poor">Poor </option>
          <option value="fair">Fair </option>
          <option value="good">Good </option>
          <option value="very good">Very Good </option>
          <option value="like new">Like New </option>
          <option value="new">New </option>
        </select>

        <label class="field" for="file"> Upload Image </label>
        <input type="file" id="file" name="file"></br>

        <label class="field" for="price"> Price</label>
        <input type="number" min="0" step=".01" id="price" name="price" class="right"></br>
        
        <input type="submit" name="submit" value="submit">
      </form>
    </section>
            
    <footer>      
    </footer>
  </body>
</html>