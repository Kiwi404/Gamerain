var UP = false;
var DOWN = false;

var ACTION = false;

var speed = 12;

var p = function(){
    this.y = H/2-40;
    this.score = 0;
}

var player = new p();

function playerLogic(){
    if(UP && player.y>10 ){player.y-=speed;}
    if(DOWN&& player.y<550){player.y+=speed;}
    if(ACTION){tryShot();}
    
}

window.onkeyup = function(e) {
    
    var key = e.keyCode ? e.keyCode : e.which;
    if(key == 38){UP = false;}
    if(key == 40){DOWN = false;}
    if(key == 32){ACTION = false;}
}

window.onkeydown = function(e) {

    var key = e.keyCode ? e.keyCode : e.which; 
    if(key == 38){UP = true;e.preventDefault;}
    if(key == 40){DOWN = true;e.preventDefault;}
    if(key == 32){ACTION = true;e.preventDefault;}
}
