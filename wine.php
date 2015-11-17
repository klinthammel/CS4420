<?php
session_start();
require("includes.php");

$site = new site();

$site -> genOpening("Wine");

$site->genNavbar();

$site->contentBegin("Wine");
?>

<?php
$site->contentEnd();

$site -> genClosing();