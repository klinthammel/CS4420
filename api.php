<?php
// Gain access to the session variables
session_start();

// Include all of our classes and configuration files
require("includes.php");

// This is the API that will handle all of the behind-the-scenes stuff for the cart.

//Grab the action out of the query string
$action = strtolower($_GET["action"]);

// If our action is "add"
if ($action == "add") {
    // Grab the item name out of the query string
    $item = strtolower($_GET["item"]);

    // Grab the quantity out of the query string
    $quant = $_GET["quantity"];

    // Set these values into the session variable
    $_SESSION["cart"][$item] = $quant;
}
else if ($action == "remove") {
    // Grab the item name out of the query string
    $item = strtolower($_GET["item"]);

    // Remove it from the session variable
    unset($_SESSION["cart"][$item]);
}
else if ($action == "remove_all") {
    // If the aciton is to remove all, nuke the session and generate a new one.
    session_unset();
}
else {
    // This means we don't recognize the action, so quit the file and show an error message.
    die("
<HTML>
<BODY>
<H1>unknown action</H1>
</BODY>
</HTML>
"
);
}

// If everything worked successfully, show a done message.
echo("
<HTML>
<BODY>
<H1>done</H1>
</BODY>
</HTML>
"
);