<?php

class Controller extends Database{

    public static function CreateView($viewName){

        $request = trim($_SERVER['REQUEST_URI'],'/');
        if(!empty($request)){
            
            $ipgetenv = getenv('HTTP_CLIENT_IP')?:
            getenv('HTTP_X_FORWARDED_FOR')?:
            getenv('HTTP_X_FORWARDED')?:
            getenv('HTTP_FORWARDED_FOR')?:
            getenv('HTTP_FORWARDED')?:
            getenv('REMOTE_ADDR');
            
            if($ipgetenv=='::1'){
                $url = explode('/',$request);
            }else{

                $url_check = explode('/',$request);
                $url=array();
                foreach ( $url_check as $key => $val )
                $url[ $key+1 ] = $val;
            }
       
        }
        
        require_once("./Views/$viewName.php");
    }
}
?>


