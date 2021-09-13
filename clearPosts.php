<?php include './config.php' ?>

<?php

  $query2 = "DELETE FROM tbgallery";
  mysqli_query($mysqli, $query2);


  header("Location: index.php");

?>
