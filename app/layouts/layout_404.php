<?php
header("HTTP/1.0 404 Not Found");
?>
<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <?php
            $this->renderView('404');
        ?>
    </body>
</html>