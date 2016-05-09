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
        <form id='mainform' action="add_order.php" method="post">
            <input id='card-number-input' type="hidden" name='cardNum'/>
            <input id='discount-input' type="hidden" name='discount' value='0'/>
            <?php $c->loadProductsInForm(); ?>
            
        </form>
        <div id='fake-alert'> Dit is een school project van Sybren Lukkien <b>( Dus geen echte webshop ) </b></div>
        <div id='js-pass'><?php echo $c->getCardTotalAmount(); ?></div>
        <div id='wrapper'>
            <div id='logo'></div>
            <div id='nav'>
            <a href='homepage.php'><div class='nav-item'>HOME</div></a>
            <a href='help.php'><div class='nav-item'>HELP</div></a>
            <a href='contact.php'><div class='nav-item'>CONTACT</div></a>
            <a href='dev.php'><div class='nav-item'>DEVELOPER</div></a>
            </div>
            <div id='content'>
                <div id='toolbar'>Betaal menu.<a href='card.php'><div id='card-link'><?php $c->getCardAmount(); ?></div></a></div>
                <div id='game-holder'>
                    <b> Het GameRain korting spel !</b>
                    <div id='close-button' onclick="closeGame()">x</div>
                <canvas id='game' height="650" width="1000"></canvas>
                <script type="text/javascript" src="../../../public/gamedata/js/main.js"></script>
                <script type="text/javascript" src="../../../public/gamedata/js/draw.js"></script>
                <script type="text/javascript" src="../../../public/gamedata/js/sprites.js"></script>
                <script type="text/javascript" src="../../../public/gamedata/js/player.js"></script>
                <script type="text/javascript" src="../../../public/gamedata/js/fire.js"></script>
                <script type="text/javascript" src="../../../public/gamedata/js/enemys.js"></script>
                <script type="text/javascript" src="../../../public/gamedata/js/particles.js"></script>
                <script type="text/javascript" src="../../../public/gamedata/js/scoreParticles.js"></script>
                    
                    <script type="text/javascript" src="../../../public/js/numberTest.js"></script>
                </div>
                <div id='text-spacer'>
                    <h1>Betalingsoverzicht</h1>
                    <div id='card-input'>Kaart nummer : <input onchange='testNumberInput()' id='card-number' type="number" /></div>
                    <div id='card-alert'></div>
                    <div id='pay-overview-holder'>
                    <?php $c->loadBuyOverview(); ?>
                    </div>
                    <div id='pay-overview-total'>
                        <hr>
                        &euro;<?php echo $c->getCardTotalAmount(); ?>,-<br>
                        <b id='discount-amount'>0</b>% Korting<br><hr>
                       <b>&euro;<b id='total-price-buy'><?php echo $c->getCardTotalAmount(); ?>,-</b><br></b><br>
                        
                    </div>
                    <div id='pay-type-holder'>
                        Betaal methode : <select id='pay-type-select'>
                                          <option value="IDeal">IDeal</option>
                                          <option value="PayPal">PayPal</option>
                                          <option value="Mastercard">Mastercard</option>
                                        </select>
                    </div>

                    <h2 style='display:inline-block;margin-right:80px'> Speel het korting spel en krijg tot 15% korting : </h2>
                    <div id='game-button'onclick='startGame()'> Speel! </div> 
                    <div id='pay-button' onclick="testFormFull()">Afrekenen</div>
                </div>
            <div id='footer'>Sybren Lukkien 2015 - GAME RAIN 2015</div>
        </div>
    </body>
</html>