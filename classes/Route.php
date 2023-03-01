<?php

class Route{
    
    public static $validRoutes = array();
    
    public static function set($route,$function){
        self::$validRoutes[] = $route;
        //print_r(self::$validRoutes);
        if($_REQUEST['url'] == $route){

            $function->__invoke();
            
        }
        else if($_REQUEST['url'] == ''){
            $function->__invoke();
        }
    }
}
?>