<?php
  session_start();

  // redirect to login page if not
  if(!isset($_SESSION['userEmail'])){
    header("Location: ../account/login.php");
    die();
  }

  include("../includes/dbconnect.php");

  $userEmail= $_SESSION['userEmail'];

  // if ($_SERVER["REQUEST_METHOD"] === 'POST')
  if (isset($_POST['submit']))
  {

    // make title, authors, subject, cond, price required
    $title = htmlspecialchars(trim($_POST['title']));
    $authors = htmlspecialchars(trim($_POST['authors']));
    $isbn  = htmlspecialchars(trim($_POST['isbn']));
    // from dropdown menu
    $subj  = htmlspecialchars(trim($_POST['subj']));
    $cond  = htmlspecialchars(trim($_POST['cond']));
    $desc  = htmlspecialchars(trim($_POST['desc']));
    // this is a number
    $price  = htmlspecialchars(trim($_POST['price']));

    // file infomation
    // new file name

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
    <link rel="stylesheet" href="../styles/upload.css">
    <link rel="stylesheet" href="../styles/general.css">
    <script 
      src="https://code.jquery.com/jquery-3.6.0.min.js" 
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" 
      crossorigin="anonymous">
    </script>
  </head>
  <body>
    <?php include("../includes/header.php"); ?>
    <section class="center-items center-self body" style="margin-top: 20px;">
      <h2 class="bold"> Sell Book </h2>

      <form id="upload" name="login" class="form" 
        method="post" action="uploadBooks.php"  enctype="multipart/form-data" 
        onsubmit="return validateUpload(this);">

        <input type="text" id="title" size="200" name="title" placeholder="Title:"></br>
        <input type="text" id="authors" name="authors" placeholder="Authors: (Seperate with commas)"></br>

        <input type="text" id="desc" name="desc" placeholder="Description:"></br>
        <input type="text" id="isbn" name="isbn" placeholder="ISBN:"></br>
        <input type="number" min="0" step=".01" id="price" name="price" placeholder="Price:"></br>
        
          <label class="field" for="subj" style="margin-top:20px"> <strong>Subject</strong></label>
          <select id="subj" name="subj" >
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
        

          <label class="field" for="cond" style="margin-top:20px"> <strong>Condition</strong> </label>
          <select id="cond" name="cond">
            <option value="poor">Poor</option>
            <option value="fair">Fair</option>
            <option value="good">Good</option>
            <option value="very good">Very Good</option>
            <option value="like new">Like New</option>
            <option value="new">New</option>
          </select>
        
          <label class="field" for="file" style="margin-top:20px"> <strong>Upload Image</strong> </label>
          <input type="file" id="file" name="file" accept="image/*"></br>
    

        <input type="submit" name="submit" value="Submit" style="margin-top:20px">
      </form>
    </section>
            
    <footer>      
    </footer>
  </body>
</html>