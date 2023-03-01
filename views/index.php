<?php
require_once(__DIR__."/header.php");
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body style = " background-color: #e4d3d3;">
    <div id="gameContainer">
        <h1 style = "background: #9191f1;">Tic Tac Toe</h1>
         
        <div id="cellContainer"style="grid-template-columns: repeat(3, auto);">
 <?php
         $i=0;
                while($i<9){
                    echo '<div cellIndex="'.$i.'" class="cell popup hover"></div>';
                    $i++;
                }
?>

           
        </div>
        <h2 id="statusText"></h2>
        <div claass = "row mt-3">
         <button id="PlayBtn" class = "button mt-3"style="width: 15%;" data-bs-toggle="modal" data-bs-target="#exampleModal1">Versus Player</button>
        </div>
         <div claass = "row">
        <button id="PlayBtn" class = "button mt-3"style="width: 15%;"data-bs-toggle="modal" data-bs-target="#exampleModal2">Versus AI</button>
        
        </div>
 
        <div claass = "row">
        <button id="gamereplay" class =" mt-3"style="width: 15%;">Game replay</button>
        </div>
    </div>
    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header col-12 " style="background: #9191f1;">
      <div class="col-5">
      </div>
        <h5 class="modal-title " id="exampleModalLabel">Board Size</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="col-12 text-center">
      <input class ="text-center" type="number" id="BoardSize" value="3" min = "3" placeholder="3">
      </div>
      </div>
    
      <div class="row">
      <div class="col-4">
      </div>
  
      <div class="col-4 text-center">
        <button type="button" id ="createboard" class="btn btn-primary mt -3">Start</button>
        </div>
    </div>
      
     
    </div>
  </div>
</div>
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header col-12 " style="background: #9191f1;">
      <div class="col-5">
      </div>
        <h5 class="modal-title " id="exampleModalLabel">Board Size</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="col-12 text-center">
      <input class ="text-center" type="number" id="BoardSize2" value="3" min = "3" placeholder="3">
      </div>
      </div>
    
      <div class="row">
      <div class="col-4">
      </div>
  
      <div class="col-4 text-center">
        <button type="button" id ="createAIboard" class="btn btn-primary mt -3">Start</button>
        </div>
    </div>
      
     
    </div>
  </div>
</div>
</body>
</html>
<script>
    var root = location.protocol + '//' + location.host +'/Tic_tac_toe_Peerawat'; // offline
    $('#createboard').click( function(){
    var BoardSize = $("#BoardSize").val();
    var action = "createboard";
    $.ajax({
        url: root+'/lib/UpdateBoard.php',
        type: 'POST',
        data: {
            action:action,
            BoardSize:BoardSize,
            game_type:0,
        },
        async: false,
        cache: false,
        success: function (data) {
            console.log(data);
            window.location.replace(root + '/play/'+data); 
        }
    });
    
      console.log('sss');
  });
  $('#createAIboard').click( function(){
    var BoardSize = $("#BoardSize2").val();
    var action = "createboard";
    $.ajax({
        url: root+'/lib/UpdateBoard.php',
        type: 'POST',
        data: {
            action:action,
            BoardSize:BoardSize,
            game_type:1,
        },
        async: false,
        cache: false,
        success: function (data) {
            console.log(data);
            window.location.replace(root + '/play/'+data); 
        }
    });
    
      console.log('sss');
  });
  $('#gamereplay').click( function(){
            window.location.replace(root + '/gamereplay'); 
  });
  
</script>
