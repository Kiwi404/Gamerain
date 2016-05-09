<?php
require_once(__DIR__.'/Control.php');
    if(isset($_POST['cardNumber'])){
        $c = new control();

        $c->testCardNumber($_POST['cardNumber']);   
    }
?>