<!DOCTYPE html>
<html>
    <head>
        <title>Game Rain</title>

    </head>
    <body>
        <div style='display:hidden'>
        <?php

            include '../../Control/Control.php';

            $c = new control();
            
            $c->addOrder($_POST);
            
            session_unset();
            var_dump($_SESSION);
        ?>
            </div>
    </body>
            <script type="application/javascript">
        window.location.replace("payed.php");
        window.location.href = "payed.php";
        </script>
</html>