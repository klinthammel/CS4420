<?php

class site {
    function genOpening($title = NULL) {
        echo <<< END
<!DOCTYPE HTML>
<HTML>
<HEAD>
<TITLE>{$title}</TITLE>
</HEAD>
<BODY>
END;
    }

    function genClosing() {
        $year = date("y");
        print <<< END
<div class="footer">
Copy {$year} Wall to Wall Liquor.  Please drink responsibly.
</BODY>
</HTML>
END;

    }
}