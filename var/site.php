<?php

class site {
    private $page;

    function __construct($page = NULL) {
        $this->page = $page;
    }

	//function that generates the begining of the page, give title to page.
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
<!-- Script to sort table by clicking on table headers, pulled from outside source. -->
<script src="sorttable.js"></script>
</HEAD>
<BODY>

<div class="header">
Wall to Wall Liquor
</div>

<!-- Add the no javascript container, if javascript is disbaled, flag user. -->

<noscript>

    <style type="text/css">
        .nj {display:none;}
    </style>
    <div class="noscriptmsg">
		To use the full power of the catalog, please enable javascript in your browser.
    </div>

</noscript>

END;
	//call genNavbar to add html code it producs here.
    $this->genNavbar();
	
		//remove underscores if passed in page descriptor has it
        $pageTitle = str_replace("_", " ", $this->page);

		//capitolize the first letter in the page descriptor
        $pageTitle = ucwords($pageTitle);

		//add the page descriptor to the top of the page.
        echo "<h1>{$pageTitle}</h1>";

		//create teh begining of the content div container.
        echo "<div class=\"content\">";
    }

	//generate the closing html code and add in copyright year.
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

	//generate the navigation bar contents of the page.
    function genNavbar() {
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
</ul>

END;
	}
    
	//generate the search bar contents of the page, wiil allows user to search for products.
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
	
	//read in text files that are stored in the info subfolder.
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