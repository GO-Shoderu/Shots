<?php include './config.php' ?>

<?php

  $query2 = "DELETE FROM tbusers";

  mysqli_query($mysqli, $query2);


  header("Location: index.php");

?>
