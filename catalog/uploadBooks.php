<?php
  session_start();
  include("../includes/dbconnect.php");

  $userEmail= $_SESSION['userEmail'];
  // echo $userEmail;

  if ($_SERVER["REQUEST_METHOD"] === 'POST')
  {
    $title = htmlspecialchars(trim($_POST['title']));
    $authors = htmlspecialchars(trim($_POST['authors']));
    $isbn  = htmlspecialchars(trim($_POST['isbn']));

    // from dropdown menu
    $subj  = htmlspecialchars(trim($_POST['subj']));

    $desc  = htmlspecialchars(trim($_POST['desc']));
    $cond  = htmlspecialchars(trim($_POST['cond']));

    // // this is a number
    $price  = htmlspecialchars(trim($_POST['price']));

    // $img   = htmlspecialchars(trim($_POST['attachment']));

    // $insQuery = "insert into books(title, authors, isbn, subjectCode, `condition`, `desc`, price, `sellerEmail`) values('$title', '$authors','$isbn', '$subj', '$cond', '$desc', '$price', '$userEmail')";

    $insQuery = "insert into books(title, authors, isbn, subjectCode, `condition`, `desc`, price, `sellerEmail`) values(?,?,?,?,?,?,?,?)";
    $statement = $db->prepare($insQuery);
    $statement->bind_param("ssssssds", $title, $authors, $isbn, $subj, $cond, $desc, $price, $userEmail);
    $statement->execute();
    $statement->close();

    echo 'Form Submitted';
  }
  
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>TextbookBuddy</title>
    <link rel="stylesheet" href="../signup/signup.css">
    <link rel="stylesheet" href="../general.css">
    <script 
      src="https://code.jquery.com/jquery-3.6.0.min.js" 
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" 
      crossorigin="anonymous">
    </script>
  </head>
  <body>
    <header>
      <h1 class="left">Textbook Buddy</h1>
      <ul class="hmenu right">
        <a href=""><li>Home</li></a>
        <a href=""><li>Catalog</li></a>
        <a href=""><li>Sell</li></a>
        <!-- if no account, this will direct login page, else accounts page -->
        <a href="../login/login.php"><li>Account</li></a>
      </ul>
    </header>

    <section class="">
        <h2 class="bold"> Login </h2>
        <form id="upload" name="login" class="form" action="#" method="post">
            <label class="field" for="title"> Book Title:</label>
            <input type="text" id="title" size="200" name="title" ></br>

            <label class="field" for="authors"> Authors</label>
            <input type="text" id="authors" name="authors"></br>

            <!-- include rest -->
            <label class="field" for="subj"> Subject</label>
            <select id="subj" name="subj">
              <option value="csci">CSCI </option>
              <option value="itws">ITWS </option>
              <option value="math">MATH </option>
              <option value="econ">ECON </option>
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

            <!-- can you make this box bigger and with dotted lines? -->
            <label class="field" for="attach"> Upload Image </label>
            <input type="text" id="attach" name="attachment" class="right"></br>

            <label class="field" for="price"> Price</label>
            <input type="number" min="0" step=".01" id="price" name="price" class="right"></br>

            
                         
            <input type="submit" value="Submit">
        </form>
    </section>
            


    <footer>
      
    </footer>
  </body>
</html>