<?php
session_start();
require("includes.php");

$site = new site();

$site -> genOpening("Catalog");

$site->genNavbar();

$site->contentBegin("Catalog");
?>

<?php
$site->contentEnd();

$site -> genClosing();