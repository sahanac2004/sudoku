<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="theme-color" content="#fff">
    <title>Sudoku</title>
    <link rel="shortcut icon" href="./static/images/sudoku.png" type="image/x-icon">
   
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Potta+One&display=swap" rel="stylesheet">
    
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
   
   <style>:root {
    --bg-main: #83a4ae;
    --bg-body: #040000;
    --color-txt: #0b0202;
    --filled-color: #1b8729;
    --filled-bg: #bde4eb;

    --white: #0f0303;
    --blue: #9d9191;
    --red: #f0e9ec;
    --black: #2c8851;

    --nav-size: 70px;
    --sudoku-cell-size: 50px;

    --border-radius: 10px;

    --space-y: 20px;

    --gap: 5px;

    --font-size: 1.5rem;
    --font-size-lg: 2rem;
    --font-size-xl: 3rem;
}

.dark {
    --bg-main: #bebeeb;
    --bg-body: #2b2b38;
    --color-txt: #0a073c;
    --filled-color: #4f4f63;
    --filled-bg: #000;
}

* {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    -webkit-tap-highlight-color: transparent;
}
.btn{
    font-family:fantasy;
     color: #3c9b8f;
}
body {
    font-family:fantasy;
    height: 100vh; 
   
    overflow-x: hidden;
    user-select: none;
    
}

input {
    font-family:fantasy;
    border: 2px solid var(--bg-main);
    color: var(--color-txt);
}

input:hover,
input:focus {
    border-color: var(--blue);
}

a {
    text-decoration: none;
    color: unset;
}

ul {
    list-style-type: none;
}

nav {
    
    color: var(--color-txt);
    position: fixed;
    top: 0;
    width: 100%;
    box-shadow: 5px 2px var(--bg-main);
    z-index: 99;
}

.nav-container {
    max-width: 1280px;
    margin: auto;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 40px;
    height: var(--nav-size);
}

.nav-logo {
    font-size: var(--font-size-lg);
    color: var(--blue);
}

.dark-mode-toggle {
    color: var(--blue);
    font-size: var(--font-size-lg);
    cursor: pointer;
}

.bxs-sun {
    display: none;
}

.bxs-moon {
    display: inline-block;
}

.dark .bxs-sun {
    display: inline-block;
}

.dark .bxs-moon {
    display: none;
}

.main {
    /* height: 100vh; */
    padding-top: var(--nav-size);
    display: grid;
    place-items: center;
}

.screen {
    position: relative;
    overflow: hidden;
    height: 100%;
    min-width: 400px;
}

.start-screen {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    transform: translateX(-100%);
    transition: transform 0.3s ease-in-out;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.start-screen.active {
    transform: translateX(0);
}

.start-screen > * + * {
    margin-top: 20px;
}

.input-name {
    height: 80px;
    width: 280px;
    border-radius: var(--border-radius);
    outline: 0;
    background-color: var(--bg-main);
    padding: 20px;
    font-size: var(--font-size-lg);
    text-align: center;
}

.btn {
    height: 80px;
    width: 280px;
    background-color: var(--bg-main);
    color: var(--color-txt);
    border-radius: var(--border-radius);
    display: grid;
    place-items: center;
    transition: width 0.3s ease-in-out;
    overflow: hidden;
    font-size: var(--font-size-lg);
    cursor: pointer;
}

.btn-blue {
    background-color: var(--blue);
    color: var(--white);
}

.input-err {
    border-color: var(--red);
    animation: bounce 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}



.main-game {
    display: flex;
    height: 100%;
    flex-direction: column;
    justify-content: space-between;
    padding: 30px 0;
    transform: translateX(100%);
    transition: transform 0.3s ease-in-out;
}

.main-game.active {
    transform: translateX(0);
}

.main-sudoku-grid {
    display: grid;
    gap: var(--gap);
    grid-template-columns: repeat(9, auto);
}

.main-grid-cell {
    height: var(--sudoku-cell-size);
    width: var(--sudoku-cell-size);
    border-radius: var(--border-radius);
    background-color: var(--bg-main);
    color: var(--blue);
    display: grid;
    place-items: center;
    font-size: var(--font-size);
    cursor: pointer;
}

.main-grid-cell.filled {
    background-color: var(--filled-bg);
    color: var(--filled-color);
}

.main-grid-cell.selected {
    background-color: var(--blue);
    color: var(--white);
}

.main-grid-cell:hover {
    border: 2px solid var(--blue);
}

.main-grid-cell.hover {
    border: 3px solid var(--blue);
}

.dark .main-grid-cell.hover {
    border: 1px solid var(--blue);
}

.main-grid-cell.err {
    background-color: var(--red);
    color: var(--white);
}

.main-game-info {
    margin-top: var(--space-y);
    margin-bottom: 10px;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 10px;
}

.main-game-info-box {
    height: 45px;
    background-color: var(--bg-main);
    color: var(--color-txt);
    border-radius: var(--border-radius);
    display: grid;
    place-items: center;
    padding: 0 20px;
    font-size: var(--font-size);
}

.main-game-info-time {
    position: relative;
    align-items: center;
    justify-content: center;
    padding-left: 2rem;
    margin-bottom: auto;
}

.pause-btn {
    position: absolute;
    right: 10px;
    height: 30px;
    width: 30px;
    border-radius: var(--border-radius);
    background-color: var(--blue);
    color: var(--white);
    font-size: var(--font-size);
    display: grid;
    place-items: center;
    cursor: pointer;
}

.numbers {
    margin-top: var(--space-y);
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    gap: 5px;
}

.number {
    height: var(--sudoku-cell-size);
    border-radius: var(--border-radius);
    background-color: var(--bg-main);
    color: var(--color-txt);
    display: grid;
    place-items: center;
    font-size: var(--font-size);
    cursor: pointer;
}

.delete {
    background-color: var(--red);
    color: var(--white);
    height: var(--sudoku-cell-size);
    border-radius: var(--border-radius);
    display: grid;
    place-items: center;
    font-size: var(--font-size);
    cursor: pointer;
}

.pause-screen,
.result-screen {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: var(--bg-body);
    align-items: center;
    justify-content: center;
    flex-direction: column;
    display: none;
}

.pause-screen.active,
.result-screen.active {
    display: flex;
}

.pause-screen > * + *,
.result-screen > * + * {
    margin-top: 20px;
}

.result-screen.active div {
    animation: zoom-in 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}

.pause-screen.active .btn {
    animation: zoom-in 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}

.result-screen .congrate {
    font-size: var(--font-size-xl);
    color: var(--blue);
}

.result-screen .info {
    color: var(--color-txt);
    font-size: var(--font-size);
}

#result-time {
    color: var(--blue);
    font-size: var(--font-size-xl);
}

.zoom-in {
    animation: zoom-in 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}

@keyframes zoom-in {
    0% {
        transform: scale(3);
    }
    100% {
        transform: scale(1);
    }
}

.cell-err {
    animation: zoom-out-shake 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}

@keyframes zoom-out-shake {
    0% {
        transform: scale(2);
    }
    25% {
        transform: scale(2) rotate(30deg);
    }
    50% {
        transform: scale(2) rotate(-30deg);
    }
    100% {
        transform: scale(1);
    }
}

@media only screen and (max-width: 800px) {
    :root {
        --nav-size: 50px;

        --sudoku-cell-size: 30px;

        --border-radius: 5px;

        --space-y: 10px;

        --gap: 2px;

        --font-size: 1rem;
        --font-size-lg: 1.5rem;
        --font-size-xl: 2rem;
    }

    .input-name,
    .btn {
        height: 50px;
    }

    .main-grid-cell.hover {
        border-width: 2px;
    }

    .screen {
        min-width: unset;
    }

    .main {
        height: 100vh;
    }
}

body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #283048,#859398);
            background-size: 400% 400%;
            animation: gradientAnimation 15s ease infinite;
        }

        @keyframes gradientAnimation {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }




</style>
   

</head>

<body background="https://i.pinimg.com/564x/df/78/af/df78af5e39d635f212a439cec6149c42.jpg"></body>
   <body>
   
    <nav>
        <div class="nav-container">
            <a href="#" class="nav-logo">
                SUDOKU
            </a>
            <div class="dark-mode-toggle" id="dark-mode-toggle">
                <i class="bx bxs-sun"></i>
                <i class="bx bxs-moon"></i>
            </div>
        </div>
    </nav>
    
    <div class="main">
        <div class="screen">
            
            <div class="start-screen active" id="start-screen">
                <input type="text" placeholder="Your name" maxlength="11" class="input-name" id="input-name">
                <div class="btn" id="btn-level">
                    Easy
                </div>
                
                <div class="btn" id="btn-continue">Continue</div>
                <div class="btn btn-blue" id="btn-play">New game</div>
                <div class="btn" id="btn-how">How to Play</div>
                
                <div class="btn " >
                    <a href="index.html" >Home</a>
                </div>
                <div class="btn" onclick="goBack()"  >Goback</div>
                <script>
                    function goBack()
                    {
                      window.history.back()
                    }
                  </script>
                
            </div>
            <div class="container">
            <div class="main-game" id="game-screen">
                <div class="main-sudoku-grid">
                   
                    <div class="main-grid-cell"></div>
                    <div class="main-grid-cell"></div>
                    <div class="main-grid-cell"></div>
                    <div class="main-grid-cell"></div>
                    <div class="main-grid-cell"></div>
                    <div class="main-grid-cell"></div>
                    <div class="main-grid-cell"></div>
                    <div class="main-grid-cell"></div>
                    <div class="main-grid-cell"></div>
                    <div class="main-grid-cell"></div>
                    <div class="main-grid-cell"></div>
                    <div class="main-grid-cell"></div>
                    <div class="main-grid-cell"></div>
                    <div class="main-grid-cell"></div>
                    <div class="main-grid-cell"></div>
                    <div class="main-grid-cell"></div>
                    <div class="main-grid-cell"></div>
                    <div class="main-grid-cell"></div>
                    <div class="main-grid-cell"></div>
                    <div class="main-grid-cell"></div>
                    <div class="main-grid-cell"></div>
                    <div class="main-grid-cell"></div>
                    <div class="main-grid-cell"></div>
                    <div class="main-grid-cell"></div>
                    <div class="main-grid-cell"></div>
                    <div class="main-grid-cell"></div>
                    <div class="main-grid-cell"></div>
                    <div class="main-grid-cell"></div>
                    <div class="main-grid-cell"></div>
                    <div class="main-grid-cell"></div>
                    <div class="main-grid-cell"></div>
                    <div class="main-grid-cell"></div>
                    <div class="main-grid-cell"></div>
                    <div class="main-grid-cell"></div>
                    <div class="main-grid-cell"></div>
                    <div class="main-grid-cell"></div>
                    <div class="main-grid-cell"></div>
                    <div class="main-grid-cell"></div>
                    <div class="main-grid-cell"></div>
                    <div class="main-grid-cell"></div>
                    <div class="main-grid-cell"></div>
                    <div class="main-grid-cell"></div>
                    <div class="main-grid-cell"></div>
                    <div class="main-grid-cell"></div>
                    <div class="main-grid-cell"></div>
                    <div class="main-grid-cell"></div>
                    <div class="main-grid-cell"></div>
                    <div class="main-grid-cell"></div>
                    <div class="main-grid-cell"></div>
                    <div class="main-grid-cell"></div>
                    <div class="main-grid-cell"></div>
                    <div class="main-grid-cell"></div>
                    <div class="main-grid-cell"></div>
                    <div class="main-grid-cell"></div>
                    <div class="main-grid-cell"></div>
                    <div class="main-grid-cell"></div>
                    <div class="main-grid-cell"></div>
                    <div class="main-grid-cell"></div>
                    <div class="main-grid-cell"></div>
                    <div class="main-grid-cell"></div>
                    <div class="main-grid-cell"></div>
                    <div class="main-grid-cell"></div>
                    <div class="main-grid-cell"></div>
                    <div class="main-grid-cell"></div>
                    <div class="main-grid-cell"></div>
                    <div class="main-grid-cell"></div>
                    <div class="main-grid-cell"></div>
                    <div class="main-grid-cell"></div>
                    <div class="main-grid-cell"></div>
                    <div class="main-grid-cell"></div>
                    <div class="main-grid-cell"></div>
                    <div class="main-grid-cell"></div>
                    <div class="main-grid-cell"></div>
                    <div class="main-grid-cell"></div>
                    <div class="main-grid-cell"></div>
                    <div class="main-grid-cell"></div>
                    <div class="main-grid-cell"></div>
                    <div class="main-grid-cell"></div>
                    <div class="main-grid-cell"></div>
                    <div class="main-grid-cell"></div>
                    <div class="main-grid-cell"></div>
                </div>

                <div class="main-game-info">
                    <div class="main-game-info-box main-game-info-name">
                        <span id="player-name">tuat</span>
                    </div>
                    <div class="main-game-info-box main-game-info-level">
                        <span id="game-level">Easy</span>
                    </div>
                </div>

                <div class="main-game-info-box main-game-info-time">
                    <!--<span id="game-time">00:00</span> -->
                    <div class="pause-btn" id="btn-pause">
                        <i class="bx bx-pause"></i>
                    </div>
                </div>

                <div class="numbers">
                    <div class="number">1</div>
                    <div class="number">2</div>
                    <div class="number">3</div>
                    <div class="number">4</div>
                    <div class="number">5</div>
                    <div class="number">6</div>
                    <div class="number">7</div>
                    <div class="number">8</div>
                    <div class="number">9</div>
                    <div class="delete" id="btn-delete">X</div>
                </div>
            </div>
           
           
            <div class="pause-screen" id="pause-screen">
                <div class="btn btn-blue" id="btn-resume">Resume</div>
                <div class="btn" id="btn-new-game">New game</div>
            </div>
           
            <div class="result-screen" id="result-screen">
                <div class="congrate" >Completed</div>
                <!--<div class="info">Time</div> -->
                <!--<div id="result-time"></div> -->
                <div class="btn" id="btn-new-game-2">New game</div>
                

            </div>
           
        </div>
        
    </div>
    

    <script >const CONSTANT = {
    UNASSIGNED: 0,
    GRID_SIZE: 9,
    BOX_SIZE: 3,
    NUMBERS: [1,2,3,4,5,6,7,8,9],
    LEVEL_NAME: [
        'Easy',
        'Medium',
        'Hard'
        
    ],
    LEVEL: [29, 38, 47]
}</script>
    <script >const newGrid = (size) => {
    let arr = new Array(size);

    for (let i = 0; i < size; i++) {
        arr[i] = new Array(size);  
    }

    for (let i = 0; i < Math.pow(size, 2); i++) {
        arr[Math.floor(i/size)][i%size] = CONSTANT.UNASSIGNED;
    }

    return arr;
}


const isColSafe = (grid, col, value) => {
    for (let row = 0; row < CONSTANT.GRID_SIZE; row++) {
        if (grid[row][col] === value) return false;
    }
    return true;
}


const isRowSafe = (grid, row, value) => {
    for (let col = 0; col < CONSTANT.GRID_SIZE; col++) {
        if (grid[row][col] === value) return false;
    }
    return true;
}


const isBoxSafe = (grid, box_row, box_col, value) => {
    for (let row = 0; row < CONSTANT.BOX_SIZE; row++) {
        for (let col = 0; col < CONSTANT.BOX_SIZE; col++) {
            if (grid[row + box_row][col + box_col] === value) return false;
        }
    }
    return true;
}


const isSafe = (grid, row, col, value) => {
    return isColSafe(grid, col, value) && isRowSafe(grid, row, value) && isBoxSafe(grid, row - row%3, col - col%3, value) && value !== CONSTANT.UNASSIGNED;
}


const findUnassignedPos = (grid, pos) => {
    for (let row = 0; row < CONSTANT.GRID_SIZE; row++) {
        for (let col = 0; col < CONSTANT.GRID_SIZE; col++) {
            if (grid[row][col] === CONSTANT.UNASSIGNED) {
                pos.row = row;
                pos.col = col;
                return true;
            }
        }
    }
    return false;
}


const shuffleArray = (arr) => {
    let curr_index = arr.length;

    while (curr_index !== 0) {
        let rand_index = Math.floor(Math.random() * curr_index);
        curr_index -= 1;

        let temp = arr[curr_index];
        arr[curr_index] = arr[rand_index];
        arr[rand_index] = temp;
    }

    return arr;
}


const isFullGrid = (grid) => {
    return grid.every((row, i) => {
        return row.every((value, j) => {
            return value !== CONSTANT.UNASSIGNED;
        });
    });
}

const sudokuCreate = (grid) => {
    let unassigned_pos = {
        row: -1,
        col: -1
    }

    if (!findUnassignedPos(grid, unassigned_pos)) return true;

    let number_list = shuffleArray([...CONSTANT.NUMBERS]);

    let row = unassigned_pos.row;
    let col = unassigned_pos.col;

    number_list.forEach((num, i) => {
        if (isSafe(grid, row, col, num)) {
            grid[row][col] = num;

            if (isFullGrid(grid)) {
                return true;
            } else {
                if (sudokuCreate(grid)) {
                    return true;
                }
            }

            grid[row][col] = CONSTANT.UNASSIGNED;
        }
    });

    return isFullGrid(grid);
}

const sudokuCheck = (grid) => {
    let unassigned_pos = {
        row: -1,
        col: -1
    }

    if (!findUnassignedPos(grid, unassigned_pos)) return true;

    grid.forEach((row, i) => {
        row.forEach((num, j) => {
            if (isSafe(grid, i, j, num)) {
                if (isFullGrid(grid)) {
                    return true;
                } else {
                    if (sudokuCreate(grid)) {
                        return true;
                    }
                }
            }
        })
    })

    return isFullGrid(grid);
}

const rand = () => Math.floor(Math.random() * CONSTANT.GRID_SIZE);

const removeCells = (grid, level) => {
    let res = [...grid];
    let attemps = level;
    while (attemps > 0) {
        let row = rand();
        let col = rand();
        while (res[row][col] === 0) {
            row = rand();
            col = rand();
        }
        res[row][col] = CONSTANT.UNASSIGNED;
        attemps--;
    }
    return res;
}


const sudokuGen = (level) => {
    let sudoku = newGrid(CONSTANT.GRID_SIZE);
    let check = sudokuCreate(sudoku);
    if (check) {
        let question = removeCells(sudoku, level);
        return {
            original: sudoku,
            question: question
        }
    }
    return undefined;
}</script>
    <script >/*document.querySelector('#dark-mode-toggle').addEventListener('click', () => {
    document.body.classList.toggle('dark');
    const isDarkMode = document.body.classList.contains('dark');
    localStorage.setItem('darkmode', isDarkMode);
    
    document.querySelector('meta[name="theme-color"').setAttribute('content', isDarkMode ? '#1a1a2e' : '#fff');
});
document.getElementById('btn-how').addEventListener('click', function() {
    
    window.open('howtoplay.php', '_blank');
  });
const start_screen = document.querySelector('#start-screen');
const game_screen = document.querySelector('#game-screen');
const pause_screen = document.querySelector('#pause-screen');
const result_screen = document.querySelector('#result-screen');

const cells = document.querySelectorAll('.main-grid-cell');

const name_input = document.querySelector('#input-name');

const number_inputs = document.querySelectorAll('.number');

const player_name = document.querySelector('#player-name');
const game_level = document.querySelector('#game-level');
const game_time = document.querySelector('#game-time');

const result_time = document.querySelector('#result-time');

let level_index = 0;
let level = CONSTANT.LEVEL[level_index];

let timer = null;
let pause = false;
let seconds = 0;

let su = undefined;
let su_answer = undefined;

let selected_cell = -1;



const getGameInfo = () => JSON.parse(localStorage.getItem('game'));


const initGameGrid = () => {
    let index = 0;

    for (let i = 0; i < Math.pow(CONSTANT.GRID_SIZE,2); i++) {
        let row = Math.floor(i/CONSTANT.GRID_SIZE);
        let col = i % CONSTANT.GRID_SIZE;
        if (row === 2 || row === 5) cells[index].style.marginBottom = '10px';
        if (col === 2 || col === 5) cells[index].style.marginRight = '10px';

        index++;
    }
}


const setPlayerName = (name) => localStorage.setItem('player_name', name);
const getPlayerName = () => localStorage.getItem('player_name');

const showTime = (seconds) => new Date(seconds * 1000).toISOString().substr(11, 8);

const clearSudoku = () => {
    for (let i = 0; i < Math.pow(CONSTANT.GRID_SIZE, 2); i++) {
        cells[i].innerHTML = '';
        cells[i].classList.remove('filled');
        cells[i].classList.remove('selected');
    }
}

const initSudoku = () => {
   
    clearSudoku();
    resetBg();
   
    su = sudokuGen(level);
    su_answer = [...su.question];

    seconds = 0;

    saveGameInfo();

    
    for (let i = 0; i < Math.pow(CONSTANT.GRID_SIZE, 2); i++) {
        let row = Math.floor(i / CONSTANT.GRID_SIZE);
        let col = i % CONSTANT.GRID_SIZE;
        
        cells[i].setAttribute('data-value', su.question[row][col]);

        if (su.question[row][col] !== 0) {
            cells[i].classList.add('filled');
            cells[i].innerHTML = su.question[row][col];
        }
    }
}

const loadSudoku = () => {
    let game = getGameInfo();

    game_level.innerHTML = CONSTANT.LEVEL_NAME[game.level];

    su = game.su;

    su_answer = su.answer;

    seconds = game.seconds;
    game_time.innerHTML = showTime(seconds);

    level_index = game.level;

  
    for (let i = 0; i < Math.pow(CONSTANT.GRID_SIZE, 2); i++) {
        let row = Math.floor(i / CONSTANT.GRID_SIZE);
        let col = i % CONSTANT.GRID_SIZE;
        
        cells[i].setAttribute('data-value', su_answer[row][col]);
        cells[i].innerHTML = su_answer[row][col] !== 0 ? su_answer[row][col] : '';
        if (su.question[row][col] !== 0) {
            cells[i].classList.add('filled');
        }
    }
}

const hoverBg = (index) => {
    let row = Math.floor(index / CONSTANT.GRID_SIZE);
    let col = index % CONSTANT.GRID_SIZE;

    let box_start_row = row - row % 3;
    let box_start_col = col - col % 3;

    for (let i = 0; i < CONSTANT.BOX_SIZE; i++) {
        for (let j = 0; j < CONSTANT.BOX_SIZE; j++) {
            let cell = cells[9 * (box_start_row + i) + (box_start_col + j)];
            cell.classList.add('hover');
        }
    }

    let step = 9;
    while (index - step >= 0) {
        cells[index - step].classList.add('hover');
        step += 9;
    }

    step = 9;
    while (index + step < 81) {
        cells[index + step].classList.add('hover');
        step += 9;
    }

    step = 1;
    while (index - step >= 9*row) {
        cells[index - step].classList.add('hover');
        step += 1;
    }

    step = 1;
     while (index + step < 9*row + 9) {
        cells[index + step].classList.add('hover');
        step += 1;
    }
}

const resetBg = () => {
    cells.forEach(e => e.classList.remove('hover'));
}

const checkErr = (value) => {
    const addErr = (cell) => {
        if (parseInt(cell.getAttribute('data-value')) === value) {
            cell.classList.add('err');
            cell.classList.add('cell-err');
            setTimeout(() => {
                cell.classList.remove('cell-err');
            }, 500);
        }
    }

    let index = selected_cell;

    let row = Math.floor(index / CONSTANT.GRID_SIZE);
    let col = index % CONSTANT.GRID_SIZE;

    let box_start_row = row - row % 3;
    let box_start_col = col - col % 3;

    for (let i = 0; i < CONSTANT.BOX_SIZE; i++) {
        for (let j = 0; j < CONSTANT.BOX_SIZE; j++) {
            let cell = cells[9 * (box_start_row + i) + (box_start_col + j)];
            if (!cell.classList.contains('selected')) addErr(cell);
        }
    }

    let step = 9;
    while (index - step >= 0) {
        addErr(cells[index - step]);
        step += 9;
    }

    step = 9;
    while (index + step < 81) {
        addErr(cells[index + step]);
        step += 9;
    }

    step = 1;
    while (index - step >= 9*row) {
        addErr(cells[index - step]);
        step += 1;
    }

    step = 1;
    while (index + step < 9*row + 9) {
        addErr(cells[index + step]);
        step += 1;
    }
}

const removeErr = () => cells.forEach(e => e.classList.remove('err'));

const saveGameInfo = () => {
    let game = {
        level: level_index,
        seconds: seconds,
        su: {
            original: su.original,
            question: su.question,
            answer: su_answer
        }
    }
    localStorage.setItem('game', JSON.stringify(game));
}

const removeGameInfo = () => {
    localStorage.removeItem('game');
    document.querySelector('#btn-continue').style.display = 'none';
}

const isGameWin = () => sudokuCheck(su_answer);

const showResult = () => {
    clearInterval(timer);
    result_screen.classList.add('active');
    result_time.innerHTML = showTime(seconds);

}

const initNumberInputEvent = () => {
    number_inputs.forEach((e, index) => {
        e.addEventListener('click', () => {
            if (!cells[selected_cell].classList.contains('filled')) {
                cells[selected_cell].innerHTML = index + 1;
                cells[selected_cell].setAttribute('data-value', index + 1);
             
                let row = Math.floor(selected_cell / CONSTANT.GRID_SIZE);
                let col = selected_cell % CONSTANT.GRID_SIZE;
                su_answer[row][col] = index + 1;
                
                saveGameInfo()
               
                removeErr();
                checkErr(index + 1);
                cells[selected_cell].classList.add('zoom-in');
                setTimeout(() => {
                    cells[selected_cell].classList.remove('zoom-in');
                }, 500);

                
                if (isGameWin()) {
                    removeGameInfo();
                    showResult();
                }
               
            }
        })
    })
}

const initCellsEvent = () => {
    cells.forEach((e, index) => {
        e.addEventListener('click', () => {
            if (!e.classList.contains('filled')) {
                cells.forEach(e => e.classList.remove('selected'));

                selected_cell = index;
                e.classList.remove('err');
                e.classList.add('selected');
                resetBg();
                hoverBg(index);
            }
        })
    })
}

const startGame = () => {
    
        // ...
        timer = setInterval(() => {
            if (!pause) {
                seconds = seconds + 1;
                game_time.innerHTML = showTime(seconds);
            }
        }, 1000);
    
        // Add this line to start a new AJAX request
        window.onbeforeunload = function () {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "insert.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.send("player_name=" + encodeURIComponent(player_name.innerHTML) + "&time_taken=" + encodeURIComponent(seconds));
        };
    }



    



/*



*/

document.querySelector('#dark-mode-toggle').addEventListener('click', () => {
    document.body.classList.toggle('dark');
    const isDarkMode = document.body.classList.contains('dark');
    localStorage.setItem('darkmode', isDarkMode);
    
    document.querySelector('meta[name="theme-color"').setAttribute('content', isDarkMode ? '#1a1a2e' : '#fff');
});
document.getElementById('btn-how').addEventListener('click', function() {
    
    window.open('howtoplay.php', '_blank');
  });
const start_screen = document.querySelector('#start-screen');
const game_screen = document.querySelector('#game-screen');
const pause_screen = document.querySelector('#pause-screen');
const result_screen = document.querySelector('#result-screen');

const cells = document.querySelectorAll('.main-grid-cell');

const name_input = document.querySelector('#input-name');

const number_inputs = document.querySelectorAll('.number');

const player_name = document.querySelector('#player-name');
const game_level = document.querySelector('#game-level');
const game_time = document.querySelector('#game-time');

const result_time = document.querySelector('#result-time');

let level_index = 0;
let level = CONSTANT.LEVEL[level_index];

let timer = null;
let pause = false;
let seconds = 0;

let su = undefined;
let su_answer = undefined;

let selected_cell = -1;



const getGameInfo = () => JSON.parse(localStorage.getItem('game'));


const initGameGrid = () => {
    let index = 0;

    for (let i = 0; i < Math.pow(CONSTANT.GRID_SIZE,2); i++) {
        let row = Math.floor(i/CONSTANT.GRID_SIZE);
        let col = i % CONSTANT.GRID_SIZE;
        if (row === 2 || row === 5) cells[index].style.marginBottom = '10px';
        if (col === 2 || col === 5) cells[index].style.marginRight = '10px';

        index++;
    }
}


const setPlayerName = (name) => localStorage.setItem('player_name', name);
const getPlayerName = () => localStorage.getItem('player_name');

const showTime = (seconds) => new Date(seconds * 1000).toISOString().substr(11, 8);

const clearSudoku = () => {
    for (let i = 0; i < Math.pow(CONSTANT.GRID_SIZE, 2); i++) {
        cells[i].innerHTML = '';
        cells[i].classList.remove('filled');
        cells[i].classList.remove('selected');
    }
}

const initSudoku = () => {
   
    clearSudoku();
    resetBg();
   
    su = sudokuGen(level);
    su_answer = [...su.question];

    seconds = 0;

    saveGameInfo();

    
    for (let i = 0; i < Math.pow(CONSTANT.GRID_SIZE, 2); i++) {
        let row = Math.floor(i / CONSTANT.GRID_SIZE);
        let col = i % CONSTANT.GRID_SIZE;
        
        cells[i].setAttribute('data-value', su.question[row][col]);

        if (su.question[row][col] !== 0) {
            cells[i].classList.add('filled');
            cells[i].innerHTML = su.question[row][col];
        }
    }
}

const loadSudoku = () => {
    let game = getGameInfo();

    game_level.innerHTML = CONSTANT.LEVEL_NAME[game.level];

    su = game.su;

    su_answer = su.answer;

    seconds = game.seconds;
    game_time.innerHTML = showTime(seconds);

    level_index = game.level;

  
    for (let i = 0; i < Math.pow(CONSTANT.GRID_SIZE, 2); i++) {
        let row = Math.floor(i / CONSTANT.GRID_SIZE);
        let col = i % CONSTANT.GRID_SIZE;
        
        cells[i].setAttribute('data-value', su_answer[row][col]);
        cells[i].innerHTML = su_answer[row][col] !== 0 ? su_answer[row][col] : '';
        if (su.question[row][col] !== 0) {
            cells[i].classList.add('filled');
        }
    }
}

const hoverBg = (index) => {
    let row = Math.floor(index / CONSTANT.GRID_SIZE);
    let col = index % CONSTANT.GRID_SIZE;

    let box_start_row = row - row % 3;
    let box_start_col = col - col % 3;

    for (let i = 0; i < CONSTANT.BOX_SIZE; i++) {
        for (let j = 0; j < CONSTANT.BOX_SIZE; j++) {
            let cell = cells[9 * (box_start_row + i) + (box_start_col + j)];
            cell.classList.add('hover');
        }
    }

    let step = 9;
    while (index - step >= 0) {
        cells[index - step].classList.add('hover');
        step += 9;
    }

    step = 9;
    while (index + step < 81) {
        cells[index + step].classList.add('hover');
        step += 9;
    }

    step = 1;
    while (index - step >= 9*row) {
        cells[index - step].classList.add('hover');
        step += 1;
    }

    step = 1;
     while (index + step < 9*row + 9) {
        cells[index + step].classList.add('hover');
        step += 1;
    }
}

const resetBg = () => {
    cells.forEach(e => e.classList.remove('hover'));
}

const checkErr = (value) => {
    const addErr = (cell) => {
        if (parseInt(cell.getAttribute('data-value')) === value) {
            cell.classList.add('err');
            cell.classList.add('cell-err');
            setTimeout(() => {
                cell.classList.remove('cell-err');
            }, 500);
        }
    }

    let index = selected_cell;

    let row = Math.floor(index / CONSTANT.GRID_SIZE);
    let col = index % CONSTANT.GRID_SIZE;

    let box_start_row = row - row % 3;
    let box_start_col = col - col % 3;

    for (let i = 0; i < CONSTANT.BOX_SIZE; i++) {
        for (let j = 0; j < CONSTANT.BOX_SIZE; j++) {
            let cell = cells[9 * (box_start_row + i) + (box_start_col + j)];
            if (!cell.classList.contains('selected')) addErr(cell);
        }
    }

    let step = 9;
    while (index - step >= 0) {
        addErr(cells[index - step]);
        step += 9;
    }

    step = 9;
    while (index + step < 81) {
        addErr(cells[index + step]);
        step += 9;
    }

    step = 1;
    while (index - step >= 9*row) {
        addErr(cells[index - step]);
        step += 1;
    }

    step = 1;
    while (index + step < 9*row + 9) {
        addErr(cells[index + step]);
        step += 1;
    }
}

const removeErr = () => cells.forEach(e => e.classList.remove('err'));

const saveGameInfo = () => {
    let game = {
        level: level_index,
        seconds: seconds,
        su: {
            original: su.original,
            question: su.question,
            answer: su_answer
        }
    }
    localStorage.setItem('game', JSON.stringify(game));
}

const removeGameInfo = () => {
    localStorage.removeItem('game');
    document.querySelector('#btn-continue').style.display = 'none';
}

const isGameWin = () => sudokuCheck(su_answer);

const showResult = () => {
    clearInterval(timer);
    result_screen.classList.add('active');
    result_time.innerHTML = showTime(seconds);
}

const initNumberInputEvent = () => {
    number_inputs.forEach((e, index) => {
        e.addEventListener('click', () => {
            if (!cells[selected_cell].classList.contains('filled')) {
                cells[selected_cell].innerHTML = index + 1;
                cells[selected_cell].setAttribute('data-value', index + 1);
             
                let row = Math.floor(selected_cell / CONSTANT.GRID_SIZE);
                let col = selected_cell % CONSTANT.GRID_SIZE;
                su_answer[row][col] = index + 1;
                
                saveGameInfo()
               
                removeErr();
                checkErr(index + 1);
                cells[selected_cell].classList.add('zoom-in');
                setTimeout(() => {
                    cells[selected_cell].classList.remove('zoom-in');
                }, 500);

                
                if (isGameWin()) {
                    removeGameInfo();
                    showResult();
                }
               
            }
        })
    })
}

const initCellsEvent = () => {
    cells.forEach((e, index) => {
        e.addEventListener('click', () => {
            if (!e.classList.contains('filled')) {
                cells.forEach(e => e.classList.remove('selected'));

                selected_cell = index;
                e.classList.remove('err');
                e.classList.add('selected');
                resetBg();
                hoverBg(index);
            }
        })
    })
}

const startGame = () => {
    start_screen.classList.remove('active');
    game_screen.classList.add('active');

    player_name.innerHTML = name_input.value.trim();
    setPlayerName(name_input.value.trim());

    game_level.innerHTML = CONSTANT.LEVEL_NAME[level_index];

    showTime(seconds);

    timer = setInterval(() => {
        if (!pause) {
            seconds = seconds + 1;
            game_time.innerHTML = showTime(seconds);
        }
    }, 1000);
}


const returnStartScreen = () => {
    clearInterval(timer);
    pause = false;
    seconds = 0;
    start_screen.classList.add('active');
    game_screen.classList.remove('active');
    pause_screen.classList.remove('active');
    result_screen.classList.remove('active');
}
document.querySelector('#btn-level').addEventListener('click', (e) => {
    level_index = level_index + 1 > CONSTANT.LEVEL.length - 1 ? 0 : level_index + 1;
    level = CONSTANT.LEVEL[level_index];
    e.target.innerHTML = CONSTANT.LEVEL_NAME[level_index];
});

document.querySelector('#btn-play').addEventListener('click', () => {
    if (name_input.value.trim().length > 0) {
        initSudoku();
        startGame();
    } else {
        name_input.classList.add('input-err');
        setTimeout(() => {
            name_input.classList.remove('input-err');
            name_input.focus();
        }, 500);
    }
});

document.querySelector('#btn-continue').addEventListener('click', () => {
    if (name_input.value.trim().length > 0) {
        loadSudoku();
        startGame();
    } else {
        name_input.classList.add('input-err');
        setTimeout(() => {
            name_input.classList.remove('input-err');
            name_input.focus();
        }, 500);
    }
});

document.querySelector('#btn-pause').addEventListener('click', () => {
    pause_screen.classList.add('active');
    pause = true;
});

document.querySelector('#btn-resume').addEventListener('click', () => {
    pause_screen.classList.remove('active');
    pause = false;
});

document.querySelector('#btn-new-game').addEventListener('click', () => {
    returnStartScreen();
});

document.querySelector('#btn-new-game-2').addEventListener('click', () => {
    console.log('object')
    returnStartScreen();
});

document.querySelector('#btn-delete').addEventListener('click', () => {
    cells[selected_cell].innerHTML = '';
    cells[selected_cell].setAttribute('data-value', 0);

    let row = Math.floor(selected_cell / CONSTANT.GRID_SIZE);
    let col = selected_cell % CONSTANT.GRID_SIZE;

    su_answer[row][col] = 0;

    removeErr();
})
const init = () => {
    const darkmode = JSON.parse(localStorage.getItem('darkmode'));
    document.body.classList.add(darkmode ? 'dark' : 'light');
    document.querySelector('meta[name="theme-color"').setAttribute('content', darkmode ? '#1a1a2e' : '#fff');

    const game = getGameInfo();

    document.querySelector('#btn-continue').style.display = game ? 'grid' : 'none';

    initGameGrid();
    initCellsEvent();
    initNumberInputEvent();

    if (getPlayerName()) {
        name_input.value = getPlayerName();
    } else {
        name_input.focus();
    }
}

init();</script>
    

</html>
