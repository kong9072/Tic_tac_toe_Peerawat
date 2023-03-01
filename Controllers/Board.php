<?php
session_start();
include('Models/ModelsBoard.php');

class Board extends Controller {
    
    public function boardsize($game_id){
        $object = new ModelsBoard;
        echo $object->boardsize($game_id);
    }public function gamehistory(){
        $object = new ModelsBoard;
        echo $object->gamehistory();
    }
   

}
?>