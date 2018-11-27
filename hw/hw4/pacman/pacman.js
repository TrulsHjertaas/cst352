
const PACMAN_SPEED = 6;
const GHOST_SPEED = 4;

var output;
var pacman;
var redGhost;
var blueGhost;
var greenGhost;
var pinkGhost;

var rgDirection;
var loopTimer;
var numLoops = 0;
var gameWindow;
var direction = 'right';
var walls = new Array();

var upArrowDown = false;
var downArrowDown = false;
var leftArrowDown = false;
var rightArrowDown = false;

function loadComplete(){
	//output = document.getElementById("output");
	output = $("#output");
	//gameWindow = document.getElementById("gameWindow");
	gameWindow = $("#gameWindow");
	
	//PACMAN
	pacman = document.getElementById("pacman");
	pacman.style.left = '280px';
	pacman.style.top = '120px';
	pacman.style.width = '36px';
	pacman.style.height = '36px';
	
	//RED GHOST
	redGhost = document.getElementById("redGhost");
	redGhost.style.left = '40px';
	redGhost.style.top = '40px';
	redGhost.style.width = '40px';
	redGhost.style.height = '40px';
	
	//BLUE GHOST
	blueGhost = document.getElementById("blueGhost");
	blueGhost.style.left = '40px';
	blueGhost.style.top = '320px';
	blueGhost.style.width = '40px';
	blueGhost.style.height = '40px';
	
	// GREEN GHOST
	greenGhost = document.getElementById("greenGhost");
	greenGhost.style.left = '520px';
	greenGhost.style.top = '40px';
	greenGhost.style.width = '40px';
	greenGhost.style.height = '40px';
	
	// PINK GHOST
	pinkGhost = document.getElementById("pinkGhost");
	pinkGhost.style.left = '520px';
	pinkGhost.style.top = '320px';
	pinkGhost.style.width = '40px';
	pinkGhost.style.height = '40px';
	
	loopTimer = setInterval(loop, 50);
	
	//INSIDE 
	/*createWall(200, 275, 200, 40);
	//TOP
	createWall(-20, 0, 640, 40);
	//LEFT SIDE
	createWall(0, 0, 40, 180);
	createWall(0, 225, 40, 180);
	//RIGHT SIDE
	createWall(560, 0, 40, 180);
	createWall(560, 225, 40, 180);
	//BOTTOM
	createWall(-20, 360, 640, 40);
	//MID_GAME
	createWall(80, 82, 116, 40);
	createWall(240, 82, 40, 40);
	createWall(320, 82, 36, 40);
	createWall(400, 82, 120, 40);
	
	createWall(80, 166, 116, 40);
	createWall(240, 166, 40, 68);
	createWall(320, 166, 36, 68);
	createWall(400, 166, 116, 40);
	//createWall(200, 206, 40, 40);
	
	createWall(80, 250, 78, 68);
	createWall(440, 250, 78, 68);*/
	
	createWall(240,200,120,40);
	createWall(240,280,120,40);
	createWall(80,160,40,160);
	createWall(480,160,40,160);
	createWall(160,240,40,160);
	createWall(160,0,40,120);
	createWall(400,240,40,160);
	createWall(400,0,40,120);
	createWall(80,80,40,40);
	createWall(480,80,40,40);
	createWall(160,160,40,40);
	createWall(400,160,40,40);
	createWall(240,80,40,80);
	createWall(320,80,40,80);
	createWall(-20,0,640,40);
	createWall(0,0,40,160);
	createWall(0,200,40,200);
	createWall(560,0,40,160);
	createWall(560,200,40,200);
	createWall(-20,360,640,40);
	
}

function createWall(left, top, width, height) {
    var wall = document.createElement('div');
    
	wall.setAttribute('id', 'wall_1');
	wall.className = 'wall';
	wall.style.left = left + 'px';
	wall.style.top = top + 'px';
	wall.style.height = height + 'px';
	wall.style.width = width + 'px';
	
	gameWindow.append(wall);
	
	
	walls.push(wall);
	//output.innerHTML = walls.length;
	output.html(walls.length);
	output.append(" walls in the game");
}

function loop() {
    numLoops++;
    tryToChangeDirection();
    
    var originalLeft = pacman.style.left;
    var originalTop = pacman.style.top;
    
    if(direction == 'up') {
        var pacmanY = parseInt(pacman.style.top) - PACMAN_SPEED;
        if(pacmanY < -30) pacmanY = 390;
        pacman.style.top = pacmanY + 'px';
    }
    if(direction == 'down') {
        var pacmanY = parseInt(pacman.style.top) + PACMAN_SPEED;
        if(pacmanY > 390) pacmanY = -30;
        pacman.style.top = pacmanY + 'px';
    }
    if(direction == 'left') {
        var pacmanX = parseInt(pacman.style.left) - PACMAN_SPEED;
        if(pacmanX < -30) pacmanX = 590;
        pacman.style.left = pacmanX + 'px';
    }
    if(direction == 'right') {
        var pacmanX = parseInt(pacman.style.left) + PACMAN_SPEED;
        if(pacmanX > 590) pacmanX = -30;
        pacman.style.left = pacmanX + 'px';
    }
    
    if(hitWall(pacman) ) {
        pacman.style.left = originalLeft;
        pacman.style.top = originalTop;
    }
    
    moveRedGhost();
    moveBlueGhost();
    moveGreenGhost();
    movePinkGhost();
    
    if( hittest(pacman, redGhost) || hittest(pacman, blueGhost) 
    || hittest(pacman, greenGhost) || hittest(pacman, pinkGhost)) {
        //output.innerHTML = 'You Died';
        output.html("You Died");
        clearInterval(loopTimer);
    }
}

function moveRedGhost() {
    
    var rgX = parseInt(redGhost.style.left);
    var rgY = parseInt(redGhost.style.top);
    var rgNewDirection;
    var rgOppositeDirection;
    
    if(rgDirection == 'left') rgOppositeDirection = 'right';
    else if(rgDirection == 'right') rgOppositeDirection = 'left';
    else if(rgDirection == 'down') rgOppositeDirection = 'up';
    else if(rgDirection == 'up') rgOppositeDirection = 'down';
    
    do{
        redGhost.style.left = rgX + 'px';
        redGhost.style.top = rgY + 'px';
    
        do{
            var r = Math.floor(Math.random() * 4);
            if(r == 0) rgNewDirection = 'right';
            else if(r==1) rgNewDirection = 'left';
            else if(r==2) rgNewDirection = 'down';
            else if(r==3) rgNewDirection = 'up';
        } while (rgNewDirection == rgOppositeDirection);
        
        if(rgNewDirection == 'right') {
            if(rgX > 590) rgX = -30;
            redGhost.style.left = rgX + GHOST_SPEED + 'px';
        }
        else if(rgNewDirection == 'left') {
            if(rgX < -30) rgX = 590;
            redGhost.style.left = rgX - GHOST_SPEED + 'px';
        }
        else if(rgNewDirection == 'down') {
            if(rgY > 390) rgY = -30;
            redGhost.style.top = rgY + GHOST_SPEED + 'px';
        }
        else if(rgNewDirection == 'up') {
            if(rgY < -30) rgY = 390;
            redGhost.style.top = rgY - GHOST_SPEED + 'px';
        }
    
    } while(hitWall(redGhost));
    
    rgDirection = rgNewDirection;
    
}

function moveBlueGhost() {
    
    var rgX = parseInt(blueGhost.style.left);
    var rgY = parseInt(blueGhost.style.top);
    var rgNewDirection;
    var rgOppositeDirection;
    
    if(rgDirection == 'left') rgOppositeDirection = 'right';
    else if(rgDirection == 'right') rgOppositeDirection = 'left';
    else if(rgDirection == 'down') rgOppositeDirection = 'up';
    else if(rgDirection == 'up') rgOppositeDirection = 'down';
    
    do{
        blueGhost.style.left = rgX + 'px';
        blueGhost.style.top = rgY + 'px';
    
        do{
            var r = Math.floor(Math.random() * 4);
            if(r == 0) rgNewDirection = 'right';
            else if(r==1) rgNewDirection = 'left';
            else if(r==2) rgNewDirection = 'down';
            else if(r==3) rgNewDirection = 'up';
        } while (rgNewDirection == rgOppositeDirection);
        
        if(rgNewDirection == 'right') {
            if(rgX > 590) rgX = -30;
            blueGhost.style.left = rgX + GHOST_SPEED + 'px';
        }
        else if(rgNewDirection == 'left') {
            if(rgX < -30) rgX = 590;
            blueGhost.style.left = rgX - GHOST_SPEED + 'px';
        }
        else if(rgNewDirection == 'down') {
            if(rgY > 390) rgY = -30;
            blueGhost.style.top = rgY + GHOST_SPEED + 'px';
        }
        else if(rgNewDirection == 'up') {
            if(rgY < -30) rgY = 390;
            blueGhost.style.top = rgY - GHOST_SPEED + 'px';
        }
    
    } while(hitWall(blueGhost));
    
    rgDirection = rgNewDirection;
    
}

function moveGreenGhost() {
    
    var rgX = parseInt(greenGhost.style.left);
    var rgY = parseInt(greenGhost.style.top);
    var rgNewDirection;
    var rgOppositeDirection;
    
    if(rgDirection == 'left') rgOppositeDirection = 'right';
    else if(rgDirection == 'right') rgOppositeDirection = 'left';
    else if(rgDirection == 'down') rgOppositeDirection = 'up';
    else if(rgDirection == 'up') rgOppositeDirection = 'down';
    
    do{
        greenGhost.style.left = rgX + 'px';
        greenGhost.style.top = rgY + 'px';
    
        do{
            var r = Math.floor(Math.random() * 4);
            if(r == 0) rgNewDirection = 'right';
            else if(r==1) rgNewDirection = 'left';
            else if(r==2) rgNewDirection = 'down';
            else if(r==3) rgNewDirection = 'up';
        } while (rgNewDirection == rgOppositeDirection);
        
        if(rgNewDirection == 'right') {
            if(rgX > 590) rgX = -30;
            greenGhost.style.left = rgX + GHOST_SPEED + 'px';
        }
        else if(rgNewDirection == 'left') {
            if(rgX < -30) rgX = 590;
            greenGhost.style.left = rgX - GHOST_SPEED + 'px';
        }
        else if(rgNewDirection == 'down') {
            if(rgY > 390) rgY = -30;
            greenGhost.style.top = rgY + GHOST_SPEED + 'px';
        }
        else if(rgNewDirection == 'up') {
            if(rgY < -30) rgY = 390;
            greenGhost.style.top = rgY - GHOST_SPEED + 'px';
        }
    
    } while(hitWall(greenGhost));
    
    rgDirection = rgNewDirection;
    
}

function movePinkGhost() {
    
    var rgX = parseInt(pinkGhost.style.left);
    var rgY = parseInt(pinkGhost.style.top);
    var rgNewDirection;
    var rgOppositeDirection;
    
    if(rgDirection == 'left') rgOppositeDirection = 'right';
    else if(rgDirection == 'right') rgOppositeDirection = 'left';
    else if(rgDirection == 'down') rgOppositeDirection = 'up';
    else if(rgDirection == 'up') rgOppositeDirection = 'down';
    
    do{
        pinkGhost.style.left = rgX + 'px';
        pinkGhost.style.top = rgY + 'px';
    
        do{
            var r = Math.floor(Math.random() * 4);
            if(r == 0) rgNewDirection = 'right';
            else if(r==1) rgNewDirection = 'left';
            else if(r==2) rgNewDirection = 'down';
            else if(r==3) rgNewDirection = 'up';
        } while (rgNewDirection == rgOppositeDirection);
        
        if(rgNewDirection == 'right') {
            if(rgX > 590) rgX = -30;
            pinkGhost.style.left = rgX + GHOST_SPEED + 'px';
        }
        else if(rgNewDirection == 'left') {
            if(rgX < -30) rgX = 590;
            pinkGhost.style.left = rgX - GHOST_SPEED + 'px';
        }
        else if(rgNewDirection == 'down') {
            if(rgY > 390) rgY = -30;
            pinkGhost.style.top = rgY + GHOST_SPEED + 'px';
        }
        else if(rgNewDirection == 'up') {
            if(rgY < -30) rgY = 390;
            pinkGhost.style.top = rgY - GHOST_SPEED + 'px';
        }
    
    } while(hitWall(pinkGhost));
    
    rgDirection = rgNewDirection;
    
}

function hitWall(element) {
    var hit = false;
    
    for(var i = 0; i < walls.length; i ++) {
        if(hittest(walls[i], element)) hit = true;
    }
    
    return hit;
}

function tryToChangeDirection() {
    var originalLeft = pacman.style.left;
    var originalTop = pacman.style.top;
    
    if(leftArrowDown) {
        pacman.style.left = parseInt(pacman.style.left) - PACMAN_SPEED + 'px';
        if(!hitWall(pacman) ) {
            direction = 'left';
            pacman.className = "flip-horizontal";
        }
    } //LEFT
    if(upArrowDown) {
        pacman.style.top = parseInt(pacman.style.top) - PACMAN_SPEED + 'px';
        if(!hitWall(pacman) ) {
            direction = 'up';
            pacman.className = "rotate270";
        }
    } //UP
    if(rightArrowDown) {
        pacman.style.left = parseInt(pacman.style.left) + PACMAN_SPEED + 'px';
        if(!hitWall(pacman) ) {
            direction = 'right';
            pacman.className = "";
        }
    } //RIGHT
    if(downArrowDown) {
        pacman.style.top = parseInt(pacman.style.top) + PACMAN_SPEED + 'px';
        if(!hitWall(pacman) ) {
            direction = 'down';
            pacman.className = "rotate90";
        }
    } //DOWN
    
    pacman.style.left = originalLeft;
    pacman.style.top = originalTop;
}

document.addEventListener('keydown', function(event) {
    if(event.keyCode == 37) leftArrowDown = true; //LEFT
    if(event.keyCode == 38) upArrowDown = true; //UP
    if(event.keyCode == 39) rightArrowDown = true; //RIGHT
    if(event.keyCode == 40) downArrowDown = true; //DOWN
});

document.addEventListener('keyup', function(event) {
    if(event.keyCode == 37) leftArrowDown = false; //LEFT
    if(event.keyCode == 38) upArrowDown = false; //UP
    if(event.keyCode == 39) rightArrowDown = false; //RIGHT
    if(event.keyCode == 40) downArrowDown = false; //DOWN
});

function hittest(a, b){
	var aX1 = parseInt(a.style.left);
	var aY1 = parseInt(a.style.top);
	var aX2 = aX1 + parseInt(a.style.width)-1;
	var aY2 = aY1;
	var aX3 = aX1;
	var aY3 = aY1 + parseInt(a.style.height)-1;
	var aX4 = aX2;
	var aY4 = aY3;

	var bX1 = parseInt(b.style.left);
	var bY1 = parseInt(b.style.top);
	var bX2 = bX1 + parseInt(b.style.width)-1;
	var bY2 = bY1;
	var bX3 = bX1;
	var bY3 = bY1 + parseInt(b.style.height)-1;
	var bX4 = bX2;
	var bY4 = bY3;

	var hit = false;
	
	if(aX1>bX1 && aX1<bX2 && aY1>bY1 && aY1<bY3) hit = true;
	else if(aX2>=bX1 && aX2<=bX2 && aY2>=bY1 && aY2<=bY3) hit = true;
	else if(aX3>=bX1 && aX3<=bX2 && aY3>=bY1 && aY3<=bY3) hit = true;
	else if(aX4>=bX1 && aX4<=bX2 && aY4>=bY1 && aY4<=bY3) hit = true;
	else if(bX1>=aX1 && bX1<=aX2 && bY1>=aY1 && bY1<=aY3) hit = true;
	else if(bX2>=aX1 && bX2<=aX2 && bY2>=aY1 && bY2<=aY3) hit = true;
	else if(bX3>=aX1 && bX3<=aX2 && bY3>=aY1 && bY3<=aY3) hit = true;
	else if(bX4>=aX1 && bX4<=aX2 && bY4>=aY1 && bY4<=aY3) hit = true;

	return hit;
}


