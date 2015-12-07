<?php
//start the user session
session_start();

//require the includes.php which ensures certain files are pulled in for database and site properties.
require("includes.php");

// Grab the category out of the query string, or set the variable to the default
ISSET($_GET["category"]) ? $type = strtolower($_GET["category"]) : $type = "catalog";

//create a PDO connection to the mySQL databse.
$db = new PDO("mysql:host={$GLOBALS['mysql_host']};dbname={$GLOBALS['mysql_database']}", $GLOBALS["mysql_user"], $GLOBALS["mysql_password"])
or die("Unable to connect to database.");

// Switching out the query based on the type
if ($type == "non_alcoholic") {
    // Query for non-alcohol
    $stmt = "SELECT i.`Barcode`, `Product`,`Category`,`Price`,`Stock` FROM `items_non` as i RIGHT JOIN `description_non` as d on d.Barcode = i.Barcode WHERE d.type=:type";
}
else if ($type == "all" || $type == "catalog") {
    // Query which doesn't have the type.
    $stmt = "SELECT i.`Barcode`, `Product`,`Category`,`Price`,`Stock` FROM `items_alcohol` as i RIGHT JOIN `description_alcohol` as d on d.Barcode = i.Barcode";
}
else {
    // Include the field for type
    $stmt = "SELECT i.`Barcode`, `Product`,`Category`,`Price`,`Stock` FROM `items_alcohol` as i RIGHT JOIN `description_alcohol` as d on d.Barcode = i.Barcode WHERE d.type=:type";
}

// Create a new statement handle, with the statement we created above
$sth = $db->prepare($stmt);

// Replace the :type param with the type given
@$sth->bindParam(":type", $type);

// Execute the search against the database
$sth->execute() or die("Unable to execute");

// Fetch the results from the statement handle
$result = $sth->fetchAll();

// Create a new "site" object
$site = new site(strtolower($type));

//call the genOpeneing method to generate the opening content of the page.
$site -> genOpening();

//call the genSearch method to generate the search bar on the top of the page.
$site->genSearch();

// Display the text from our static contents
$site->readText($type);

// Echo the top of the table
echo <<< ENDL
<table class="sortable">
	<tr>
		<th>Product</th>
		<th>Type</th>
		<th>Wholesale</th>
		<th>Quantity</th>
		<th class="nj sorttable_nosort">Add to Cart</th>
	</tr>
ENDL;

/*
foreach($result as $row) {
    echo "<tr><td>{$row["Product"]}<br />(Barcode: {$row["Barcode"]})</td><td>{$row["Category"]}</td><td>\${$row["Price"]}.00</td><td>{$row["Stock"]}</td><td>";
    if ($row["Stock"] < 1) { echo "This product is currently unavailable"; }
    else {
        $addToId = strtolower(preg_replace('/[^a-z0-9]+/i', '_', $row["Product"]));
        echo "<select id='quantity_{$addToId}'>";
        for($i = 1; $i <= $row["Stock"]; $i++) {
            echo "<option value='$i'>$i</option>";
        }
        echo "</select><button onclick='action(\"add\",\"{$row["Product"]}\")'>+ Add</button>";
    }
    echo "</td></tr>\r\n";
}

echo "</table>";

$site -> genClosing();*/

// Looping through each row of the result
foreach($result as $row) {
    // Print out the table row data
    echo "<tr><td>{$row["Product"]}<br />(Barcode: {$row["Barcode"]})</td><td>{$row["Category"]}</td><td>\${$row["Price"]}.00</td><td>{$row["Stock"]}</td><td>";
    // If we don't have stock of the product, show a message
    if ($row["Stock"] < 1) { echo "This product is currently unavailable"; }
    else {
        // Otherwise, generate the text of the ID, each dropdown needs its own ID for the javascript
        // Generate the select element, with the ID generated above
        echo "<select id='quantity_{$row["Barcode"]}'>";
        for($i = 1; $i <= $row["Stock"]; $i++) {
            // Loop through, generating the options for the dropdown.
            echo "<option value='$i'>$i</option>";
        }
        // Generate the button.
        echo "</select><button onclick='action(\"add\",\"{$row["Barcode"]}\")'>+ Add</button>";
    }
    // Close out the row
    echo "</td></tr>\r\n";
}

// Close out the table
echo "</table>";

//call genClosing method to generate bottom of page and close html.
$site -> genClosing();