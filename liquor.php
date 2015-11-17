<?php
session_start();
require("includes.php");

$site = new site();

$site -> genOpening("Liquor");

$site->genNavbar();

$site->contentBegin("Liquor");
?>

<?php
$site->contentEnd();

$site -> genClosing();