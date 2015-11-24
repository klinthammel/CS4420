<?php
session_start();
require("includes.php");

ISSET($_GET["q"]) ? $q = $_GET["q"] : $q = NULL;
ISSET($_GET["category"]) ? $type = strtolower($_GET["category"]) : $type = NULL;

$db = new PDO("mysql:host={$GLOBALS['mysql_host']};dbname={$GLOBALS['mysql_database']}", $GLOBALS["mysql_user"], $GLOBALS["mysql_password"])
or die("Unable to connect to database.");

if ($type == "non_alcoholic") {$stmt = "SELECT i.`Barcode`, `Product`,`Category`,`Price`,`Stock` FROM `items_non` as i RIGHT JOIN `description_non` as d on d.Barcode = i.Barcode WHERE `Product` LIKE :search"; }
else{$stmt = "SELECT i.`Barcode`, `Product`,`Category`,`Price`,`Stock` FROM `items_alcohol` as i RIGHT JOIN `description_alcohol` as d on d.Barcode = i.Barcode WHERE `Product` LIKE :search"; }

$sth = $db->prepare($stmt);
$sth->execute(array(':search' => '%'.$q.'%')) or die("Unable to execute");

$result = $sth->fetchAll();

$site = new site("search");

$site -> genOpening();

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
    echo "<tr><td>{$row["Product"]}<br />(Barcode: {$row["Barcode"]})</td><td>{$row["Category"]}</td><td>\${$row["Price"]}.00</td><td>{$row["Stock"]}</td><td></td></tr>\r\n";
}

echo "</table>";

$site -> genClosing();

?>