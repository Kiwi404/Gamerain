var shots = [];

var shotSpeed = 10;

var shotTimer = 10;

var shot = function(x,y){
    this.x = x;
    this.y = y;
}



function tryShot(){
    if(shotTimer == 0){
        var s = new shot(80,player.y+35);
        shots.push(s);
        shotTimer = 30;
    }
}   

function shotLogic(){
    if(shotTimer>0){shotTimer--;}
    for(var i = 0;i<shots.length;i++){
        shots[i].x+= shotSpeed;
        if(shots[i].x>W){
            shots.splice(i,1);
        }
    }
}

function drawShots(){
    for(var i = 0;i<shots.length;i++){
        ctx.fillRect(shots[i].x-5,shots[i].y-5,10,10);
    }
}

function testHit(){
    for(var i = 0;i<enemys.length;i++){
        for(var e = 0;e<shots.length;e++){
            if(isCollide(enemys[i],shots[e])){
                explode(enemys[i].x,enemys[i].y,enemys[i].type);
                if(enemys[i].type == 1){player.score += 10;}
                if(enemys[i].type == 2){player.score += 15;}
                if(enemys[i].type == 3){player.score += 5;}
                enemys.splice(i,1);
                shots.splice(e,1);
            }
        }
    }
}
               
function isCollide(a, b) {
    return !(
        ((a.y + 70) < (b.y-5)) ||
        (a.y > (b.y + 10)) ||
        ((a.x + 70) < b.x-5) ||
        (a.x > (b.x + 10))
    );
}