<?php
session_start();
require("includes.php");

$site = new site();

$site -> genOpening("Beer");

$site->genNavbar();

$site->contentBegin("Beer");
?>

<?php
$site->contentEnd();

$site -> genClosing();