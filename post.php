<?php include './config.php' ?>

<?php
	//storing data to be stored into the database into a variable too
	$email = $_POST["email"];
	$pass = $_POST["pass"];
  $description = $_POST["description"];
  $hashtags = $_POST["hashtags"];
	$album = $_POST["formControlSelect"];

  $query = "SELECT * FROM tbusers WHERE email = '$email' AND password = '$pass'";
  $res = $mysqli->query($query);

	if($row = mysqli_fetch_array($res)){
      // echo "password and email correct " . $album;
      $user = $row['user_id'];

  		if(isset($_POST["submit"])){

        // echo "button accepted";

  			$target_dir = 'gallery/';
  			$uploadFile = $_FILES["picToUpload"];
  			$target_file = $target_dir . basename($uploadFile["name"]);
  			$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
  			$image_path = pathinfo($uploadFile['name']);
  			$image_name = $image_path['filename'];

  			if(($uploadFile["type"] == "image/jpg" || $uploadFile["type"] == "image/jpeg") && $uploadFile["size"] < 1048576){

  				if($uploadFile["error"] > 0){
  					echo "Error: " . $uploadFile["error"] . "<br/>";
  				} else {

  					$query2 = "INSERT INTO tbgallery (user_id, filename, description, hashtags) VALUES ('$user', '$target_file', '$description', '$hashtags');";
  					$res2 = mysqli_query($mysqli, $query2) == TRUE;

						$imageId = mysqli_insert_id($mysqli);



						if ($album == "Upload as is") {
							// code...

						} else {
							// code...

							// echo "I got here ";
							// die();

							$query3 = "SELECT * FROM tbalbumcontent WHERE albumName = '$album'";
						  $res3 = $mysqli->query($query3);

							$row3 = mysqli_fetch_array($res3);

							$albumId = $row3["album_id"];
							$albName = $row3["albumName"];
							$albumDesc = $row3["albumDescription"];
							$albumHash = $row3["albumHashtags"];

							// echo $albumId . " " . $albName . " " . $albumDesc . " " . $albumHash . " ";
							// die();

							$query4 = "INSERT INTO tbalbumcontent (album_id, user_id, image_id, albumName, albumDescription, albumHashtags) VALUES ('$albumId', '$user', '$imageId', '$albName', '$albumDesc', '$albumHash');";
							$res4 = $mysqli->query($query4);
	  					// $res4 = mysqli_query($mysqli, $query4) == TRUE;
						}

  				}

          $_SESSION['image'] = $user;
          header("Location: homepage.php");

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
