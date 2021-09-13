<?php include './config.php' ?>

<?php
  // && isset($_SESSION['password'])
  if (isset($_SESSION['user'])) {
    # code...
    //redirecting the user to the homepage.........
    header("Location: homepage.php");

    //terminating this page if the user already have a Session
    exit();
  }
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

        <!-- myCSS -->
        <link rel="stylesheet" type="text/css" href="css/style.css">

        <title>Shots</title>

        <link rel="icon" href="./Favicon/1x/Asset1.png" type="image/png" sizes="16x16">

        <!-- icon in button import -->
        <script src="https://kit.fontawesome.com/8c295ab0e4.js" crossorigin="anonymous"></script>

    </head>
    <body class="splash">
        <div class="container">

                <div class="row align-items-center">

                        <!-- the logo side -->
                        <div class="col-md-6 col-12 forPic">
                          <div class = 'row image '>
                            <div class="col-sm-12" style = "background-image: url('./Logo/4x/Asset4x.png')">
                              <!-- Div for the image/logo -->
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6 col-12 verticalAlign">
                          <div class="row">

                            <div class="col-sm-10 margLeft">
                              <form action="validate-login.php" method="post">

                                  <div class="card text-white bg-secondary">
                                      <div><h5 class="card-header">Login</h5></div>
                                      <div class="card-body">
                                        <div class="form-row">
                                            <div class="form-group col-lg-6 col-sm-12">
                                                <label for="email">Email address:</label>
                                                <input type="email" class="form-control" name="email" id="email" placeholder="john.doe@gmail.com"/>
                                            </div>
                                            <div class="form-group col-lg-6 col-sm-12">
                                                <label for="pass">Password:</label>
                                                <input type="password" class="form-control" name="pass" id="pass" placeholder="********"/>
                                            </div>
                                        </div>

                                        <?php
                                          if(isset($_SESSION['goAhead']) && $_SESSION['goAhead'] == "yep")
                                          {
                                            echo "<p style='color:darkgreen;font-weight: bold;text-align: center;'>" . "Account Created successfully for " . $_SESSION['name'] . "<br />";
                                            echo "You can Login now" . "</p>";
                                            $_SESSION['name'] = "";
                                            $_SESSION['goAhead'] = " ";
                                          }
                                        ?>
                                        <?php
                                          if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == "false")
                                          {
                                            echo "<p style='color:darkred;font-weight: bold;text-align: center;'>" . "Please open an account, email not found" . "</p>";
                                            $_SESSION['loggedIn'] = '';
                                            $_SESSION['password'] = '';
                                          }
                                        ?>
                                        <?php
                                          if(isset($_SESSION['password']) && $_SESSION['password'] == "false")
                                          {
                                            echo "<p style='color:darkred;font-weight: bold;text-align: center;'>" . "Enter correct password" . "</p>";
                                            // echo 'password issues';
                                            $_SESSION['password'] = '';
                                          }
                                        ?>

                                        <button class="btn btn-dark">Login <i class="fas fa-angle-right"></i></button>

                                    </div>
                                </div>
                            </form>
                          </div>

                          <div class="col-sm-10 marg margLeft">
                            <form action="validate-signup.php" method="post">
                                <div class="card text-white bg-secondary">
                                    <div><h5 class="card-header">Register</h5></div>
                                    <div class="card-body">
                                        <div class="form-row">
                                            <div class="form-group col-lg-6 col-sm-12">
                                                <label for="fname">First name:</label>
                                                <input type="text" class="form-control" name="fname" id="fname" placeholder="John"/>
                                            </div>
                                            <div class="form-group col-lg-6 col-sm-12">
                                                <label for="lname">Last name:</label>
                                                <input type="text" class="form-control" name="lname" id="lname" placeholder="Doe"/>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-lg-6 col-sm-12">
                                                <label for="email1">Email address:</label>
                                                <input type="email" class="form-control" name="email" id="email" placeholder="john.doe@gmail.com"/>
                                            </div>
                                            <div class="form-group col-lg-6 col-sm-12">
                                                <label for="date">Date of birth:</label>
                                                <input type="date" class="form-control" name="date" id="date"/>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-lg-6 col-sm-12">
                                                <label for="pass1">Create password:</label>
                                                <input type="password" class="form-control" name="pass1" id="pass1" placeholder="********"/>
                                            </div>
                                            <div class="form-group col-lg-6 col-sm-12">
                                                <label for="pass1">Confirm password:</label>
                                                <input type="password" class="form-control" name="pass2" id="pass2" placeholder="********"/>
                                            </div>
                                        </div>

                                        <?php
                                          if(isset($_SESSION['exist']) && $_SESSION['exist'] == "yep")
                                          {
                                            echo "<p style='color:darkgreen;font-weight: bold;text-align: center;'>" . "You already exist on our database" . "</p>";
                                            $_SESSION['exist'] = " ";
                                          }elseif (isset($_SESSION['check']) && $_SESSION['check'] == "blank") {
                                            // code...
                                            echo "<p style='color:darkred;font-weight: bold;text-align: center;'>" . "All fields are required" . "</p>";
                                            $_SESSION['check'] = " ";
                                          }elseif (isset($_SESSION['match']) && $_SESSION['match'] == "noMatch") {
                                            // code...
                                            echo "<p style='color:darkred;font-weight: bold;text-align: center;'>" . "Password do not match" . "</p>";
                                            $_SESSION['match'] = " ";
                                          }
                                        ?>

                                        <button class="btn btn-dark">Create an Account <i class="fas fa-angle-right"></i></button>

                                    </div>
                                </div>
                            </form>
                        </div>
                      </div>
                    </div>

                </div>
        </div>
    </body>
</html>
