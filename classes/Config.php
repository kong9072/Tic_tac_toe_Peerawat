<?php
$ipgetenv = getenv('HTTP_CLIENT_IP')?:
getenv('HTTP_X_FORWARDED_FOR')?:
getenv('HTTP_X_FORWARDED')?:
getenv('HTTP_FORWARDED_FOR')?:
getenv('HTTP_FORWARDED')?:
getenv('REMOTE_ADDR');

//$protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,strpos( $_SERVER["SERVER_PROTOCOL"],'/'))).'://';
if (isset($_SERVER['HTTPS']) &&
    ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) ||
    isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
    $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
  $protocol = 'https://';
}
else {
  $protocol = 'http://';
}

if($ipgetenv=='::1'){
    @define(DOCUMENTROOT , $_SERVER['DOCUMENT_ROOT'] . "/Tic_tac_toe_Peerawat/views/");
    @define(SITEROOT , $protocol . $_SERVER['HTTP_HOST'] . "/Tic_tac_toe_Peerawat"."/");
}else{
    @define(DOCUMENTROOT , $_SERVER['DOCUMENT_ROOT'] . "/views/");
    @define(SITEROOT,$protocol . $_SERVER['HTTP_HOST'] . "/");
}
@define(URLHOST,$protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);

   
?>