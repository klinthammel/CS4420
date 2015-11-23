<?php
session_start();
require("includes.php");

if (ISSET($_GET["category"])) {
    $type = $_GET["category"];
}
else {
    $type = "all";
}

$db = new PDO("mysql:host={$GLOBALS['mysql_host']};dbname={$GLOBALS['mysql_database']}", $GLOBALS["mysql_user"], $GLOBALS["mysql_password"])
or die("Unable to connect to database.");

$site = new site();

$site -> genOpening(ucfirst($type));

$site->genNavbar();

$site->contentBegin(ucfirst($type));

$site->contentEnd();

$site -> genClosing();

?>