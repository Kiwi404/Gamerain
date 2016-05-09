var particle = function(x,y,vx,vy){
    this.x = x;
    this.y = y;
    this.vx = vx;
    this.vy = vy;
    this.life = Math.floor(Math.random()*10)+10;
}

var particles = [];

function explode(x,y){
    for(var i = 0;i<50;i++){
        var p = new particle(x+35,y+35,Math.floor(Math.random()*20)-10,Math.floor(Math.random()*20)-10);   
        particles.push(p);

    }
}

function drawParticles(){
    for(var i = 0;i<particles.length;i++){

        ctx.fillRect(particles[i].x-5,particles[i].y-5,10,10);
        particles[i].x += particles[i].vx;
        particles[i].y += particles[i].vy;
        particles[i].life--;
        if(particles[i].life<0){
            particles.splice(i,1);
        }
    }
}