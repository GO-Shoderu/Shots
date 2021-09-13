<?php include './config.php' ?>

<?php
	//storing data to be stored into the database into a variable too
	$email = $_POST["email"];

  if (isset($_POST["name"])) {
    // code...
    $name = $_POST["name"];
    $query = "UPDATE tbusers SET name = '$name' WHERE email = '$email'";
  	$res = mysqli_query($mysqli, $query);

  }else if (isset($_POST["surname"])) {
    // code...
    $surname = $_POST["surname"];
    $query = "UPDATE tbusers SET surname = '$surname' WHERE email = '$email'";
  	$res = mysqli_query($mysqli, $query);

  }else if (isset($_POST["date"])) {
    // code...
    $date = $_POST["date"];
    $query = "UPDATE tbusers SET birthday = '$date' WHERE email = '$email'";
  	$res = mysqli_query($mysqli, $query);

  }else if (isset($_POST["userid"])) {
    // code...
    $user = $_POST["userid"];
    $inp = $_POST["inputEmail"];
    $query = "UPDATE tbusers SET email = '$inp' WHERE user_id = '$user'";
  	$res = mysqli_query($mysqli, $query);
  }

	die("Valid");
?>
