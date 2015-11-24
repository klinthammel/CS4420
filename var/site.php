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
    }

    function contentBegin() {
		echo <<< END

<h1>{$this->page}</h1>

<div class="content">

END;

		if(($this->page === "catalog") || ($this->page === "beer") || ($this->page === "liquor") || ($this->page === "wine") || ($this->page === "search") || ($this->page === "non_alcoholic")){


			if(($this->page === "search") || ($this->page === "catalog")) {
				$this ->genSearch();
			}
		
		echo <<< END
		
<table>
	<tr>
		<td>Product</td>
		<td>Category</td>
		<td>Wholesale</td>
		<td>Quantity</td>
		<td class="nj">Add to Cart</td>
	</tr>
END;
		}
		else {
			$this ->genSearch();
		}
    }

    function contentEnd()
    {


        if (($this->page === "Catalog") || ($this->page === "Beer") || ($this->page === "Liquor") || ($this->page === "Wine") || ($this->page === "Search") || ($this->page === "Non_Alcoholic")) {
            echo <<< END

</table>
END;
            print "</div>";
        }
    }
    function genClosing() {
        $year = date("Y");
        print <<< END

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
    <li><img src="images/logo.png" alt="Wall to Wall Liquor logo" height="48px" id="logo"/></li>
	<li><a href="index.php">Home</a></li>
	<li><a href="catalog.php?category=Catalog">Catalog</a></li>
	<li><a href="catalog.php?category=Beer">Beers</a></li>
	<li><a href="catalog.php?category=Liquor">Liquors</a></li>
    <li><a href="catalog.php?category=Wine">Wines</a></li>
	<li><a href="catalog.php?category=Non_Alcoholic">Non-Alcoholic</a></li>
    <li class="right"><a href="Cart.php">Cart</a></li>
	<li class="right"><a href="catalog.php?category=Search">Search</a></li>
    {$user}
</ul>

END;
	}
    
	
	function genSearch(){
		echo <<< END
<div class="search">
<br>
<table id="search">
	<tr>
		<td id="searchData">
			<form action="search.php" method="get">
			Product:
				<input type="text" name="product"><br>
		</td>
		<td id="searchData">
			Category:
		</td>
		<td id="searchData">
			<input type="radio" name="Category" value="Catalog" checked="checked">All
		</td>
		<td id="searchData">
			<input type="radio" name="Category" value="Beer">Beer
		</td>
		<td id="searchData">
			<input type="radio" name="Category" value="Liquor">Liquor 
		</td>
		<td id="searchData">
			<input type="radio" name="Category" value="Wine">Wine  
		</td>
		<td id="searchData">
			<input type="radio" name="Category" value="Non_Alcoholic">Non-Alcoholic  
		</td>
		<td id="searchData">
			<input type="submit" value="Search">
			</form>
		</td>
	</tr>
</table>
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