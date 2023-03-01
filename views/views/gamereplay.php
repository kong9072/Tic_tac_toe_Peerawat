

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
<body style = " background-color: #e4d3d3;">
    <div id="gameContainer">
        <h1 style = "background: #9191f1;">Game history</h1>
        <div class=" row">
        <div class=" col-2">

</div>
<div class=" col-8">
<?php
        Board::gamehistory();
     
?>
</div>
        </div>

        </div>

</body>