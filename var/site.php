<?php

class site {
    function genOpening($title = NULL) {
        echo <<< END
<!DOCTYPE HTML>
<HTML>
<HEAD>
<TITLE>{$title} - Wall to Wall Liquor</TITLE>
<link rel="stylesheet" href="css/site.css" />
</HEAD>
<BODY>
END;
    }

    function genClosing() {
        $year = date("Y");
        print <<< END

<div class="footer">
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
    <li><a href="index.php"><img src="images/logo.png" alt="Wall to Wall Liquor logo" height="48px"/></a></li>
    <li><a href="shop.php?category=wine">Wines</a></li>
    <li><a href="shop.php?category=beer">Beers</a></li>
    <li><a href="shop.php?category=liquor">Liquors</a></li>
    <li class="right"><a href="cart.php">Shop</a></li>
    {$user}
</ul>

END;

    }
}