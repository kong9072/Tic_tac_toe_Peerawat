<?php

?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<style>
  .cell{
    width: 75px;
    height: 75px;
    border: 2px solid;
    box-shadow: 0 0 0 2px;
    line-height: 75px;
    font-size: 50px;
    cursor: pointer;
    background-color:   #a9d2d2;
}
.cell2{
    width: 75px;
    height: 75px;
    border: 2px solid;
    box-shadow: 0 0 0 2px;
    line-height: 75px;
    font-size: 50px;
    cursor: pointer;
    
}
.hovers{
      box-shadow: 0 6px 10px rgba(0,0,0,.08), 0 0 6px rgba(0,0,0,.05);
        transition: .3s transform cubic-bezier(.155,1.105,.295,1.12),.3s box-shadow,.3s -webkit-transform cubic-bezier(.155,1.105,.295,1.12);
    cursor: pointer;
  }
  .popup{
    background: #f7f7ff;
    border-radius: 4px;
    box-shadow: 0 6px 10px rgba(0,0,0,.08), 0 0 6px rgba(0,0,0,.05);
    transition: .3s transform cubic-bezier(.155,1.105,.295,1.12),.3s box-shadow,.3s -webkit-transform cubic-bezier(.155,1.105,.295,1.12);
    }
#gameContainer{
    font-family: "Permanent Marker", cursive;
    text-align: center;
    background-color: #e4d3d3;
}
#cellContainer{
    display: grid;
    width: 225px;
     margin: auto;
}
</style>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body  style = " background-color: #e4d3d3;">
    <div id="gameContainer">
        <h1 style = "background: #9191f1;">Tic Tac Toe</h1>
      
        <div class ="row">
        <div class = "col-lg-4"></div>
<div class = "col-lg-4">
        
        <?php
        Board::boardsize($url[2]);
      echo'  <input class ="text-center" type="number" id="game_id" value="'.$url[2].'" hidden>'
?>
</div>
</div>
 </div>
        <button id="PlayBtn"  class = "button mt-3"data-bs-toggle="modal" data-bs-target="#exampleModal1" hidden>Start</button>
       <h2 id="statusText" ></h2>
    <button id="restartBtn">Reset</button>
    <button id="PREV">PREV</button> 
    <button id="return">Return</button>
    <button id="NEXT">NEXT</button>
    
    </div>
    <!-- Button trigger modal -->
   
    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header col-12 ">
      <div class="col-5">
      </div>
        <h5 class="modal-title " id="exampleModalLabel">Board Size</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="col-12 text-center">
      <input class ="text-center" type="number" id="BoardSize" value="">
      </div>
      </div>
    
      <div class="row">
      <div class="col-4">
      </div>
  
      <div class="col-4 text-center">
        <button type="button" id ="createboard" class="btn btn-primary">Start</button>
        </div>
    </div>
      
     
    </div>
  </div>
</div>
</body>
</html>
<script>
   //var root = location.protocol + '//' + location.host +'/Tic_tac_toe_Peerawat';
    $('#PlayBtn').click( function(){
      
        console.log('aaaaa');
    });
  //  PlayBtn.addEventListener("click", check);
  //  function check(){
  //   console.log('sss');
  //  }
   $('#createboard').click( function(){
    var BoardSize = $("#BoardSize").val();
    window.location.replace(root + '/play/'+BoardSize); 
      console.log('sss');
  });
  $('#return').click( function(){
    var BoardSize = $("#BoardSize").val();
    window.location.replace(root); 
      console.log('sss');
  });
  
  const cells = document.querySelectorAll(".cell");
const statusText = document.querySelector("#statusText");
const restartBtn = document.querySelector("#restartBtn");
var root = location.protocol + '//' + location.host +'/Tic_tac_toe_Peerawat'; // offline
const winConditions = [
    [0, 1, 2],
    [3, 4, 5],
    [6, 7, 8],
    [0, 3, 6],
    [1, 4, 7],
    [2, 5, 8],
    [0, 4, 8],
    [2, 4, 6]
];
var Size = $("#Size").val();
var game_type = $("#game_type").val();
let turn = 0;
let options = [];  
let AIoptions = [];  
for (let i = 0; i < Size; i++) {
  let options2 = [];  
    for (let j = 0; j < Size; j++) {
    options2.push("");
}
options.push(options2);
}
if(game_type==1){
  for (let i = 0; i < Size*Size; i++) {
    AIoptions.push(i);
  }
}

console.log(options);
let currentPlayer = "X";
let running = false;


initializeGame();
PlayBtn.addEventListener("click", gameStart);
function gameStart(){

}
function initializeGame(){
 
  if(game_type != 2){
    cells.forEach(cell => cell.addEventListener("click", cellClicked)); 
   
    document.getElementById('NEXT').style.display = 'none';
    document.getElementById('PREV').style.display = 'none';
  }else{
    document.getElementById('restartBtn').style.display = 'none';
  }

    restartBtn.addEventListener("click", restartGame);
    statusText.textContent = `${currentPlayer}'s turn`;
    running = true;
}
function arrayRemove(arr, value) { 
    
    return arr.filter(function(ele){ 
        return ele != value; 
    });
}


function cellClicked(){
    const cellIndex = this.getAttribute("cellIndex");
    let col = cellIndex % Size
    let row = (cellIndex - col) / Size
    if(game_type==1){AIoptions = arrayRemove(AIoptions, cellIndex);}
    console.log(AIoptions)
    if(options[row][col] != "" || !running){
        return;
    }
  console.log(row,col);
    updateCell(this, col,row,cellIndex);
    checkWinner(col,row);
    if(game_type==1&&running){
    var AIcellIndex = AIoptions[Math.floor(Math.random()*(AIoptions.length-1))]
    let colai = AIcellIndex % Size
    let rowai = (AIcellIndex - colai) / Size
    console.log(AIcellIndex);
    AIoptions = arrayRemove(AIoptions, AIcellIndex);
    options[rowai][colai] = currentPlayer;
    cellmark = document.querySelector("#cellindex"+AIcellIndex);
    cellmark.textContent = currentPlayer;
    var game_id = $("#game_id").val();
  var action = "move";
  turn++;
   $.ajax({
        url: root+'/lib/UpdateBoard.php',
        type: 'POST',
        data: {
            action:action,
            turn:turn,
            game_id:game_id,
            move:AIcellIndex,
        },
        async: false,
        cache: false,
        success: function (data) {
            console.log(data);  
        }
    });
    checkWinner(colai,rowai);
    }
}
function updateCell(cell,  col,row,cellIndex){
  options[row][col] = currentPlayer;
  cell.textContent = currentPlayer;
  var game_id = $("#game_id").val();
  var action = "move";
  turn++;
   $.ajax({
        url: root+'/lib/UpdateBoard.php',
        type: 'POST',
        data: {
            action:action,
            turn:turn,
            game_id:game_id,
            move:cellIndex,
        },
        async: false,
        cache: false,
        success: function (data) {
            console.log(data);  
        }
    });
  
  
}
function changePlayer(){
    currentPlayer = (currentPlayer == "X") ? "O" : "X";
    statusText.textContent = `${currentPlayer}'s turn`;
}
function checkWinner(col,row){
    let roundWon = false;
     //check row
     let count = 0;
    for(let i = 0; i < Size; i++){
            if(options[row][i] != currentPlayer){
             
              break;
            }else{
              count++
            }
            if(count == Size){
               roundWon = true;
            }          
        }
      count = 0;
        for(let i = 0; i < Size; i++){
            if(options[i][col] != currentPlayer){
              break;
            }else{
              count++
            }
            if(count == Size){
               roundWon = true;
            }          
        }
        count = 0;
        for(let i = 0; i < Size; i++){
            if(options[i][i] != currentPlayer){
              break;
            }else{
              count++
            }
            if(count == Size){
               roundWon = true;
            }          
        }
        count = 0;
        for(let i = 0; i < Size; i++){
          winSize = (Size-1)-i;
            if(options[i][winSize] != currentPlayer){
              break;
            }else{
              count++
            }
            if(count == Size){
               roundWon = true;
            }          
        }
    //for(let i = 0; i < winConditions.length; i++){
        // const condition = winConditions[i];
        // const cellA = options[condition[0]];
        // const cellB = options[condition[1]];
        // const cellC = options[condition[2]];

        // if(cellA == "" || cellB == "" || cellC == ""){
        //     continue;
        // }
        // if(cellA == cellB && cellB == cellC){
        //     roundWon = true;
        //     break;
        // }
    //}

    if(roundWon){
      var action = "gamewon";
      var game_win = currentPlayer;
       var game_id = $("#game_id").val();
      $.ajax({
        url: root+'/lib/UpdateBoard.php',
        type: 'POST',
        data: {
            action:action,
            game_id:game_id,
            game_win:game_win,
        },
        async: false,
        cache: false,
        success: function (data) {
  
        }
    });
        statusText.textContent = `${currentPlayer} wins!`;
        running = false;
        Swal.fire({
  title: `${currentPlayer} wins!`,
  width: 600,
  padding: '3em',
  color: '#716add',
  background: '#fff ',
  backdrop: ` rgba(0,0,123,0.4) `,
  showConfirmButton: false,
  timer: 1200
})
currentPlayer = (currentPlayer == "X") ? "O" : "X";
    }
    else if(turn==(Size*Size)){
        statusText.textContent = `Draw!`;
        running = false;
    }
    else{
        changePlayer();
   }
}
function restartGame(){
//     currentPlayer = "X";
//     turn = 0;
   
// for (let i = 0; i < Size; i++) {
//   for (let j = 0; j < Size; j++) {
//     options[i][j]="";
// }
// }
//     statusText.textContent = `${currentPlayer}'s turn`;
//     cells.forEach(cell => cell.textContent = "");
//     running = true;
    var action = "createboard";
    var game_type = $("#game_type").val();
    $.ajax({
        url: root+'/lib/UpdateBoard.php',
        type: 'POST',
        data: {
            action:action,
            BoardSize:Size,
            game_type:game_type,
        },
        async: false,
        cache: false,
        success: function (data) {
            console.log(data);
            window.location.replace(root + '/play/'+data); 
        }
    });
    
      console.log('sss');

}
$('#NEXT').click( function(){
  var game_id = $("#game_id").val();
  var action = "getmove";
  turn++;
   $.ajax({
        url: root+'/lib/UpdateBoard.php',
        type: 'POST',
        data: {
            action:action,
            turn:turn,
            game_id:game_id,
        },
        async: false,
        cache: false,
        success: function (data) {
            console.log(data);  
        let col2 = data % Size
         let row2 = (data - col2) / Size
         options[row2][col2] = currentPlayer;
         cellmark = document.querySelector("#cellindex"+data);
         cellmark.textContent = currentPlayer;
         checkWinner(col2,row2);
         
        }
    });
  });
  $('#PREV').click( function(){
  var game_id = $("#game_id").val();
  var action = "getmove";
  
   $.ajax({
        url: root+'/lib/UpdateBoard.php',
        type: 'POST',
        data: {
            action:action,
            turn:turn,
            game_id:game_id,
        },
        async: false,
        cache: false,
        success: function (data) {
            console.log(data);  
        let col2 = data % Size
         let row2 = (data - col2) / Size
         options[row2][col2] = '';
         cellmark = document.querySelector("#cellindex"+data);
         cellmark.textContent = '';
         changePlayer()
         turn--;
        }
    });
  });
</script>