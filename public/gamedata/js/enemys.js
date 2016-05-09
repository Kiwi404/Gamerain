var enemys = [];

var waveTimer = 10;

var inWave = false;

var waveDone = false;

var waveAmount = 0;
var waveType = 1;

var spawnTimer = 10;

var waveTimeline = [1,1,2,2,3,3,3];

var currentWave = -1;


var enemy = function (x,y,type){
    this.x = x;
    this.y = y;
    this.type = type;
    this.b = Math.random() >= 0.5;;
}

function enemySetup(){
    waveTimeline = shuffleArray(waveTimeline);
    waveTimeline.unshift(2);
    waveTimeline.unshift(1);
    waveTimeline.unshift(3);
    alert('Ready?');
}

function enemyLogic(){
    spawnLogic();
    spawner();
    for(var i = 0;i<enemys.length;i++){
        if(enemys[i].type == 1){
            enemys[i].x-=8;
        };
        if(enemys[i].type == 2){
            enemys[i].x-=8;
            if(enemys[i].b){
                enemys[i].y -= 4;  
            }else{
                enemys[i].y += 4;  
            }
            
            if(enemys[i].y<10){
                   enemys[i].b = false;
            } 
            if(enemys[i].y>550){
                   enemys[i].b = true;
            }
        };
        if(enemys[i].type == 3){
            enemys[i].x-=4;
        };
        
    }
    
}

function spawnLogic(){
    waveTimer--;
    if(waveTimer<0){
        inWave = true;
    }
       
}

function spawner(){
    if(currentWave<10){
        if(inWave){
            currentWave++;
            waveDone = true;
            waveAmount = 10;
            waveTimer = 999999999999999999999;
            waveType = waveTimeline[currentWave];
            inWave = false;
        }
        if(waveAmount>0){
            spawnTimer--;
            if(spawnTimer < 0){
                spawnTimer = 40;
                var e = new enemy(W+100,Math.floor(Math.random()*550)+10,waveType);
                enemys.push(e);
                waveAmount--;
            }   
        }else{
            if(waveDone){
                waveTimer = 250;
                waveDone = false;

            }
        }
    }else{
        document.getElementById('discount-amount').innerHTML = Math.floor((player.score/950)*15);
        document.getElementById('total-price-buy').innerHTML = fixPrice(Math.round((document.getElementById('js-pass').innerHTML/100 * (100-Math.floor((player.score/950)*15)))*100)/100);
        document.getElementById('discount-input').value = Math.floor((player.score/950)*15);
        closeGame();
    }
    
    
    
}

function fixPrice(num){
    var n = Math.floor(num * 100) / 100,
        s = n.toString();

    // if it's one decimal place, add a trailing zero:
    return s.split('.')[1].length === 1 ? (s + '0') : n;
}

function drawEnemys(){
    for(var i = 0;i<enemys.length;i++){
        drawSprite(enemys[i].x,enemys[i].y,"enemy"+enemys[i].type);
        if(enemys[i].x<-100){
            enemys.splice(i,1);   
        }
    }

    
}

function shuffleArray(array) {
    for (var i = array.length - 1; i > 0; i--) {
        var j = Math.floor(Math.random() * (i + 1));
        var temp = array[i];
        array[i] = array[j];
        array[j] = temp;
    }
    return array;
}