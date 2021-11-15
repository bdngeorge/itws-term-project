<?php
  session_start();
  include("../database/dbconnect.php");

  $userEmail= $_SESSION['userEmail'];

  if ($_SERVER["REQUEST_METHOD"] === 'POST')
  {
    $title = $_POST['title'];
    $authors = $_POST['authors'];
    $isbn  = $_POST['isbn'];
    // $subj  = $_POST['subj'];
    $desc  = $_POST['description'];
    $cond  = $_POST['cond'];
    $price  = $_POST['price'];
    $img   = $_POST['attachment'];

    $query = "insert into books(title, authors, isbn) values('$title', '$authors','$isbn')";

    // $query = "insert into books(title, authors, isbn, subjectCode, condition, desc, price, sellerEmail) values('$title', '$authors', '$isbn', '$subj', '$cond', '$desc', '$price', '$userEmail')";
 
    mysqli_query($conn, $query);

    // $queryImg = "insert into bookimg values("
        
    
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

    <section class="center-items center-self body">
        <h2 class="bold"> "Login"</h2>
        <form id="upload" name="login" class="form" action="#" method="post">
            <input type="text" id="title" name="title" placeholder="title"></br>
            <input type="text" id="authors" name="authors" placeholder="authors"></br>
            <!-- can you make this a drop down menu? -->
            <input type="text" id="subj" name="subj" placeholder="subject code"></br>
            <input type="text" id="desc" name="description" class="left" placeholder="desc"></br>
            <input type="number" id="isbn" name="isbn" class="right" placeholder="isbn"></br>
            <!-- can you make this a drop down menu? -->
            <input type="text" id="cond" name="cond" class="right" placeholder="cond"></br>
            <!-- can you make this box bigger and with dotted lines? -->
            <input type="text" id="attach" name="attachment" placeholder="upload images" class="right"></br>
            <input type="text" id="price" name="price" class="right" placeholder="price"></br>
            <input type="submit" value="Submit">
        </form>
    </section>
            


    <footer>
      
    </footer>
  </body>
</html>