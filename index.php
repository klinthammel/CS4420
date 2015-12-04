<?php
//start the user session
session_start();

//require the includes.php which ensures certain files are pulled in for database and site properties.
require("includes.php");

//create a PDO connection to the mySQL databse.
$db = new PDO("mysql:host={$GLOBALS['mysql_host']};dbname={$GLOBALS['mysql_database']}", $GLOBALS["mysql_user"], $GLOBALS["mysql_password"])
    or die("Unable to connect to database.");

	//generate the site home.
$site = new site("home");

//call the genOpeneing method to generate the opening content of the home page.
$site -> genOpening();

//call the genSearch method to genreate the search bar on the top of the page.
$site -> genSearch();

//call readText method to pull information into the page from seperate source.
$site ->readText("welcome");

//call genClosing method to generate bottom of page and close html.
$site -> genClosing();