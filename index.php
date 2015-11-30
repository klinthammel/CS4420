<?php
session_start();
require("includes.php");

$db = new PDO("mysql:host={$GLOBALS['mysql_host']};dbname={$GLOBALS['mysql_database']}", $GLOBALS["mysql_user"], $GLOBALS["mysql_password"])
    or die("Unable to connect to database.");

$site = new site("home");

$site -> genOpening();

$site -> genSearch();

$site ->readText("welcome");

$site -> genClosing();