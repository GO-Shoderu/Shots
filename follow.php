<?php include './config.php' ?>

<?php

  $email = $_POST["email"];
  $pass = $_POST["pass"];
  $user = $_POST["user"];
  $post = $_POST["post"];

  $query = "SELECT * FROM tbgallery WHERE image_id = '$post'";
	$res = mysqli_query($mysqli, $query);

  if ($row = mysqli_fetch_array($res)) {
    // code...
    $follow = $row["user_id"];

    $query3 = "SELECT * FROM tbfollow WHERE follower = '$user' AND following = '$follow'";
  	$res3 = mysqli_query($mysqli, $query3);

    if ($row3 = mysqli_fetch_array($res3)) {
      // do nothing
    }else {
      $query2 = "INSERT INTO tbfollow (follower, following)
                VALUES ('$user', '$follow');";

      mysqli_query($mysqli, $query2);
    }

    die("Valid");

  }



?>
