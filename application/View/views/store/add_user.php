<!DOCTYPE html>
<?php
    include '../../../Control/Control.php';
    $c = new control();
    if(!isset($_SESSION["admin_logged_in"])&&!isset($_SESSION["mede_logged_in"])){
        echo '<script type="text/javascript">
                window.location = "login.php";
                </script>';
    }
    if(isset($_POST['submit'])){
        $cardnum = $c->addUser($_POST);
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
                        <h1>Gebruiker toevoegen</h1>

                        <h3 style='text-align:center;background:#f33;color:#fff'><?php 
                            
                            if(isset($cardnum)){
                                echo 'Gebruiker toegevoegd met kaart nummer : '.$cardnum;
                                
                            }else{

                                
                            }
                            
                            ?></h3>
                                            <form id='admin-login-form' method="post" action="add_user.php">
                    <h3>Gegevens</h3>
                        <div class='form-label'>Naam : </div><input type='text' name='username'/>
                        <div class='form-label'>Telefoon : </div><input type='number' min='10' name='tel'/>
                        <div class='form-label'>Email : </div><input type='Email' name='email'/><br><br>
                        <input class='login-button' type="submit" name='submit' value='Toevoegen'/>
                    </form>
                </div>
                
                
            </div>
            <div id='footer'>Sybren Lukkien 2015 - GAME RAIN 2015</div>
        </div>
    </body>
</html>