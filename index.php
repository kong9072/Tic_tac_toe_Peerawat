<?php
// ini_set('session.cookie_domain', '.bry-group.com');
ob_start();
session_start();

////////////config uri/////////////
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
require_once('classes/Config.php');
require_once('classes/function.php');
require_once('classes/ConfigProject.php');

    require_once('Controllers/NavHeader.php');    
    ////////////Routes////////////  
    
        //require_once(DOCUMENTROOT. "header.php");
        require_once('Routes.php');
       // require_once(DOCUMENTROOT. "footer.php");    
       
        //require_once('login.php');
   
    ////////////Routes////////////  


function __autoload($class_name){
    
    if(file_exists('./classes/'.$class_name.'.php')){

        require_once('./classes/'.$class_name.'.php');

    }elseif (file_exists('./Controllers/'.$class_name.'.php')){

        require_once('./Controllers/'.$class_name.'.php');
        
    }
}


?>