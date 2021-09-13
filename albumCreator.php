<?php include './config.php' ?>

<?php
	//storing data to be stored into the database into a variable too
	$email = $_POST["email"];
	$pass = $_POST["pass"];
  $description = $_POST["description"];
  $hashtags = $_POST["hashtags"];

  $albumName = $_POST["albumName"];
  $albumHash = $_POST["albumHash"];
  $albumDesc = $_POST["albumDesc"];

  $query = "SELECT * FROM tbusers WHERE email = '$email' AND password = '$pass'";
  $res = $mysqli->query($query);

	if($row = mysqli_fetch_array($res)){
      // echo "password and email correct";
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

            // echo "New record created successfully. Last inserted ID is: " . $imageId;

            $query3 = "INSERT INTO tbalbum (user_id) VALUES ('$user');";
  					$res3 = mysqli_query($mysqli, $query3) == TRUE;

            $albumId = mysqli_insert_id($mysqli);

            // echo $albumId . " " . $albumName . " " . $albumDesc . " " . $albumHash . " " . $user . " " . $imageId . " ";
            // die();

            $query4 = "INSERT INTO tbalbumcontent (album_id, user_id, image_id, albumName, albumDescription, albumHashtags) VALUES ('$albumId', '$user', '$imageId', '$albumName', '$albumDesc', '$albumHash');";
            $res4 = $mysqli->query($query4);
            // $res4 = mysqli_query($mysqli, $query4) == TRUE;

            // die();

  				}

          $_SESSION['image'] = $user;
          header("Location: profileAlbum.php");

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
