<?php

class ModelsBoard extends Database
{
    public function createboard()
    { 
        $size= $_POST['BoardSize'];
        $game_type= $_POST['game_type'];
        $query = $this->connect()->prepare("INSERT INTO game SET game_size = :game_size ,game_type = :game_type ");
        $query->execute(array(
            ':game_size'=>$size,
            ':game_type'=>$game_type,
            
        ));
        $query2 = $this->connect()->prepare("SELECT *  from game order by game_id DESC limit 1");
        $query2->execute();
        $data=$query2->fetch();
        echo $data['game_id'];
    }
    public function gamewon()
    { 
        $game_win= $_POST['game_win'];
        $game_id= $_POST['game_id'];
        $query = $this->connect()->prepare("UPDATE  game SET game_type=2 , game_win=:game_win where game_id = :game_id");
        $query->execute(array(
            ':game_id'=>$game_id,
            ':game_win'=>$game_win,
        ));
    }
    public function move()
    { 
        $game_id= $_POST['game_id'];
        $turn= $_POST['turn'];
        $moves= $_POST['move'];
        $query = $this->connect()->prepare("INSERT INTO turn SET game_id = :game_id , turn = :turn, moves = :moves ");
        $query->execute(array(
            ':game_id'=>$game_id,
            ':turn'=>$turn,
            ':moves'=>$moves,
        ));
       
    }
    public function gamehistory()
    { 
       
        $query = $this->connect()->prepare("SELECT *  from game where game_win !='' order by game_id DESC ");
        $query->execute(array(
            ':game_id'=>$game_id,
        ));
       while($data=$query->fetch()){
echo'<a href="'.SITEROOT.'play/'.$data['game_id'].'" class="error"><div class="alert alert-light popup hovers"  role="alert" >
<h6 class="name text-danger" id="">GameNo.'.$data['game_id'].'</h6>';
if($data['game_win']==''){
echo'
<h6 class="name text-danger" id="st_name">Game cancle</h6>';
}else if($data['game_win']=='D'){
    echo'
<h6 class="name text-danger" id="st_name">Game Draw</h6>';

}else{
    echo'
<h6 class="name text-danger" id="st_name">'.$data['game_win'].' WIN</h6>';
}
echo'
</div></a>';

       }
    }
    public function boardsize($game_id)
    { 
        $size= $_POST['BoardSize'];
        $query = $this->connect()->prepare("SELECT *  from game where game_id = :game_id");
        $query->execute(array(
            ':game_id'=>$game_id,
        ));
        $data=$query->fetch();
        echo'<input class ="text-center" type="number" id="Size" value="'.$data['game_size'].'" hidden>
        <input class ="text-center" type="number" id="game_type" value="'.$data['game_type'].'" hidden>';
         $row = $data['game_size'];
        if($row==""){
          $row = 3;
        }
      echo'  <div id="cellContainer"style="grid-template-columns: repeat('.$row.', auto);">';
         $i=0;
         $rowmax= $row*$row;
         echo'<input class ="text-center" type="number" id="Size" value="'.$row.'" hidden>';
         while($i<$rowmax){
             echo '<div cellIndex="'.$i.'" id="cellindex'.$i.'" class="cell popup hover"></div>';
             $i++;
         }
    }
    public function getmove()
    { 
        $turn= $_POST['turn'];
        $game_id= $_POST['game_id'];
        $query = $this->connect()->prepare("SELECT *  from turn where game_id = :game_id and turn = :turn");
        $query->execute(array(
            ':game_id'=>$game_id,
            ':turn'=>$turn,
        ));
        $data=$query->fetch();
       echo $data['moves'];
         
    }
}