<?php 
require_once('../classes/Database.php');
require_once('../classes/Config.php');
require_once('../classes/function.php');
require_once('../Models/ModelsBoard.php');
$actvie = new ModelsBoard;
$action = $_POST['action'];
$size = $_POST['BoardSize'];
switch ($action) {
    case 'createboard':
     echo $actvie->createboard();
    break; 
    case 'move':
        echo $actvie->move();
       break; 
       case 'getmove':
        echo $actvie->getmove();
       break; 
       case 'gamewon':
        echo $actvie->gamewon();
       break; 

       
}
?>