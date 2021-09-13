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

        <!-- Js -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="./js/script.js"></script>

        <!-- myCSS -->
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <!-- <style type="text/css">
        	div.col div{
        		height: 50px;
        	}
        </style> -->

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
                <a class="nav-link" href="homepage.php">Home </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="global.php">Global</a>
              </li>
              <li class="nav-item  active">
                <a class="nav-link" href="#">Profile <span class="sr-only">(current)</span></a>
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

        <br/>

        <h1 class="mt-3 mb-3">Profile Page</h1>
    		<div class="row">

          <?php

              if (isset($_POST["otherId"])) {
                // code...

                $user = $_POST["otherId"];
              } else {
                // code...

                $user = $_SESSION['user'];
              }


              $query = "SELECT * FROM tbprofilepic WHERE user_id = '$user'";
  					  $res = $mysqli->query($query);

              $noProfile = "profilePic/no-profile-image.png";

              if($row = mysqli_fetch_array($res)){
                echo "<div class='col-3 profilePic' style = 'background-image: url(" . $row['filename'] . "); background-repeat: no-repeat;'>

          			</div>";
              }else {
                echo "<div class='col-3 profilePic' style = 'background-image: url(" . $noProfile . "); background-repeat: no-repeat;'>

          			</div>";
              }

          ?>



    			<div class="col profile">
    				<div data-type="text" class="details">
    					<b class="profile">Name:</b> <span>
                 <?php
                 if (isset($_POST["otherId"])) {
                   // code...

                   $user = $_POST["otherId"];
                 } else {
                   // code...

                   $user = $_SESSION['user'];
                 }

                 $query = "SELECT * FROM tbusers WHERE user_id = '$user'";
                 $res = $mysqli->query($query);

                 $row = mysqli_fetch_array($res);

                 $_SESSION['name'] = $row['name'];

                  echo $row['name'] .  '</span>';

                  if (isset($_POST["otherId"])) {

                  }else {
                    // code...
                  echo ' <button class="btn btn-dark float-right" data-index="editName">Edit</button>';
                 }
               ?>
    				</div>
    				<div data-type="text" class="details">
    					<b class="profile">Surname:</b> <span>
                <?php
                if (isset($_POST["otherId"])) {
                  // code...

                  $user = $_POST["otherId"];
                } else {
                  // code...

                  $user = $_SESSION['user'];
                }

                $query = "SELECT * FROM tbusers WHERE user_id = '$user'";
                $res = $mysqli->query($query);

                $row = mysqli_fetch_array($res);

                $_SESSION['surname'] = $row['surname'];

                 echo $row['surname'] .  '</span>';

                 if (isset($_POST["otherId"])) {

                 }else {
                   // code...
                   echo ' <button class="btn btn-dark float-right" data-index="editSurname">Edit</button>';
                 }
               ?>
    				</div>
    				<div data-type="email" class="details">
    					<b class="profile">Email:</b> <span>
                <?php
                if (isset($_POST["otherId"])) {
                  // code...

                  $user = $_POST["otherId"];
                } else {
                  // code...

                  $user = $_SESSION['user'];
                }

                $query = "SELECT * FROM tbusers WHERE user_id = '$user'";
                $res = $mysqli->query($query);

                $row = mysqli_fetch_array($res);

                $_SESSION['email'] = $row['email'];

                 echo $row['email'] .  '</span>';

                 if (isset($_POST["otherId"])) {

                 }else {
                   // code...
                 echo '<button class="btn btn-dark float-right" data-index="editEmail">Edit</button>';
               }
               ?>
    				</div>
    				<div data-type="date" class="details">
    					<b class="profile">Birth date:</b> <span>
                <?php
                if (isset($_POST["otherId"])) {
                  // code...

                  $user = $_POST["otherId"];
                } else {
                  // code...

                  $user = $_SESSION['user'];
                }

                $query = "SELECT * FROM tbusers WHERE user_id = '$user'";
                $res = $mysqli->query($query);

                $row = mysqli_fetch_array($res);

                $_SESSION['birthday'] = $row['birthday'];

                 echo $row['birthday'] .  '</span>';

                 if (isset($_POST["otherId"])) {


                 }else {
                   echo '<button class="btn btn-dark float-right" data-index="editDate">Edit</button>';
                 }
              ?>
    				</div>

            <?php
            if (isset($_POST["otherId"])) {


            }else {
              // code...
              echo "
              <div class='details'>
                <form method='POST' action='profilePicUpdate.php'  enctype='multipart/form-data'>";

                          if($email && $pass){

                            echo 	"
                            <input type='hidden' name='email' id='loginEmail' value = '" . $email . "'/>
                            <input type='hidden' name='pass' id='loginPass' value = '" . $pass . "'/>
          									<input type='hidden' name='user' id='loginUser' value = '" . $_SESSION['user'] . "'/>";
                          }
                echo "
                    <b class='profile'>Change profile Picture: </b>
                    <input type='file' class='form-control' name='picToUpload' id='picToUpload' multiple='multiple'' />
                    <button type='submit' class='btn btn-dark float-right' name='submit'>Upload Image </button>
                </form> <br/> <br/>
              ";

              echo '
                <div class = "row">
                <div class = "col-3 text-center">
                  <div class="dropdown">
                    <button class="navbar-brand btn dropdown-toggle btn-dark" id="dropdownFollowersButton" type="button" data-toggle="dropdown">';
                    // class="navbar-brand navProfile dropdown-toggle" data-toggle="dropdown"

                    $follower = array();

                    $query6 = "SELECT * FROM tbfollow WHERE following = '$user'";
    					      $res6 = $mysqli->query($query6);

                    while($row6 = mysqli_fetch_array($res6)) {
                      $follower[] = $row6["follower"];
                    }

                    $followerLength = count($follower);

                      echo $followerLength . ' Followers
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownFollowersButton">';

                      $a = 0;

                      while ($a < $followerLength) {
                        // code...
                        $id = $follower[$a];

                        $query7 = "SELECT * FROM tbprofilepic WHERE user_id = '$id'";
        					      $res7 = $mysqli->query($query7);

                        $noProfile = "profilePic/no-profile-image.png";

                        $query8 = "SELECT * FROM tbusers WHERE user_id = '$id'";
        					      $res8 = $mysqli->query($query8);

                        $row8 = mysqli_fetch_array($res8);

                        if($row7 = mysqli_fetch_array($res7)){
                          echo "<a class='dropdown-item otherProfil' href=''><img src='" . $row7['filename'] . "' width='38' height='38' class='d-inline-block' alt='' /> " . $row8["name"] . "</a>";
                          echo "<input type='hidden' name='otherId' id='otherId' value = '" . $row8["user_id"] . "'/>";
                        }else {
                          // code...
                          echo "<a class='dropdown-item otherProfil' href=''><img src='" . $noProfile . "' width='38' height='38' class='d-inline-block' alt='' /> " . $row8["name"] . "</a>";
                          echo "<input type='hidden' name='otherId' id='otherId' value = '" . $row8["user_id"] . "'/>";
                        }

                        $a++;
                      }

                    echo '</div>
                  </div>
                </div>

                <div class = "col-3 text-center">
                  <div class="dropdown">
                    <button class="navbar-brand btn dropdown-toggle btn-dark" id="dropdownFollowingButton" type="button" data-toggle="dropdown">
                      Following ';

                      $following = array();

                      $query9 = "SELECT * FROM tbfollow WHERE follower = '$user'";
      					      $res9 = $mysqli->query($query9);

                      while($row9 = mysqli_fetch_array($res9)) {
                        $following[] = $row9["following"];
                      }

                      $followingLength = count($following);

                      echo $followingLength . '
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownFollowingButton">';

                    $a = 0;

                    while ($a < $followingLength) {
                      // code...
                      $id = $following[$a];

                      $query10 = "SELECT * FROM tbprofilepic WHERE user_id = '$id'";
                      $res10 = $mysqli->query($query10);

                      $noProfile = "profilePic/no-profile-image.png";

                      $query11 = "SELECT * FROM tbusers WHERE user_id = '$id'";
                      $res11 = $mysqli->query($query11);

                      $row11 = mysqli_fetch_array($res11);

                      if($row10 = mysqli_fetch_array($res10)){
                        echo "<a class='dropdown-item otherProfil' href=''><img src='" . $row10['filename'] . "' width='38' height='38' class='d-inline-block' alt='' /> " . $row11["name"] . "</a>";
                        echo "<input type='hidden' name='otherId' id='otherId' value = '" . $row11["user_id"] . "'/>";
                      }else {
                        // code...
                        echo "<a class='dropdown-item otherProfil' href=''><img src='" . $noProfile . "' width='38' height='38' class='d-inline-block' alt='' /> " . $row11["name"] . "</a>";
                        echo "<input type='hidden' name='otherId' id='otherId' value = '" . $row11["user_id"] . "'/>";
                      }

                      $a++;
                    }


                      echo '
                    </div>
                  </div>
                </div>

                <div class = "col-3 text-center">
                  <div class="dropdown">
                    <button class="navbar-brand btn dropdown-toggle btn-dark" id="dropdownFollowingButton" type="button" data-toggle="dropdown">
                      Friends
                    </button>
                    <!--<div class="dropdown-menu" aria-labelledby="dropdownFriendsButton">
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>-->
                  </div>
                </div>

                <div class = "col-3 text-center">

                  <button class="btn btn-danger navbar-brand deleteAcc" type="button" >
                    Delete Account
                    <input type="hidden" name="dele" id="dele" value = "' . $_SESSION['user'] . '"/>
                  </button>

                </div>
                </div>
              </div>';
            }
             ?>


            <!-- <div class="details">
              <form method="POST" action="profilePicUpdate.php"  enctype='multipart/form-data'>
                  <?php

                        // if($email && $pass){
                        //
                        //   echo 	"
                        //   <input type='hidden' name='email' id='loginEmail' value = '" . $email . "'/>
                        //   <input type='hidden' name='pass' id='loginPass' value = '" . $pass . "'/>
        								// 	<input type='hidden' name='user' id='loginUser' value = '" . $_SESSION['user'] . "'/>";
                        // }
                  ?>
                  <b class="profile">Change profile Picture: </b>
                  <input type='file' class='form-control' name='picToUpload' id='picToUpload' multiple='multiple' />
                  <button type="submit" class="btn btn-dark float-right" name='submit'>Upload Image </button>
              </form>
            </div> -->
    			</div>
    		</div>

        <br />

        <!-- <div class="card">
          <div class='card-header'>
            Post
          </div>
          <form method="POST" action="post.php"  enctype='multipart/form-data'>
            <div class="card-body">

              <div class="row">
                <div class="col-12 col-lg-6">
                  <label for="description">Description:</label>
                  <textarea class="form-control" id="description" name="description" rows="1"></textarea>
                </div>
                <div class="col-12 col-lg-6">
                  <label for="hashtags">Hashtags:</label>
                  <textarea class="form-control" id="hashtags" name="hashtags" rows="1"></textarea>
                </div>
              </div>

              <div class="row mt-3">
                <div class="col-12 col-lg-6 input-group-prepend">
                  <span class="input-group-text ml-2">Upload</span>
                  <input type='file' class='form-control' name='picToUpload' id='picToUpload' multiple='multiple' />
                </div> -->

                <?php

                    if($email && $pass){

                      // echo "<p> I got in email and pass </p>";

                      echo 	"
                      <input type='hidden' name='email' value = '" . $email . "'/>
                      <input type='hidden' name='pass' value = '" . $pass . "'/>";
                    }

                    // die();
                ?>

                <!-- <div class="col-12 col-lg-6 text-center adjust">
                  <button type="submit" class="btn btn-dark" name='submit'>Upload Image </button>
                </div>
              </div>
            </div>
          </form>
        </div> -->

        <br /><br />

        <?php

          if (isset($_POST["otherId"])) {
            // code...

            $user = $_POST["otherId"];
          } else {
            // code...

            $user = $_SESSION['user'];
          }

          $query3 = "SELECT * FROM tbgallery WHERE user_id = '$user' ORDER BY image_id DESC";
          // $query3 = "SELECT * FROM tbgallery WHERE user_id = '$user'";
          $res3 = $mysqli->query($query3);

            echo "<div class = 'card'>";
              echo "<div class='card-header'>
              <ul class='nav nav-tabs card-header-tabs'>
                <li class='nav-item'>
                  <a class='nav-link active' id='allImages' href=''>All Images</a>
                </li>
                <li class='nav-item' >";

                  if (isset($_POST["otherId"])) {
                    echo "<a class='nav-link' id='gotoOtherAlb' href=''>Albums</a>";
                    echo "<input type='hidden' name='otherId' id='otherId' value = '" . $_POST["otherId"] . "'/>";
                  }else {
                    echo "
                      <a class='nav-link' id='' href='profileAlbum.php#imageGallery'>Albums</a>";
                  }

              echo "  </li>
              </ul>
              </div>";
              echo "<div class='card-body'>";
                echo "<div class = 'row imageGallery' id = 'imageGallery'>";

                if (isset($_POST["otherId"])) {


                }else {

                    echo 	"
                      <div class = 'col-3 addImage mt-2' style = 'background-image: url(gallery/addImage.png); background-repeat: no-repeat; background-size: 80% 80%;'>
                        <input type='hidden' name='pt' id='pt' value = '85'/>
                      </div>
                    ";
                }
                    while($row3 = mysqli_fetch_array($res3)) {
                      // code...
                        echo 	"
                          <div class = 'col-3 profBut mt-2' style = 'background-image: url(" . $row3['filename'] ."); background-repeat: no-repeat;'>
                            <input type='hidden' name='pt' id='pt' value = '" . $row3["image_id"] . "'/>
                          </div>
                        ";
                      }

              echo "</div>";
            echo "</div>";
          echo "</div>";

        ?>
        <br/>
      </div>
    </body>
  </html>
