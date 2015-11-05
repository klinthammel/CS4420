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
        print <<< END
</BODY>
</HTML>
END;

    }
}