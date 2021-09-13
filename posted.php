<?php include './config.php' ?>

<?php
	// See all errors and warnings

  // $email = isset($_SESSION["email"]) ? $_SESSION["email"] : false;
	// $pass = isset($_SESSION["password"]) ? $_SESSION["password"] : false;
  $email = $_SESSION["email"];
	$pass = $_SESSION["password"];
	// if email and/or pass POST values are set, set the variables to those values, otherwise make them false
  // echo $_POST["pt"];
	$file = isset($_POST["file"]) ? $_POST["file"] : false;
	// if file value is set, set the variable to the value, otherwise make it false
?>

<!DOCTYPE html>
<html lang="en">
  <head>
      <!-- Required meta tags -->
      <meta charset="UTF-8" />

      <!-- For viewable area on the browser -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- Replace Name Surname with your name and surname -->
      <meta name="author" content="Gabriel Shoderu" />

      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
      <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

      <!-- Js -->
      <!-- <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script> -->
      <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
      <script type="text/javascript" src="./js/script.js"></script>

      <!-- myCSS -->
      <link rel="stylesheet" type="text/css" href="css/style.css">

      <title>Shots</title>

      <link rel="icon" href="./Favicon/1x/Asset1.png" type="image/png" sizes="16x16">

      <!-- icon in button import -->
      <script src="https://kit.fontawesome.com/8c295ab0e4.js" crossorigin="anonymous"></script>

  </head>
  <body class="darkMode">
    <div class="container">

      <nav class="navbar navbar-expand navbar-light bg-light">
        <a class="navbar-brand navText" href="homepage.php">
          <img src="./Favicon/1x/Asset1.png" width="30" height="30" class="d-inline-block align-top" alt="">
          Shots
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">

          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="homepage.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="global.php">Global</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="global.php">Post  <span class="sr-only">(current)</span></a>
            </li>
          </ul>

          <form class="form-inline my-2 my-lg-0" method="POST" action="search.php">
            <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search">
            <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Search</button>
          </form>

          <div class="bs-example ml-2">
            <div class="dropdown">
                <a class="navbar-brand navProfile dropdown-toggle" data-toggle="dropdown" href="#">
                  <?php

                      $user = $_SESSION['user'];

                      $query89 = "SELECT * FROM tbusers WHERE user_id = '$user'";
                      $res89 = $mysqli->query($query89);
                      $row89 = mysqli_fetch_array($res89);

                      $query = "SELECT * FROM tbprofilepic WHERE user_id = '$user'";
                      $res = $mysqli->query($query);

                      $noProfile = "profilePic/no-profile-image.png";

                      if($row = mysqli_fetch_array($res)){
                        echo "<img src=" . $row['filename'] . " width='30' height='30' class='d-inline-block align-top' alt=''>";
                        echo "&nbsp;" . $row89['name'] ;
                        $_SESSION['filename'] = $row['filename'];
                      }else {
                        // code...
                        echo "<img src=" . $noProfile . " width='30' height='30' class='d-inline-block align-top' alt=''>";
                        echo "&nbsp;" . $row89['name'] ;
                        $_SESSION['filename'] = $noProfile;
                      }
                  ?>
                </a>
                <div class="dropdown-menu">
                    <a href="profile.php" class="dropdown-item"><i class="fas fa-user"></i> Profile</a>
                    <a href="logout.php" class="dropdown-item"><i class="fas fa-power-off"></i> Logout</a>
                </div>
            </div>
        </div>

        </div>

      </nav>

      <?php

        // echo $_POST["pt"];

        $id = isset($_POST["pt"]) ? $_POST["pt"] : false;

        $query = "SELECT * FROM tbgallery WHERE image_id = '$id'";
        $res = $mysqli->query($query);

        $row = mysqli_fetch_array($res);

        echo "
        <div class='row justify-content-center'>
          <div class='col-8'>
            <div class='card mt-5'>
              <div class='card-header'>
                <div class='row'>";

                $useID =  $row['user_id'];

                $query4 = "SELECT * FROM tbusers WHERE user_id = '$useID'";
                $res4 = $mysqli->query($query4);
                $row4 = mysqli_fetch_array($res4);

                $query5 = "SELECT * FROM tbprofilepic WHERE user_id = '$useID'";
                $res5 = $mysqli->query($query5);

                $noProfile = "./no-profile-image.png";

                if($row5 = mysqli_fetch_array($res5)){
                  echo "<div class=''><img src='" . $row5['filename'] . "' width='38' height='38' class='d-inline-block align-top' alt='' /> &nbsp; </div>";
                }else {
                  // code...
                  echo "<div class=''><img src='" . $noProfile . "' width='38' height='38' class='d-inline-block align-top' alt='' /></div>";
                }

                echo "
                <div class='mt-3'><h6><a href='' class='otherProfile'>" . $row4['name'] . "</a></h6></div>
                  <input type='hidden' name='otherId' id='otherId' value = '" . $row4["user_id"] . "'/>
                  </div>
                  </div>
                  <div class='card-body commentPage'>
                    <div class='row imageGallery'>
                      <div class='col-6' style = 'background-image: url(" . $row['filename'] ."); background-repeat: no-repeat;'>

                      </div>
                      <div class='col-6'>
                        <div class='row'>
                          <div class='col-12 card-body'>
                            <p>" . $row['description'] . "<br/>" . $row['hashtags'] ."</p>
                            <div class='text-center'>
                              <input type='text' name='comment' id='comment' placeholder = 'Add a comment'/>
                              <a href=''type='button' class='comment btn btn-light'>Comment </a>
                              <input type='hidden' name='email' id='loginEmail' value = '" . $email . "'/>
                              <input type='hidden' name='pass' id='loginPass' value = '" . $pass . "'/>
                              <input type='hidden' name='user' id='loginUser' value = '" . $_SESSION['user'] . "'/>
                              <input type='hidden' name='nme' id='loginName' value = '" . $_SESSION['name'] . "'/>
                              <input type='hidden' name='imgId' id='imgId' value = '" . $row["image_id"] . "'/>
                            </div> <br/>";

                            $i = $row["image_id"];

                            $query7 = "SELECT * FROM tbcomment WHERE image_id = '$i'";
                            $res7 = $mysqli->query($query7);

                            while($row7 = mysqli_fetch_array($res7)) {

                              $j = $row7["user_id"];

                              $query8 = "SELECT * FROM tbusers WHERE user_id = '$j'";
                              $res8 = $mysqli->query($query8);

                              if ($row8 = mysqli_fetch_array($res8)) {
                                // code...
                                echo "<p><b style:'color:black;'> " . $row8["name"] . "</b> &nbsp;" . $row7["comment"] . " </p>";
                              }

                            }
                      echo "
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
          </div>
          ";

      ?>

    </div>
  </body>
</html>
