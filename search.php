<?php
session_start();
require("includes.php");

$site = new site();

$site -> genOpening("Search");

$site->genNavbar();

$site->contentBegin("Search");

$site->contentEnd();

$site -> genClosing();

?>