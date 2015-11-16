<?php
session_start();
require("includes.php");

$site = new site();

$site -> genOpening("Home");

$site -> genContent();

$site ->genNavbar();
?>

We're working on this, please wait!

<?php
$site -> genClosing();