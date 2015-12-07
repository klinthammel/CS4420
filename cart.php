<?php
//start the user session
session_start();

//require the includes.php which ensures certain files are pulled in for database and site properties.
require("includes.php");

//create a PDO connection to the mySQL databse.
$db = new PDO("mysql:host={$GLOBALS['mysql_host']};dbname={$GLOBALS['mysql_database']}", $GLOBALS["mysql_user"], $GLOBALS["mysql_password"])
    or die("Unable to connect to database.");

	//generate the site home.
$site = new site("cart");

//call the genOpeneing method to generate the opening content of the home page.
$site -> genOpening();

//call the genSearch method to genreate the search bar on the top of the page.
$site -> genSearch();

//call readText method to pull information into the page from seperate source.
$site ->readText("cart");

// If we find sections of the cart set, display the table.
// We are using map here because sizeof() doesn't handle nested arrays
if(isset($_SESSION["cart"]) && @max(array_map('count', $_SESSION["cart"])) > 0) {
    // Generate the heading of the table
    echo "<table><tr><th>Product</th><th>Quantity</th></tr>";
    //Iterate through the cart, setting the product name as $key and the quantity as $value
    foreach($_SESSION["cart"] as $key=>$value) {
        // Echo a table row with the information and a button.
        echo "<tr><td>$key</td><td>$value <button onclick='action(\"remove\",\"{$key}\")'>- Remove</button></td></tr>";
    }
    // Close out the table.
    echo "</table>";

    // Display another API button to remove all of the products out of the cart
    echo "<button onclick='action(\"remove_all\",\"\")'>-- Remove All</button>";
}
else {
    // If we don't have any items in the cart, display a nice message instead.
    echo "You have no contents in your cart.";
}

//call genClosing method to generate bottom of page and close html.
$site -> genClosing();