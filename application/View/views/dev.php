<!DOCTYPE html>
<?php
    include '../../Control/Control.php';
    $c = new control();
?>
<html>
    <head>
        <title>Game Rain</title>
        <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
        <link type="text/css" rel='stylesheet' href="../../../public/css/style.css"/>
        <link type="text/css" rel='stylesheet' href="../../../public/css/flip.css"/>
    </head>
    <body>
        <div id='fake-alert'> Dit is een school project van Sybren Lukkien <b>( Dus geen echte webshop ) </b></div>
        <div id='wrapper'>
            <div id='logo'></div>
            <div id='nav'>
            <a href='homepage.php'><div class='nav-item'>HOME</div></a>
            <a href='help.php'><div class='nav-item'>HELP</div></a>
            <a href='contact.php'><div class='nav-item'>CONTACT</div></a>
            <a href='dev.php'><div class='nav-item active'>DEVELOPER</div></a>
            </div>
            <div id='content'>
                <div id='toolbar'>
                Hier vindt u info over de maker van deze website ... ik dus.<a href='card.php'><div id='card-link'><?php $c->getCardAmount(); ?></div></a></div>
                <div id='text-spacer'>
                    <h1>Developer</h1>
                    <b>Over mij</b><br>
                    Mijn naam is Sybren Lukkien, ik zit nu in mijn 4de jaar van het MBO Utrecht. Zelf ben ik altijd al veel bezig geweest met programmeren. Voor dit project heb ik nog nooit eerder aan een webshop gewerkt. Wel heb ik een website gemaakt voor een theater in het 2de jaar.  <br><br>
                    <b>De opdracht</b><br>
                    De opdracht die ik heb gekregen was om een webshop te maken voor games. Hierbij mocht ik zelf de design naam en genre games kiezen.
                    
                </div>
            </div>
            <div id='footer'>Sybren Lukkien 2015 - GAME RAIN 2015</div>
        </div>
    </body>
</html>