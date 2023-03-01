<?php
class Database{

    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $charset;

    public function connect(){
        $this-> servername = "localhost";
        $this-> username = "root";
        $this-> password = "";
        $this-> dbname = "tictactoe";
        $this-> charset = "utf8";

        // $this-> servername = "localhost";
        // $this-> username = "linkman_linkroot";
        // $this-> password = "Pd89ppoe";
        // $this-> dbname = "linkman_linkman";
        // $this-> charset = "utf8";
        try{
            $db = "mysql:host=".$this->servername.";dbname=".$this->dbname.";charset=".$this->charset;
            $pdo = new PDO($db,$this->username,$this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;

        }catch(\Exception $e){
            echo "Connection failed: ".$e->getMessage();
        }    
    }
}

error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_WARNING & ~E_STRICT & ~E_DEPRECATED);
ini_set('display_errors','Off');
?>