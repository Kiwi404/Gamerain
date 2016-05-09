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
            <a href='help.php'><div class='nav-item active'>HELP</div></a>
            <a href='contact.php'><div class='nav-item'>CONTACT</div></a>
            <a href='dev.php'><div class='nav-item'>DEVELOPER</div></a>
            </div>
            <div id='content' class='white'>
                <div id='toolbar'>Hier vind u hulp bij het kopen van spellen.<a href='card.php'><div id='card-link'><?php $c->getCardAmount(); ?></div></a></div>
                <div id='text-spacer'>
                <h1>Help!</h1>
                <p>
                Om spellen te kopen op onze site heeft u een lid pas nodig.<br>Deze pas kunt u ophalen bij ons in de winkel.<br>
                    Op deze lid pas vindt u een persoon nummer met dit nummer kunt u bestellingen plaatsen.<br>
                </p>
                <div class='card'>1234567</div>
                </div>
                
            </div>
            <div id='footer'>Sybren Lukkien 2015 - GAME RAIN 2015</div>
        </div>
    </body>
</html>