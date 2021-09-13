<?php include './config.php' ?>

<?php
	//storing data to be stored into the database into a variable too
	$email = $_POST["email"];
	$pass = $_POST["pass"];

	$query = "SELECT * FROM tbusers WHERE email = '$email'";
	$res = mysqli_query($mysqli, $query);

	if ($row = mysqli_fetch_array($res)) {

		if ($pass == $row['password']) {
			// code...

			$_SESSION['name'] = $row['name'];
			$_SESSION['surname'] = $row['surname'];
			$_SESSION['birthday'] = $row['birthday'];
			$_SESSION['user'] = $row['user_id'];
			$_SESSION['email'] = $row['email'];
			$_SESSION['password'] = $row['password'];

			$_SESSION['status'] = "1";
			header("Location: homepage.php");

		}else {
			// code...
      //passward is wrong
			$_SESSION['password'] = 'false';
			header("Location: index.php");
		}
	}else {
		// code...
		//user does not exist in the database
		$_SESSION['loggedIn'] = 'false';
		header("Location: index.php");
	}

	mysqli_close($mysqli);
?>
