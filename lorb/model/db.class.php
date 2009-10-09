<?php

class db{

/*** Declare instance ***/
private static  $instance = NULL;
//private variable
/**
* the constructor is set to private so
* so nobody can create a new instance using new
*/
private function __construct($params) {
  /*** maybe set the db name here later ***/
}
/**
* Return DB instance or create intitial connection
* @return object (PDO)
* @access public
*/
public static function getDB($param = null){
    if(!is_null($param)){
       self::$instance=null;
    }    
    if (!self::$instance)
    {      
        echo self::getConnString($param);
         
        $password = array_key_exists('password',$param) ? $param['password'] : "";
        $username = array_key_exists('username',$param) ? $param['username'] : ""; 
             
        self::$instance = new PDO(self::getConnString($param),$username,$password);
        self::$instance-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    return self::$instance;
}
public static function getConnString($params){
  
    $connString =null;
    if(strcasecmp($params['type'],'mysql')==0){    
        $connString = "mysql:host={$params['host']}";
        if(isset($params['dbname']))
         $connString .= ";dbname={$params['dbname']}";
        if(isset($params['port']))
         $connString .=";port={$params['port']}";                    
    }
    return $connString;
}
/**make __clone private so nobody can clone the instance */
private function __clone(){}
}

?>
