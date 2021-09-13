<?php include './config.php' ?>

<?php

  $reas = $_POST["reason"];

  $query2 = "INSERT INTO tbreasons (reason)
          VALUES ('$reas');";

  mysqli_query($mysqli, $query2);


  header("Location: adminPage.php");

?>
