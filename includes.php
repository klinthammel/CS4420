<?php

// Including the "site class"
require_once("var/site.php");

// Loading the default set of config variables
require_once("var/config.php");

// Loading the customized set of config variables, if the file exists.
if (file_exists("var/config.inc.php")) include_once("var/config.inc.php");