function draw(){
    ctx.clearRect(0,0,W,H);
    drawSprite(30,player.y,'player'); 
    drawShots();
    drawEnemys();
   drawParticles();
    drawStates();
}

function drawStates(){
    ctx.fillStyle = 'rgba(0,0,0,0.5)';
    ctx.fillRect(0,0,W,50);
    ctx.fillStyle = 'rgba(255,255,255,1)';
    ctx.font="30px Arial";
    if(currentWave+1<=10){
        ctx.fillText('Wave '+(currentWave+1)+"/10",W-190,35);
    }else{
        ctx.fillText('Wave 10/10',W-190,35);
    }
    ctx.fillText('Score '+player.score+"/950",10,35);
    ctx.fillStyle = '#fff';   
}