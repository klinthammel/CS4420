<?php
session_start();
require("includes.php");

if (ISSET($_GET["category"])) {
    $type = $_GET["category"];
}
else {
    $type = "all";
}

$site = new site();

$site -> genOpening("Catalog");

$site->genNavbar();

$site->contentBegin(ucfirst($type));
?>

<?php
$site->contentEnd();

$site -> genClosing();