<?php
session_start();
require("includes.php");

$site = new site();

$site -> genOpening("Home");

$site->genNavbar();

$site->contentBegin("Home");

$site->contentEnd();

$site -> genClosing();

?>