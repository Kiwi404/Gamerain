<!DOCTYPE html>
<?php
    include '../../Control/Control.php';
    $c = new control();
    if(isset($_GET['drop'])){
        if(isset($_SESSION["card"][$_GET['drop']])){
            unset($_SESSION["card"][$_GET['drop']]);
        }
    }
    if(isset($_GET['add'])){
        if(isset($_SESSION["card"][$_GET['add']])){
            if($_SESSION["card"][$_GET['add']] <10){
                $_SESSION["card"][$_GET['add']] = $_SESSION["card"][$_GET['add']]+1;
            }
        }
                echo '<script type="text/javascript">
                window.location = "card.php";
                </script>';
    }

    if(isset($_GET['sub'])){
        if(isset($_SESSION["card"][$_GET['sub']])){
            if($_SESSION["card"][$_GET['sub']]-1 == 0){
                unset($_SESSION["card"][$_GET['sub']]);
            }else{
                $_SESSION["card"][$_GET['sub']] = $_SESSION["card"][$_GET['sub']]-1;
            }
        }
                echo '<script type="text/javascript">
                window.location = "card.php";
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
                <div id='toolbar'>Winkelmandje<a href='card.php'><div id='card-link'><?php $c->getCardAmount(); ?></div></a></div>
                <div id='text-spacer'>
                    <h1>Producten : </h1>
                    <div id='card-row-holder'>
                    <?php $c->loadCard(); ?>
                    </div>
                </div>
                
                
            </div>
            <div id='footer'>Sybren Lukkien 2015 - GAME RAIN 2015</div>
        </div>
    </body>
</html>