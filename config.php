<?php
  session_start();

  error_reporting(E_ALL);
	ini_set('error_reporting', E_ALL);

	//pasing the data for the live database......... using mysqli procedural method to connect to the DATABASE
  //I chose this method so that regardless of what server this code is inserted into it will be able to generate the
  // the database dynamically ..... voala
	// $mysqli = mysqli_connect("localhost", "u16186258", "Rotimi@1995", "u16186258");

  //testing parsing of data using localhost database
  $mysqli = mysqli_connect("localhost", "root", "", "dbshots");
  // $mysqli = mysqli_connect("localhost", "u16186258", "ytfzytay", "dbu16186258");

  if(!$mysqli)
    die("Connection failed" . mysqli_connect_error());

    // Make my_db the current database
  // $db_selected = mysqli_select_db('shotsdbusers', $mysqli);

  // if (!$db_selected) {
    // If we couldn't, then it either doesn't exist, or we can't see it.
    // $sql = 'CREATE DATABASE shotsdbusers';

    // if (mysqli_query($sql, $mysqli)) {
    //     echo "Database my_db created successfully\n";
    // } else {
    //     echo 'Error creating database: ' . mysqli_error() . "\n";
    // }
  // }

 ?>
