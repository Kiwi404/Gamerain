var c = document.getElementById('game');
var ctx = c.getContext('2d');

var W = 1000;
var H = 650;

var gameStarted = false;

window.onload = function(){tick()}

function startGame(){
    if(!gameStarted){
        document.getElementById('game-holder').style.visibility = 'visible';
        enemySetup();
        gameStarted = true;
    }
}

function closeGame(){
    if(gameStarted){
        document.getElementById('game-holder').style.visibility = 'hidden';
        reset();
        gameStarted = false;
    }
}


function tick(){
    requestAnimationFrame(tick); 
    if(gameStarted){
        window.scrollTo(0,0);
        playerLogic();
        shotLogic();
        enemyLogic();
        testHit();
        draw();
    }
}

function reset(){
    enemys = [];
    waveTimer = 10;
    inWave = false;
    waveDone = false;
    waveAmount = 0;
    waveType = 1;
    spawnTimer = 10;
    waveTimeline = [1,1,2,2,3,3,3];
    currentWave = -1;
    shots = [];
    shotSpeed = 10;
    shotTimer = 10;
    particles = [];
    UP = false;
    DOWN = false;
    ACTION = false;
    speed = 12;
    player = new p();
    sParticles = [];
}