<?php include './config.php' ?>

<?php
	$name = $_POST["fname"];
	$surname = $_POST["lname"];
  $email = $_POST["email"];
	$date = $_POST["date"];
  $pass1 = $_POST["pass1"];
	$pass2 = $_POST["pass2"];

	$query = "SELECT * FROM tbusers WHERE email = '$email'";
	$res = mysqli_query($mysqli, $query);

	if ($row = mysqli_fetch_array($res)) {
		//checking if the user already exist in the data base
		$_SESSION['exist'] = "yep";
		header("Location: index.php");

	}elseif ($name == "" || $surname == "" || $email == "" || $pass1 == "" || $pass2 == "") {
		// code...
		$_SESSION['check'] = "blank";
		header("Location: index.php");
	}elseif ($pass1 != $pass2) {
    // code...
    $_SESSION['match'] = "noMatch";
    header("Location: index.php");
  }else{
		// code..

		$query = "INSERT INTO tbusers (name, surname, email, birthday, password)
              VALUES ('$name', '$surname', '$email', '$date', '$pass1');";

		mysqli_query($mysqli, $query);

		$_SESSION['goAhead'] = "yep";
		$_SESSION['name'] = $name;

		header("Location: index.php");

		exit();
	}

	mysqli_close($mysqli);
