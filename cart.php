<?php
//start the user session
session_start();

//require the includes.php which ensures certain files are pulled in for database and site properties.
require("includes.php");

//create a PDO connection to the mySQL databse.
$db = new PDO("mysql:host={$GLOBALS['mysql_host']};dbname={$GLOBALS['mysql_database']}", $GLOBALS["mysql_user"], $GLOBALS["mysql_password"])
    or die("Unable to connect to database.");

$sstmt1 = "SELECT `barcode`, `product` FROM `items_non` WHERE 1";
$sth1 = $db->prepare($sstmt1);
$sth1 -> execute();
$arr1 = $sth1->fetchAll();
$sstmt2 = "SELECT `barcode`, `product` FROM `items_alcohol` WHERE 1";
$sth2 = $db->prepare($sstmt2);
$sth2 -> execute();
$arr2 = $sth2->fetchAll();

$products = array_merge($arr1, $arr2);

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
        $productName = "Unknown Product";
        // Echo a table row with the information and a button.
        foreach($products as $row) {
            if ($row[0] == $key) {
                $productName = $row[1];
            }
        }
        echo "<tr><td>$productName</td><td>$value <button onclick='action(\"remove\",\"{$key}\")'>- Remove</button></td></tr>";
    }
    // Close out the table.
    echo "</table>";

    // Display another API button to remove all of the products out of the cart
    echo "<button onclick='action(\"remove_all\",\"\")'>-- Remove All</button>";

    echo <<< ENDL
<H2>Submit your order</h2>
Please note that all orders are for in-store pickup only.  This is for age compliance.
<form action="order.php" method="post">
<input type="hidden" name="order_action" value="store-order" />
<label for="fName">First Name: </label><input type="text" name="fName" id="fName" /><br />
<label for="lName">Last Name: </label><input type="text" name="lName" id="lName" /><br />
<label for="addrStreet">Street: </label><input type="text" name="addrStreet" id="addrStreet" /><br />
<label for="addrCity">City: </label><input type="text" name="addrCity" id="addrCity" /><br />
<label for="addrState">State: </label><input type="text" name="addrState" id="addrState" maxlength="2" size="2" /><br />
<label for="addrZip">Zip: </label><input type="text" name="addrZip" id="addrZip" min="1" maxlength="5" size="5" /><br />
<br />
Credit card information:<br />
<b>Because this site is a demo site, please do not put your real credit card information!</b><br />
<label for="ccNum">Credit Card Number: </label><input type="text" name="ccNum" id="ccNum" /><br />
<label for="exprMonth">Expires (MM/YYYY): </label><input type="text" name="exprMonth" id="exprMonth" maxlength="2" size="2" />/<input type="text" name="exprYear" id="exprYear" maxlength="4" size="4" /><br />
<label for="ccCCV">Credit Card CCV: </label><input type="text" name="ccCCV" id="ccCCV" maxlength="3" size="3" /><br />
<input type="submit" value="Submit my order!" />
<input type="reset" value="Reset this form" />
</form>
ENDL;

}
else {
    // If we don't have any items in the cart, display a nice message instead.
    echo "You have no contents in your cart.";
}

//call genClosing method to generate bottom of page and close html.
$site -> genClosing();