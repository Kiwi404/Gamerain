<!DOCTYPE html>
<?php
    include '../../Control/Control.php';
    $c = new control();
    if(isset($_GET['add'])){
        $c->addItemToCard($_GET['id']);
        echo '<script type="text/javascript">
           window.location = "?id="'.$_GET['id'].'
      </script>';
    }

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
            <a href='dev.php'><div class='nav-item'>DEVELOPER</div></a>
            </div>
            <div id='content'>
                <div id='toolbar'>Meer info over het product.<a href='card.php'><div id='card-link'><?php $c->getCardAmount(); ?></div></a></div>
                <div id='text-spacer'>
                    <?php
                        if(isset($_GET['add'])){
                                
                                echo '<script type="text/javascript">
                                   window.location = "?id='.$_GET['id'].'";
                              </script>';
                            }
                     $c->loadFullGame($_GET['id']);
                    ?>
               
                
            </div>
            <div id='footer'>Sybren Lukkien 2015 - GAME RAIN 2015</div>
        </div>
    </body>
</html>