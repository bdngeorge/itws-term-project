<?php
    include("../includes/dbconnect.inc.php");
    if($dbOK) {
        $id = mysqli_real_escape_string($db, $_GET['id']);
        $query = "Delete from books WHERE id = $id ";
        $success = $db->query($query);
        $db->close();
        if ($success) {
            header("Location: sellerCatalog.php");
        } else {
            echo "<div> 
                    Your book was not deleted. Please try again
                  </div>";

        }
    }
?>