<?php

class site {
    private $page;

    function __construct($page = NULL) {
        $this->page = $page;
    }

    function genOpening() {
        echo <<< END
<!DOCTYPE HTML>
<HTML>
<HEAD>
<TITLE>{$this->page} - Wall to Wall Liquor</TITLE>
<link rel="stylesheet" href="css/site.css" />
<link rel="ICON" href="images/logo.ico" type="image/ico" />
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
		JavaScript must be enabled!
    </div>

</noscript>

END;
    $this->genNavbar();

        echo <<< END

<h1>{$this->page}</h1>

<div class="content">

END;
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
	<li><a href="catalog.php?category=Catalog">Catalog</a></li>
	<li><a href="catalog.php?category=Beer">Beers</a></li>
	<li><a href="catalog.php?category=Liquor">Liquors</a></li>
    <li><a href="catalog.php?category=Wine">Wines</a></li>
	<li><a href="catalog.php?category=Non_Alcoholic">Non-Alcoholic</a></li>
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
				<input type="text" name="product"><br>
		</td>
		<td id="searchData_text">
			Category:
		</td>
		<td id="searchData_catalog">
			<input type="radio" name="Category" value="Catalog" checked="checked">All
		</td>
		<td id="searchData_beer">
			<input type="radio" name="Category" value="Beer">Beer
		</td>
		<td id="searchData_liquor">
			<input type="radio" name="Category" value="Liquor">Liquor 
		</td>
		<td id="searchData_wine">
			<input type="radio" name="Category" value="Wine">Wine  
		</td>
		<td id="searchData_na">
			<input type="radio" name="Category" value="Non_Alcoholic">Non-Alcoholic  
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
	
	function genHomeContent(){
		echo <<< END
		
<hr>

END;
		$this ->readText("welcome");
		$this ->readText("catalog");
		$this ->readText("beer");
		$this ->readText("liquor");
		$this ->readText("wine");	
		$this ->readText("non_alcoholic");	
		$this ->readText("mixers");
	}
	
	function readText($subject) {
		
		@$fh = fopen("info/{$subject}.txt",'r') or die("Unable to open file: {$subject}.txt");
		while ($line = fgets($fh)) {
			echo(nl2br($line));
		}
		fclose($fh);
		
		echo <<< END

<br />
<br />
<hr>
	
END;
	}
}