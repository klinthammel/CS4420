<?php
session_start();
require("includes.php");

if (ISSET($_GET["category"])) {
    $type = strtolower($_GET["category"]);
}
else {
    $type = "catalog";
}

$db = new PDO("mysql:host={$GLOBALS['mysql_host']};dbname={$GLOBALS['mysql_database']}", $GLOBALS["mysql_user"], $GLOBALS["mysql_password"])
or die("Unable to connect to database.");

if ($type == "non_alcoholic") {
    $stmt = "SELECT i.`Barcode`, `Product`,`Category`,`Price`,`Stock` FROM `items_non` as i RIGHT JOIN `description_non` as d on d.Barcode = i.Barcode WHERE d.type=:type";
}
else if ($type == "all" || $type == "catalog") {
    $stmt = "SELECT i.`Barcode`, `Product`,`Category`,`Price`,`Stock` FROM `items_alcohol` as i RIGHT JOIN `description_alcohol` as d on d.Barcode = i.Barcode";
}
else {
    $stmt = "SELECT i.`Barcode`, `Product`,`Category`,`Price`,`Stock` FROM `items_alcohol` as i RIGHT JOIN `description_alcohol` as d on d.Barcode = i.Barcode WHERE d.type=:type";
}

$sth = $db->prepare($stmt) or die("Unable to query");
@$sth->bindParam(":type", $type);
$sth->execute();

$result = $sth->fetchAll();

$site = new site(strtolower($type));

$site -> genOpening();

$site->genSearch();

$site->readText($type);

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