<?php 
  include ('../includes/dbconnect.inc.php'); 
  $where = array();
?>

<?php 
  
  if (isset($_POST['cond'])) {
    $conds = array();
		foreach ($_POST['cond'] as $cond) :
      array_push($conds, $cond);
    endforeach;
    $conditions = "('" . implode("','", $conds) . "')";
    $sqlcond = "`condition` IN $conditions";
    array_push($where, $sqlcond);

  }

  if (isset($_POST['subj'])) {
    $subjs = array();
		foreach ($_POST['subj'] as $subj) :
			array_push($subjs, $subj);
    endforeach;
    $subjects = "('" . implode("','", $subjs) . "')";
    $sqlcond = "`subjectCode` IN $subjects";
    array_push($where, $sqlcond);
  }

  if (isset($_POST['priceCeil']) and !empty($_POST['priceCeil'])) {   
    $priceCeil = mysqli_real_escape_string($db, $_POST['priceCeil']);
    $sqlcond = "price <= $priceCeil";
    array_push($where, $sqlcond);
  } 

?>
<div id="sidebar">


  <form action="catalog.php" method="post">
    <label class="field1" for="search"><strong>Search</strong></label>
    <input type=text id="search" name="search" placeholder="Enter search here..."><br>
    <input type="submit" name="search" value="Go">
  </form>
  <form action="catalog.php" method="post">
    <label class="field" for="price"><strong>Max Price</strong></label>
    <input type=number min="0" step="1" id="price" name="priceCeil"><br>

    <label class="field" for="cond"><strong>Condition</strong></label>
    <?php
      if($dbOK){
        $query = "select * from conditions order by id";
        $result= $db->query($query);
        $numRecords = $result->num_rows;
        for($i=0; $i<$numRecords; $i++){
          $record = $result->fetch_assoc();
          $cond = $record['condition'];
          echo "<div>
                  <input type='checkbox' name='cond[]' value='$cond' id='$cond'>
                  <label for='$cond'>". ucfirst($cond)."</label>
                </div>";
        }
      }
    ?>
    <label class="field" for="subj"><strong>Subject Code</strong></label>
    <?php 
      if($dbOK){
        $query = "select * from subjects";
        $result= $db->query($query);
        $numRecords = $result->num_rows;
        for ($i=0; $i<$numRecords; $i++){
          $record = $result->fetch_assoc();
          $subj = $record['subjectCode'];
          echo "<div>
                  <input type='checkbox' name='subj[]' value='$subj' id='$subj'>
                  <label for='$subj'>". strtoupper($subj)."</label>
                </div>";
        }
      }
    ?>
    <input type="submit" name="filter" value="Go">
  </form>
</div>

