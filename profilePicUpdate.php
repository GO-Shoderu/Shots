<?php include './config.php' ?>

<?php
	//storing data to be stored into the database into a variable too
	$email = $_POST["email"];
	$pass = $_POST["pass"];

  $query = "SELECT * FROM tbusers WHERE email = '$email' AND password = '$pass'";
  $res = $mysqli->query($query);

	if($row = mysqli_fetch_array($res)){
      echo "password and email correct";
      $user = $row['user_id'];

  		if(isset($_POST["submit"])){

        // echo "button accepted";

  			$target_dir = 'profilePic/';
  			$uploadFile = $_FILES["picToUpload"];
  			$target_file = $target_dir . basename($uploadFile["name"]);
  			$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
  			$image_path = pathinfo($uploadFile['name']);
  			$image_name = $image_path['filename'];

  			if(($uploadFile["type"] == "image/jpg" || $uploadFile["type"] == "image/jpeg") && $uploadFile["size"] < 1048576){

  				if($uploadFile["error"] > 0){
  					echo "Error: " . $uploadFile["error"] . "<br/>";
  				} else {

						$query3 = "SELECT * FROM tbprofilepic WHERE user_id = '$user'";
					  $res3 = $mysqli->query($query3);

						if($row3 = mysqli_fetch_array($res3)){
							$query4 = "UPDATE tbprofilepic SET filename = '$target_file' WHERE user_id = '$user'";
							$res4 = $mysqli->query($query4);
						}else{
							$query2 = "INSERT INTO tbprofilepic (user_id, filename) VALUES ('$user', '$target_file');";
	  					$res2 = mysqli_query($mysqli, $query2) == TRUE;
						}



            // $_SESSION['uploadFile'] = $uploadFile['tmp_name'];
            // $_SESSION['target'] = $target_dir.$image_name;
            // $_SESSION['path'] = $image_path['extension'];
            // $_SESSION['target'] = $target_dir.$image_name.".".strtolower($image_path['extension']);

  					// move_uploaded_file($uploadFile['tmp_name'], $target_dir.$image_name.".".strtolower($image_path['extension']));


  				}

          $_SESSION['image'] = $user;
          header("Location: profile.php");

  		} else {
  			// echo "Invalid file";
  		}
  	}

	}else {
		// code...
		//user does not exist in the database
		// $_SESSION['loggedIn'] = 'false';
		// header("Location: index.php");
	}

	mysqli_close($mysqli);
?>
