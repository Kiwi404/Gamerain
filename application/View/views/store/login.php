<!DOCTYPE html>
<?php
    include '../../../Control/Control.php';
    $c = new control();

    if(isset($_POST['submit'])){
        $c->tryAdminLogin($_POST);
    }
    if(isset($_SESSION["admin_logged_in"])||isset($_SESSION["mede_logged_in"])){
        echo '<script type="text/javascript">
                window.location = "menu.php";
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
                    <form id='admin-login-form' method="post" action="login.php">
                    <h1>Login</h1>
                        <div class='form-label'>Gebruikersnaam : </div><input type='text' name='username'/>
                        <div class='form-label'>Wachtwoord : </div><input type='password' name='password'/><br><br>
                        <input class='login-button' type="submit" name='submit' value='Inloggen'/>
                    </form>
                </div>
            </div>
            <div id='footer'>Sybren Lukkien 2015 - GAME RAIN 2015</div>
        </div>
    </body>
</html>