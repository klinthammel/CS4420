<?php

class site {
    function genOpening($title = NULL) {
        echo <<< END
<!DOCTYPE HTML>
<HTML>
<HEAD>
<TITLE>{$title} - Wall to Wall Liquor</TITLE>
<link rel="stylesheet" href="css/site.css" />
<link rel="ICON" href="images/logo.ico" type="image/ico" />
</HEAD>
<BODY>

<div class="header">
Wall to Wall Liquor
</div>
END;
    }

    function contentBegin($page = NULL) {	
		echo <<< END
<h1>{$page}</h1>

<div class="content">

END;

		if(($page === "Catalog") || ($page === "Beer") || ($page === "Liquor") || ($page === "Wine") || ($page === "Search") || ($page === "Non-Alcoholic")){


			if(($page === "Search") || ($page === "Catalog")) {
				$this ->genSearch();
			}
		
		echo <<< END
		
<table>
	<tr>
		<td>Product</td>
		<td>Category</td>
		<td>Wholesale</td>
		<td>Quantity</td>
		<td>Add to Cart</td>
	</tr>
END;
		}
		else {
			$this ->genSearch();
		}
		
		switch ($page) {
			case "Home":

				break;
			case "Catalog":
			//for loop filling in table from db			
				break;
			case "Beer":
			//for loop filling in table from db			
				break;
			case "Liquor":
			//for loop filling in table from db			
				break;
			case "Wine":
			//for loop filling in table from db
				break;
			default:
		}
		
		if(($page === "Catalog") || ($page === "Beer") || ($page === "Liquor") || ($page === "Wine") || ($page === "Search") || ($page === "Non-Alcoholic")){
			echo <<< END
			
</table>
END;
		}	
    }

    function contentEnd() {
        print "</div>";
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
	<li><a href="catalog.php?category=Non-Alcoholic">Non-Alcoholic</a></li>
    <li class="right"><a href="Cart.php">Cart</a></li>
	<li class="right"><a href="Search.php">Search</a></li>
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
}