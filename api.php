<?php
session_start();
require("includes.php");

// This is the API that will handle all of the behind-the-scenes stuff for the cart.

$action = strtolower($_GET["action"]);

if ($action == "add" || $action == "edit") {
    $item = strtolower($_GET["item"]);
    $quant = $_GET["quantity"];

    $_SESSION["cart"][$item] = $quant;
}
else if ($action == "remove") {
    $item = strtolower($_GET["item"]);
    unset($_SESSION["cart"][$item]);
}
else if ($action == "remove_all") {
    session_unset();
}
else {
    die("
<HTML>
<BODY>
<H1>unknown action</H1>
</BODY>
</HTML>
"
);
}


echo("
<HTML>
<BODY>
<H1>done</H1>
</BODY>
</HTML>
"
);