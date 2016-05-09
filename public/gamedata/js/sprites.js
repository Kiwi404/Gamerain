var spritePlayer = [
    1,1,1,0,0,0,0,
    0,1,0,0,0,0,0,
    1,1,1,1,1,0,0,
    1,0,1,0,1,1,0,
    1,1,1,1,1,0,0,
    0,1,0,0,0,0,0,
    1,1,1,0,0,0,0,
    ];

var spriteEnemy1 = [
    0,0,1,1,1,0,0,
    0,1,0,0,0,1,0,
    1,0,0,1,0,0,1,
    1,0,1,0,1,0,1,
    1,0,0,1,0,0,1,
    0,1,0,0,0,1,0,
    0,0,1,1,1,0,0,
    ];

var spriteEnemy2 = [
    0,0,0,1,0,0,0,
    0,0,1,0,1,0,0,
    0,1,0,0,0,1,0,
    1,0,0,1,0,0,1,
    0,1,0,0,0,1,0,
    0,0,1,0,1,0,0,
    0,0,0,1,0,0,0,
    ];

var spriteEnemy3 = [
    0,0,1,1,1,0,0,
    0,0,1,0,1,0,0,
    1,1,1,1,1,1,1,
    1,0,1,0,1,0,1,
    1,1,1,1,1,1,1,
    0,0,1,0,1,0,0,
    0,0,1,1,1,0,0,
    ];



function drawSprite(x,y,sprite){
    ctx.fillStyle = '#fff';
    var data = [];
    if(sprite=='player'){data = spritePlayer};
    if(sprite=='enemy1'){data = spriteEnemy1};
    if(sprite=='enemy2'){data = spriteEnemy2};
    if(sprite=='enemy3'){data = spriteEnemy3};
    var dx = 0;
    var dy = 0;
    for(var i = 0;i<data.length;i++){
        if(data[i]==1){
            ctx.fillRect((dx*10)+x,(dy*10)+y,10,10);
        }
        dx++;
        if(dx>6){
            dx = 0;
            dy++;
        }
    }
    
}