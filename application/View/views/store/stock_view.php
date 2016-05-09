<!DOCTYPE html>
<?php
    include '../../../Control/Control.php';
    $c = new control();
    if(!isset($_SESSION["admin_logged_in"])&&!isset($_SESSION["mede_logged_in"])){
        echo '<script type="text/javascript">
                window.location = "login.php";
                </script>';
    }
?>
<html>
    <head>
        <title>Game Rain</title>
        <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
        <link type="text/css" rel='stylesheet' href="../../../../public/css/style.css"/>
        <link type="text/css" rel='stylesheet' href="../../../../public/css/flip.css"/>
    </head>
    <body>
        <div id='fake-alert'> Dit is een school project van Sybren Lukkien <b>( Dus geen echte webshop ) </b></div>
        <div id='wrapper'>
            <div id='logo'></div>

            <div id='content'>
                <div id='toolbar' style='background:#07cfb1;color:#fff;padding-left:20px'>Winkel medewerker menu</div>  
                <div id='text-spacer'>
                    <a href='menu.php' ><div id='game-button' style='width:300px;float:right'>< terug naar menu</div></a>
                        <h1>Vooraad bekijken</h1>
                        <center>
                        <table border="1">
              <tr>
                <th width="150" style='background:#000;color:#fff'>ID</th>
                <th width="150" style='background:#000;color:#fff'>Vooraad</th>
                <th width="150" style='background:#000;color:#fff'>Virtuele vooraad</th>
                <th width="200" style='background:#000;color:#fff'>Spel</th>
              </tr>
            </table>
                        <?php $c->loadStockOverView() ?>
                            </center>
                </div>
                
                
            </div>
            <div id='footer'>Sybren Lukkien 2015 - GAME RAIN 2015</div>
        </div>
    </body>
</html>