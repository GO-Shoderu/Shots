<?php include './config.php' ?>

<?php
	// See all errors and warnings

  // $email = isset($_SESSION["email"]) ? $_SESSION["email"] : false;
	// $pass = isset($_SESSION["password"]) ? $_SESSION["password"] : false;
  $email = $_SESSION["email"];
	$pass = $_SESSION["password"];
	// if email and/or pass POST values are set, set the variables to those values, otherwise make them false

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

        <!-- <nav class="navbar fixed-top navbar-expand navbar-light bg-light"> --> <!-- before uncommenting this to see what it does, uncomment line 103 and comment line 51, i disregarded this because of the white space-->
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
              <li class="nav-item ">
                <a class="nav-link" href="homepage.php">Home </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="global.php">Global</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="#">Search <span class="sr-only">(current)</span></a>
              </li>
            </ul>

            <form class="form-inline my-2 my-lg-0" method="POST" action="search.php">
              <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search">
              <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Search</button>
            </form>

            <div class="bs-example ml-2">
              <div class="dropdown">
                  <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown</a> -->
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
                      }else {
                        // code...
                        echo "<img src=" . $noProfile . " width='30' height='30' class='d-inline-block align-top' alt=''>";
                        echo "&nbsp;" . $row89['name'] ;
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

          $search = $_POST["search"];

          echo '<br /><div class="card">
            <div class="card-header">
              Search Results for "' . $search . '"
            </div>
            <div class="card-body">
              <h5 class="card-title"><b>By Profile</b> </h5>
              <div class="row">';

              // $query = "SELECT * FROM tbusers WHERE name = '$search' OR surname = '$search' OR email = '$search'";
              $query = "SELECT * FROM tbusers WHERE name LIKE '%$search%' OR surname LIKE '%$search%' OR email LIKE '%$search%'";
              $res = mysqli_query($mysqli, $query);

              $k = 0;

              while ($row = mysqli_fetch_array($res)) {
                $id = $row["user_id"];

                $query2 = "SELECT * FROM tbprofilepic WHERE user_id = '$id'";
                $res2 = $mysqli->query($query2);

                $noProfile = "profilePic/no-profile-image.png";

                if($row2 = mysqli_fetch_array($res2)){
                  echo '<div class="col-3 mt-2">';
                  echo "<a class='dropdown-item otherProfil' href=''><img src='" . $row2['filename'] . "' width='38' height='38' class='d-inline-block' alt='' /> " . $row["name"] . " " . $row["surname"] . "</a>";
                  echo "<input type='hidden' name='otherId' id='otherId' value = '" . $row["user_id"] . "'/>";
                  echo "</div>";
                }else {
                  // code...
                  echo '<div class="col-3 mt-2">';
                  echo "<a class='dropdown-item otherProfil' href=''><img src='" . $noProfile . "' width='38' height='38' class='d-inline-block' alt='' /> " . $row["name"] . " " . $row["surname"] . "</a>";
                  echo "<input type='hidden' name='otherId' id='otherId' value = '" . $row["user_id"] . "'/>";
                  echo "</div>";
                }

                $k++;
              }

              if ($k == 0) {
                // code...
                echo '
                <div class="col-3">
                  <p class="card-text">No profile results for ' . $search . '</p>
                </div>';

              }

              echo '
              </div>

              <br/><h5 class="card-title"><b>By Description </b> </h5>
              <div class="row">';

              $query = "SELECT * FROM tbgallery WHERE description LIKE '%$search%'";
              $res = mysqli_query($mysqli, $query);

              $k = 0;

              while ($row = mysqli_fetch_array($res)) {

                  echo '<div class="col-3 mt-2">';
                  echo "<form method='POST' action='posted.php'>
                    <input type='hidden' name='pt' id='pt' value = '" . $row["image_id"] . "'/>
                    <input type='submit' class='dropdown-item' value = '" . $row["description"] . "' />
                  </form>";
                  echo "</div>";

                $k++;
              }

              if ($k == 0) {
                // code...
                echo '
                <div class="col-3">
                  <p class="card-text">No profile results for ' . $search . '</p>
                </div>';

              }

              echo '
              </div>

              <br/><h5 class="card-title"><b>By Hashtags </b> </h5>
              <div class="row">';

              $query = "SELECT * FROM tbgallery WHERE hashtags LIKE '%$search%'";
              $res = mysqli_query($mysqli, $query);

              $k = 0;

              while ($row = mysqli_fetch_array($res)) {

                  echo '<div class="col-3 mt-2">';
                  echo "<form method='POST' action='posted.php'>
                    <input type='hidden' name='pt' id='pt' value = '" . $row["image_id"] . "'/>
                    <input type='submit' class='dropdown-item' value = '" . $row["description"] . "' />
                  </form>";
                  echo "</div>";

                $k++;
              }

              if ($k == 0) {
                // code...
                echo '
                <div class="col-3">
                  <p class="card-text">No profile results for ' . $search . '</p>
                </div>';

              }

              echo '
              </div>
            </div>
          </div>';

          // echo "You searching for " . $search;

        ?>

      </div>
    </body>
  </html>
