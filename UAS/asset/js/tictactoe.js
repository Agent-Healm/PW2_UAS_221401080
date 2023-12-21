let temp = [];
let tile = [];
let moves_made_human = [];
let moves_made_ai = []
let moves_made = [];
let iris = [];
let x = null;
let moves = 'human';
let winner = false;
let gamescreen = 'menu'; //??
let c = null;
let winCondition = [
    [1,2,3],
    [1,4,7],
    [1,5,9],
    [2,5,8],
    [3,5,7],
    [3,6,9],
    [4,5,6],
    [7,8,9]
];

const resetter = () => {
    temp = [];
    tile = [];
    moves_made_human = [];
    moves_made_ai = []
    moves_made = [];
    x = null;
    moves = first_move;
    winner = false;
    gamescreen = 'menu';
    c = null;
    for (let x = 1; x<=9 ; x++){
        document.getElementById(`tile${x}`).style.background = 'none';
        document.getElementById(`tile${x}`).innerHTML = '';
    }
    document.getElementById('winner').innerHTML = ``;
    document.getElementById('restart').innerHTML = ``;
    if (moves === 'ai'){ai_first_mover();}
}

const ai_first_mover = () => {
    if (first_move === 'ai' || dif_code === 5){
        moves = 'ai';
        x = ai_move();
        moves_made_ai.push(x);
        tile_icon(x,moves);
        moves = 'human';
    }
}

const tile_icon = (a, b) => {
    c = (b === 'human')? 'rgb(10,200,40)' : 'rgb(200,40,10)'
    document.getElementById(`tile${a}`).style.backgroundColor = c;
    document.getElementById(`tile${a}`).innerHTML = (b === 'human')? 'X' : 'O'
}

const game_check = (move) => {
    moves_made = moves_made_ai.concat(moves_made_human);
    let a = 0;
    let temp_move = [];
    let b = false;
    if (moves_made.length <4){return false;}
    else {temp_move = move === 'human'? moves_made_human : moves_made_ai;}

    winCondition.forEach(pair => {
        pair.forEach(cell =>{
            if (temp_move.includes(cell)){
                a++;
            }
        })
        if (a === 3){
            document.getElementById('winner').innerHTML = `${moves} win`;
            b = true;
        }
        a = 0;
    })
    if (!b && moves_made.length === 9){
        document.getElementById('winner').innerHTML = `Draw`;
        b = true;
    }
    return b;
}

const ai_move = () => {
    x = -1;
    if (moves_made.length <=2){
        // move 5 : impossible
        if (dif_code >= 5){
                if (moves_made.length === 0){
                    do {
                    x = Math.floor(Math.random()*5 ) * 2 + 1;
                    } while (moves_made.includes(x));
                }
                else if(moves_made.length >= 2) {
                    let player_move = moves_made_human[0];
                    let row = (4 - (~~ ((player_move + 2) / 3)));
                    let col = 4 - ((player_move + 2) % 3 + 1) ;
    
                    if (moves_made_ai[0] === 5){
                        if (player_move %2 === 0){
                            row = row === 2 ? Math.floor(Math.random()*2)*2 + 1 : row;
                            col = col === 2 ? Math.floor(Math.random()*2)*2 + 1 : col;
                        }
                        x = (row - 1) * 3 + col;
                    }
                    else if (moves_made_ai[0] %2 !== 0){
                        if (player_move === 5){
                            row = (4 - (~~ ((moves_made_ai[0] + 2) / 3)));
                            col = 4 - ((moves_made_ai[0] + 2) % 3 + 1) ;
                            x = (row - 1) * 3 + col;
                        }
                        else if (player_move % 2 !== 0){
                            do {
                                x = Math.floor(Math.random()*2) * 2  + Math.floor(Math.random()*2) * 6 + 1;
                                } while (moves_made.includes(x));
                        }
                        else if (player_move % 2 === 0){x = 5;}
                        else{
                            do {
                            x = Math.floor(Math.random()*4 ) * 2 + 3;
                            } while (moves_made.includes(x));
                        }
                    }
                    else {
    
                    }
                }
        }
    }

    else{
        // move 1 : easy+
        if (dif_code >= 1){
            for (let i = 0; i<=7 ; i++){
                iris = winCondition[i].filter(cell => moves_made_ai.includes(cell));
                if (iris.length === 2) {
                    x = winCondition[i].filter(cell => !iris.includes(cell));
                    x = x[0];
                    if (moves_made.includes(x)){ x = -1; }
                    else { return x; }
                } 
            }
        }   

        // move 2 : medium+
        if (dif_code >=2){
            for (let i = 0; i<=7 ; i++){
                iris = winCondition[i].filter(cell => moves_made_human.includes(cell));
                if (iris.length === 2) {
                    x = winCondition[i].filter(cell => !iris.includes(cell));
                    x = x[0];
                    if (moves_made.includes(x)){ x = -1; }
                    else { return x; }
                } 
            }
        }

        // move 3 : hard+
        if (dif_code >= 3){
            temp = [];
            for (let i = 0; i<=7 ; i++){
                iris = winCondition[i].filter(cell => !moves_made_ai.includes(cell));
                if (iris.length === 2) {
                    iris = iris.filter(num => !moves_made.includes(num));
                    if (iris.length === 2) {
                    temp = temp.concat(iris);
                    }
                }
            }
            temp = temp.sort();
            for ( let i = 0; i<temp.length ; i++){
                if (temp[i] === temp[i+1]){
                    return temp[i];
                }
            }
        }

        // move 4 : extreme+
        if (dif_code >= 4) {
            temp = [];
            for (let i = 0; i<=7 ; i++){
                iris = winCondition[i].filter(cell => !moves_made_human.includes(cell));
                if (iris.length === 2) {
                    iris = iris.filter(num => !moves_made.includes(num));
                    if (iris.length === 2) {
                    temp = temp.concat(iris);
                    }
                }
            }
            temp = temp.sort();
            for ( let i = 0; i<temp.length ; i++){
                if (temp[i] === temp[i+1]){
                    return temp[i];
                }
            }
        }

    }
    if (moves_made.includes(x) || x< 0 ){
        do {
            x = Math.floor(Math.random()*9 + 1);
            } while (moves_made.includes(x));
    }
    return x;
}

const game = (x) => {
    moves_made = moves_made_ai.concat(moves_made_human);
    if ((moves_made.length < 9) && (!winner)){
        if ((!moves_made.includes(x))){
            if(moves === 'human'){
            moves_made_human.push(x);
            tile_icon(x,moves);

            winner = game_check(moves);
            moves = 'ai';
            if ((moves_made.length < 9) && (!winner)){
                moves_made = moves_made_ai.concat(moves_made_human);

                x = ai_move();
                moves_made_ai.push(x);
                tile_icon(x,moves);
                winner = game_check(moves);
                moves = 'human';
            }
            }
            if (winner){
                document.getElementById('restart').innerHTML = `Restart?`;
                const reset = document.querySelector('#restart');
                reset.onclick = function() {resetter();}
            }
        x = null;
        }
    }
}

const move = () => {
    tile[0] = document.querySelector(`#tile1`);
    tile[1] = document.querySelector(`#tile2`);
    tile[2] = document.querySelector(`#tile3`);
    tile[3] = document.querySelector(`#tile4`);
    tile[4] = document.querySelector(`#tile5`);
    tile[5] = document.querySelector(`#tile6`);
    tile[6] = document.querySelector(`#tile7`);
    tile[7] = document.querySelector(`#tile8`);
    tile[8] = document.querySelector(`#tile9`);

    if (!winner){
        tile[0].onclick = function() {game(1);}
        tile[1].onclick = function() {game(2);}
        tile[2].onclick = function() {game(3);}
        tile[3].onclick = function() {game(4);}
        tile[4].onclick = function() {game(5);}
        tile[5].onclick = function() {game(6);}
        tile[6].onclick = function() {game(7);}
        tile[7].onclick = function() {game(8);}
        tile[8].onclick = function() {game(9);}
    }
}

move();

const searchParams = new URLSearchParams(window.location.search);
let dif = searchParams.get('dif');
// let first_move = searchParams.get('first');
let dif_code = 1;
switch (dif) {
    case 'beginner' : 
    first_move = 'human';
    dif_code = 0; break;

    case 'easy' : 
    first_move = 'human';
    dif_code = 1; break;

    case 'medium' : 
    first_move = 'human';
    dif_code = 2; break;

    case 'hard' : 
    first_move = 'human';
    dif_code = 3; break;

    case 'extreme' : 
    first_move = 'ai';
    dif_code = 4; break;

    case 'impossible' :
    first_move = 'ai';
    dif_code = 5; break;
}

setInterval(function(){
    let bgColor = document.body.style.backgroundColor;
    let rgbi = bgColor.match(/\d+/g);
    const border = document.getElementsByClassName("border1");
    for (let i=0 ; i<border.length; i++){
        border[i].style.borderColor = 
        `rgb( ${255 -rgbi[0]}, ${255 -rgbi[1]}, ${255 -rgbi[2]})`;
    }
}, 100);
ai_first_mover();