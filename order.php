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

(isset($_REQUEST["order_action"])) ? $action = $_REQUEST["order_action"] : $action = NULL;

//generate the site home.
$site = new site("order");

//call the genOpeneing method to generate the opening content of the home page.
$site -> genOpening();

if (isset($action) && $action != NULL) {
    $fName = $_POST["fName"];
    $lName = $_POST["lName"];
    $addrStreet = $_POST["addrStreet"];
    $addrCity = $_POST["addrCity"];
    $addrState = $_POST["addrState"];
    $addrZip = $_POST["addrZip"];
    $ccNum = $_POST["ccNum"];
    $exprMon = $_POST["exprMonth"];
    $exprYear = $_POST["exprYear"];
    $ccCCV = $_POST["ccCCV"];

    $addr = "{$addrStreet} {$addrCity}, {$addrState} {$addrZip}";
    $expr = "{$exprMon}/{$exprYear}";
    $json = json_encode($_SESSION["cart"]);

    try {
        $stmt = "INSERT INTO `orders` (fName, lName, addr, ccNum, expr, ccCCV, `ord`, sID)
    VALUES (:fname, :lname, :addr, :ccNum, :expr, :ccCCV, :ord, :sID)";
        $sth = $db->prepare($stmt);
        $sth->bindParam(":fname", $fName);
        $sth->bindParam(":lname", $lName);
        $sth->bindParam(":addr", $addr);
        $sth->bindParam(":ccNum", $ccNum);
        $sth->bindParam(":expr", $expr);
        $sth->bindParam(":ccCCV", $ccCCV);
        $sth->bindParam(":ord", $json);
        $sth->bindParam(":sID", session_id());
        $sth->execute();
    }
    catch(PDOException $e) {
        echo ($e->gettext());
    }

    try {
        $stmt2 = "SELECT order_id FROM `orders` WHERE `sID` = :sID AND fName = :fname AND lName = :lname ORDER BY `order_id` DESC LIMIT 1";
        $sth2 = $db->prepare($stmt2);
        $sth2->bindParam(":fname", $fName);
        $sth2->bindParam(":lname", $lName);
        $sth2->bindParam(":sID", session_id());
        $sth2->execute();

        $order_id = $sth2->fetch()["order_id"];

        echo "Your order has been processed.  For your refrence, your order number is <a href='order.php?order=$order_id'>$order_id</a>";

        session_unset();


    }
    catch(PDOException $e) {
        echo ($e->gettext());
    }

} else {
    (isset($_REQUEST["order"])) ? $order = $_REQUEST["order"] : $order = NULL;
    if (isset($order) && $order != NULL) {

        try {
            $stmt2 = "SELECT `order_id`, `fName`, `lName`, `addr`, `ord` FROM `orders` WHERE order_id = :ord ORDER BY `order_id` DESC LIMIT 1";
            $sth2 = $db->prepare($stmt2);
            $sth2->bindParam(":ord", $order);
            $sth2->execute();

            $values = $sth2->fetchAll()[0];

            echo "Order for {$values['lName']}, {$values['fName']}<br />";
            echo "Shipped to {$values['addr']}<br />";

            $contents = json_decode($values["ord"], true);

            echo "<table><tr><th>Product</th><th>Quantity</th></tr>";

            foreach($contents as $key=>$value) {
                $productName = "Unknown Product";
                // Echo a table row with the information and a button.
                foreach ($products as $row) {
                    if ($row[0] == $key) {
                        $productName = $row[1];
                    }
                }
                echo "<tr><td>$productName</td><td>$value</td></tr>";
            }
            echo "</table>";

        }
        catch(PDOException $e) {
            echo ($e->gettext());
        }
    }
    else {
        echo "Unknown order ID!";
    }

}

//call readText method to pull information into the page from separate source.
$site ->readText("order");

//call genClosing method to generate bottom of page and close html.
$site -> genClosing();