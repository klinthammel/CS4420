<?php

class site {
    private $page;

    function __construct($page = NULL) {
        $this->page = $page;
    }

    function genOpening() {
        $pageTitle = str_replace("_", " ", $this->page);

        $pageTitle = ucwords($pageTitle);
        echo <<< END
<!DOCTYPE HTML>
<HTML>
<HEAD>
<TITLE>{$pageTitle} - Wall to Wall Liquor</TITLE>
<link rel="stylesheet" href="css/site.css" />
<link rel="ICON" href="images/logo.ico" type="image/ico" />
<script src="cart.js"></script>
<script src="sorttable.js"></script>
</HEAD>
<BODY>

<div class="header">
Wall to Wall Liquor
</div>

<noscript>

    <style type="text/css">
        .nj {display:none;}
    </style>
    <div class="noscriptmsg">
		To use the full power of the catalog, please enable javascript in your browser.
    </div>

</noscript>

END;
    $this->genNavbar();
        $pageTitle = str_replace("_", " ", $this->page);

        $pageTitle = ucwords($pageTitle);

        echo "<h1>{$pageTitle}</h1>";

        echo "<div class=\"content\">";
    }

    function genClosing() {
        $year = date("Y");
        print <<< END
</div>
<div class="footer">
<br>
Copyright &copy;{$year} Wall to Wall Liquor.  Please drink responsibly.
</div>
</BODY>
</HTML>
END;
    }

    function genNavbar() {
        if (isset($_SESSION["is_logged_in"]) && $_SESSION["is_logged_in"]) {
            $user = "<li>Howdy, {$_SESSION["username"]}</li><li><a href='user.php?action=logout'>Logout</a></li>";
        }
        else {
            $user = "<li class=\"right\"><a href=\"user.php\">Login</a></li>";
        }
        print <<< END

<ul class="navbar">
    <li><img src="images/logo.png" alt="Wall to Wall Liquor logo" style="height:48px" id="logo"/></li>
	<li><a href="index.php">Home</a></li>
	<li><a href="catalog.php">Catalog</a></li>
	<li><a href="catalog.php?category=beer">Beers</a></li>
	<li><a href="catalog.php?category=liquor">Liquors</a></li>
    <li><a href="catalog.php?category=wine">Wines</a></li>
	<li><a href="catalog.php?category=non_alcoholic">Non-Alcoholic</a></li>
    <li class="right"><a href="Cart.php">Cart</a></li>
	<li class="right"><a href="search.php">Search</a></li>
    {$user}
</ul>

END;
	}
    
	
	function genSearch(){
		echo <<< END
<div class="search">
<br>
<form action="search.php" method="get">
<table id="search">
	<tr>
		<td id="searchData_box">
			Search:
				<input type="text" name="q"><br>
		</td>
		<td id="searchData_text">
			Category:
		</td>
		<td id="searchData_catalog">
			<input type="radio" name="category" value="catalog" checked="checked">All
		</td>
		<td id="searchData_beer">
			<input type="radio" name="category" value="beer">Beer
		</td>
		<td id="searchData_liquor">
			<input type="radio" name="category" value="liquor">Liquor
		</td>
		<td id="searchData_wine">
			<input type="radio" name="category" value="wine">Wine
		</td>
		<td id="searchData_na">
			<input type="radio" name="category" value="non_alcoholic">Non-Alcoholic
		</td>
		<td id="searchData_submit">
			<input type="submit" value="Search">
		</td>
	</tr>
</table>
</form>
<br>
<br>
</div>
	
END;
	}
	
	function readText($subject) {

        $file = "info/{$subject}.txt";

        if (!file_exists($file)) {return;}
		
		@$fh = fopen($file,'r') or die("Unable to open file: {$subject}.txt");
		while ($line = fgets($fh)) {
			echo(nl2br(preg_replace("/\n+/", "\n", $line)));
		}
		fclose($fh);
		
		echo <<< END

<br />
<br />
<hr>
	
END;
	}
}