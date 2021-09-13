<?php include './config.php' ?>

<?php

  $follower = $_POST["mine"];
  $following = $_POST["other"];

  $query3 = "DELETE FROM tbfollow WHERE follower = '$follower' AND following = '$following'";
  $res3 = mysqli_query($mysqli, $query3);

  header("Location: homepage.php");
  
?>
