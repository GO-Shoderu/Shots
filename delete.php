<?php include './config.php' ?>

<?php

  $user = $_POST["del"];

  $query = "DELETE FROM tbusers WHERE user_id = '$user'";
  mysqli_query($mysqli, $query);

  $query2 = "DELETE FROM tbprofilepic WHERE user_id = '$user'";
  mysqli_query($mysqli, $query2);

  $query3 = "DELETE FROM tbgallery WHERE user_id = '$user'";
  mysqli_query($mysqli, $query3);

  $query4 = "DELETE FROM tbfollow WHERE follower = '$user'";
  mysqli_query($mysqli, $query4);

  $query5 = "DELETE FROM tbfollow WHERE following = '$user'";
  mysqli_query($mysqli, $query5);

  $query6 = "DELETE FROM tbcomment WHERE user_id = '$user'";
  mysqli_query($mysqli, $query6);

  $query7 = "DELETE FROM tbalbumcontent WHERE user_id = '$user'";
  mysqli_query($mysqli, $query7);

  $query8 = "DELETE FROM tbalbum WHERE user_id = '$user'";
  mysqli_query($mysqli, $query8);

  // Check if session variable was previously set
  $loggedIn=isset($_SESSION["status"]);
  // Remove a single session variable
  if($loggedIn) unset($_SESSION["status"]);
  // Remove all session variables
  session_unset();
  // Destroy the session, its ID and corresponding file
  session_destroy();

  header("Location: index.php");

?>
