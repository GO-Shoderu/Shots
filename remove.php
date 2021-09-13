<?php include './config.php' ?>

<?php

  $post = $_POST["pt"];

  // $query = "DELETE FROM tbusers WHERE user_id = '$user'";
  // mysqli_query($mysqli, $query);
  //
  // $query2 = "DELETE FROM tbprofilepic WHERE user_id = '$user'";
  // mysqli_query($mysqli, $query2);

  $query3 = "DELETE FROM tbgallery WHERE image_id = '$post'";
  mysqli_query($mysqli, $query3);

  // $query4 = "DELETE FROM tbfollow WHERE follower = '$user'";
  // mysqli_query($mysqli, $query4);
  //
  // $query5 = "DELETE FROM tbfollow WHERE following = '$user'";
  // mysqli_query($mysqli, $query5);
  //
  // $query6 = "DELETE FROM tbcomment WHERE user_id = '$user'";
  // mysqli_query($mysqli, $query6);
  //
  $query7 = "SELECT * FROM tbalbumcontent WHERE image_id = '$post'";
  $res = mysqli_query($mysqli, $query7);

  $row = mysqli_fetch_array($res);

  $id = $row["album_id"];

  $query8 = "SELECT * FROM tbalbumcontent WHERE album_id = '$id'";
  $res8 = mysqli_query($mysqli, $query8);

  $a = 0;

  while ($row8 = mysqli_fetch_array($res8)) {
    // code...
    $a++;
  }

  if ($a > 1) {
    // code...
    $query9 = "DELETE FROM tbalbumcontent WHERE image_id = '$post'";
    mysqli_query($mysqli, $query9);
  }else {
    // code...
    $query9 = "DELETE FROM tbalbumcontent WHERE image_id = '$post'";
    mysqli_query($mysqli, $query9);

    $query10 = "DELETE FROM tbalbum WHERE album_id = '$id'";
    mysqli_query($mysqli, $query10);
  }

  header("Location: homepage.php");

?>
