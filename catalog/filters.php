<?php 
  include ('../includes/dbconnect.php'); 
  $subjs = array();
  $conds = array();
  // $priceCeilSet = 0;
  // $priceCeil = 0;
?>

<?php 
  
  if (isset($_POST['cond'])) {
    echo "cond set";
		foreach ($_POST['cond'] as $cond) :
      array_push($conds, $cond);
    endforeach;
  }

  if (isset($_POST['subj'])) {
    echo "subject set";
		foreach ($_POST['subj'] as $subj) :
			array_push($subjs, $subj);
    endforeach;
  }

  // if (isset($_POST['price'])) {
  //   echo "price set";
  //   $priceCeilSet = 1;
  //   $priceCeil = $_POST['price'];
  // } 

?>
<div id="sidebar">


  <form action="catalog.php" method="post">
    <!-- <label class="field" for="search"> Search </label> -->
    <input type=text id="search" name="search" placeholder="search"><br>
    <input type="submit" name="search" value="search">
  </form>
  <form action="catalog.php" method="post">
    <label class="field" for="price"> Under $ </label>
    <input type=number min="0" step="0.1" id="price" name="price"><br>

    <label class="field" for="cond"> Condition </label>
    <?php
      if($dbOK){
        $query = "select * from conditions";
        $result= $db->query($query);
        $numRecords = $result->num_rows;
        for($i=0; $i<$numRecords; $i++){
          $record = $result->fetch_assoc();
          $cond = $record['condition'];
          echo "<div>
                  <input type='checkbox' name='cond[]' value='$cond' id='$cond'>
                  <label for='$cond'>$cond</label>
                </div>";
        
        }
      }
    ?>
    <label class="field" for="subj">subjectCode</label>
    <?php 
      if($dbOK){
        $query = "select * from subjects";
        $result= $db->query($query);
        $numRecords = $result->num_rows;
        for ($i=0; $i<$numRecords; $i++){
          $record = $result->fetch_assoc();
          $subj = strtoupper($record['subjectCode']);
          // checked
          echo "<div>
                  <input type='checkbox' name='subj[]' value='$subj' id='$subj'>
                  <label for='$subj'>$subj</label>
                </div>";
        }
      }
    ?>
    <input type="submit" name="filter" value="filter">
  </form>
</div>

<!--

select bookID, 
from books 
where subjcode in (...)



select bookID, 
from books join bookImg on books.bookID = bookIMG.bookID
where subjcode in (...)


-->