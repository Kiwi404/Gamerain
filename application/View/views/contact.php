<!DOCTYPE html>
<?php
    include '../../Control/Control.php';
    $c = new control();
?>
<html>
    <head>
        <title>Game Rain</title>
        <script src="https://maps.googleapis.com/maps/api/js"></script>
        <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
        <link type="text/css" rel='stylesheet' href="../../../public/css/style.css"/>
        <link type="text/css" rel='stylesheet' href="../../../public/css/flip.css"/>
        <script>
      function initialize() {
        var mapCanvas = document.getElementById('map');
        var mapOptions = {
          center: new google.maps.LatLng(52.091960, 5.119036),
          zoom: 19,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }
         var marker = new google.maps.Marker({
            position: {lat: 52.091960, lng: 5.119036},
            map: map,
            title: 'gameRain'
          });
        var map = new google.maps.Map(mapCanvas, mapOptions)
      }
      google.maps.event.addDomListener(window, 'load', initialize);
            </script>
    <script>
        window.onload = function(){init()};
            
        function init(){
            document.getElementById('map').onmousedown = function(){
                document.getElementById('pointer').style.visibility = 'hidden';
                document.getElementById('info').style.top = '-690px';
                document.getElementById('info').style.left = '20px';
            }
            

        }

        </script>
    </head>
    <body>
        <div id='fake-alert'> Dit is een school project van Sybren Lukkien <b>( Dus geen echte webshop ) </b></div>
        <div id='wrapper'>
            <div id='logo'></div>
            <div id='nav'>
            <a href='homepage.php'><div class='nav-item'>HOME</div></a>
            <a href='help.php'><div class='nav-item'>HELP</div></a>
            <a href='contact.php'><div class='nav-item active'>CONTACT</div></a>
            <a href='dev.php'><div class='nav-item'>DEVELOPER</div></a>
            </div>
            <div id='content'>
                <div id='toolbar'>Alle contact informatie kunt u hier vinden.<a href='card.php'><div id='card-link'><?php $c->getCardAmount(); ?></div></a></div>

                <div id='map'>
                   
                </div>
<div id='pointer'></div>
                <div id='info'><b>Gamerain</b><br>Stadhuisbrug 3<br>
3511 KP Utrecht<br>030-12312345</div>
                
            </div>
            <div id='footer'>Sybren Lukkien 2015 - GAME RAIN 2015</div>
        </div>
    </body>
</html>