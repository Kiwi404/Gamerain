<!DOCTYPE html>
<?php
    include '../../../Control/Control.php';
    $c = new control();
    if(!isset($_SESSION["admin_logged_in"])&&!isset($_SESSION["mede_logged_in"])){
        echo '<script type="text/javascript">
                window.location = "login.php";
                </script>';
    }
if(isset($_POST['numa'])){
                echo '<script type="application/javascript">
                    window.location.replace("mag_view.php?id='.($_POST['numa']-100000).'");
                    window.location.href = "mag_view.php?id='.($_POST['numa']-100000).'";
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
                    <a href='menu.php'><div id='game-button' style='width:300px;float:right'>< terug naar menu</div></a>
                        <h1>Bestelling afhandelen</h1>
                        <form id='odernum' method="post" action="order_com.php">
                        <div id='card-input'>Bestellings nummer : <input  id='orderNum' name='numa' min='4' type="number" style='width:700px;font-size:20px'/></div>
                            </form>
                        <div onClick='document.getElementById("odernum").submit();' id='game-button' style='width:300px'>Afrekenen</div>
                </div>
                
                
            </div>
            <div id='footer'>Sybren Lukkien 2015 - GAME RAIN 2015</div>
        </div>
    </body>
</html>