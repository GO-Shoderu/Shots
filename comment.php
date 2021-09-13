<?php include './config.php' ?>

<?php

  $email = $_POST["email"];
  $pass = $_POST["pass"];
  $user = $_POST["user"];
  $imgId = $_POST["imgId"];
  $comment = $_POST["comment"];

  $query2 = "INSERT INTO tbcomment (image_id, user_id, comment)
            VALUES ('$imgId', '$user', '$comment');";

  mysqli_query($mysqli, $query2);

    die("Valid");




?>
