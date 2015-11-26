<?php
session_start();
require("includes.php");

if (ISSET($_GET["category"])) {
    $type = strtolower($_GET["category"]);
}
else {
    $type = "all";
}

$db = new PDO("mysql:host={$GLOBALS['mysql_host']};dbname={$GLOBALS['mysql_database']}", $GLOBALS["mysql_user"], $GLOBALS["mysql_password"])
or die("Unable to connect to database.");

switch($type) {
	case "beer":
		$stmt = "SELECT i.`Barcode`, `Product`,`Category`,`Price`,`Stock` FROM `items_alcohol` as i RIGHT JOIN `description_alcohol` as d on d.Barcode = i.Barcode WHERE d.type='beer'";
		break;
	
	case "liquor":
		$stmt = "SELECT i.`Barcode`, `Product`,`Category`,`Price`,`Stock` FROM `items_alcohol` as i RIGHT JOIN `description_alcohol` as d on d.Barcode = i.Barcode WHERE d.type='liquor'";
		break;
	
	case "non_alcoholic":
		$stmt = "SELECT i.`Barcode`, `Product`,`Category`,`Price`,`Stock` FROM `items_non` as i RIGHT JOIN `description_non` as d on d.Barcode = i.Barcode WHERE d.type='non_alcoholic'";
		break;
	
	case "wine":
		$stmt = "SELECT i.`Barcode`, `Product`,`Category`,`Price`,`Stock` FROM `items_alcohol` as i RIGHT JOIN `description_alcohol` as d on d.Barcode = i.Barcode WHERE d.type='wine'";
		break;
	
	default:
		$stmt = "SELECT i.`Barcode`, `Product`,`Category`,`Price`,`Stock` FROM `items_alcohol` as i RIGHT JOIN `description_alcohol` as d on d.Barcode = i.Barcode";
}

$sth = $db->query($stmt) or die("Unable to query");

$result = $sth->fetchAll();

$site = new site(strtolower($type));

$site -> genOpening();

$site->genSearch();

echo <<< ENDL
<table class="sortable">
	<tr>
		<th>Product</th>
		<th>Category</th>
		<th>Wholesale</th>
		<th>Quantity</th>
		<th class="nj sorttable_nosort">Add to Cart</th>
	</tr>
ENDL;

foreach($result as $row) {
    echo "<tr><td>{$row["Product"]}<br />(Barcode: {$row["Barcode"]})</td><td>{$row["Category"]}</td><td>\${$row["Price"]}.00</td><td>{$row["Stock"]}</td><td>";
    if ($row["Stock"] < 1) { echo "This product is currently unavailable"; }
    else {
        echo "<select id='quantity_{$row["Product"]}'>";
        for($i = 1; $i <= $row["Stock"]; $i++) {
            echo "<option value='$i'>$i</option>";
        }
        echo "</select><button onclick='addToCart(\"{$row["Product"]}\")'>+ Add</button>";
    }
    echo "</td></tr>\r\n";
}

echo "</table>";

$site -> genClosing();