<?php include './config.php' ?>

<?php

  $post = $_POST["post"];
  $reporter = $_POST["reporter"];
  $reason = $_POST["reportOption"];

  $query2 = "INSERT INTO tbreport (reporter_user_id, post_id, reason)
          VALUES ('$reporter', '$post', '$reason');";

  mysqli_query($mysqli, $query2);


  header("Location: homepage.php");

?>
