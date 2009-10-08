<?php

class db{

/*** Declare instance ***/
private static $instance = NULL;
//private variable
private $params;
private $connString;

/**
* the constructor is set to private so
* so nobody can create a new instance using new
*/
private function __construct() {
  /*** maybe set the db name here later ***/
    if($this->params->type == 'mysql'){
        $this->connString = 
              "msql:host=".$this->params->host.";"
              "dbname";
    }
}

/**
* Return DB instance or create intitial connection
* @return object (PDO)
* @access public
*/
public static function getDB($params){

if (!self::$instance)
    {
    self::$instance = new PDO("mysql:host=localhost;dbname=periodic_table", 'username', 'password');
    self::$instance-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
return self::$instance;
}
private function connect_mySQL($DBUser, $DBPass, $DBName = false, $DBHost = false, $DBPort = false)
{
    
    $DBNameEq = empty($DBName) ? '' : ";dbname=$DBName";

    if (empty($DBHost)) $DBHost = 'localhost';

    If ($DBHost[0] === '/')
    {
        $Connection = "unix_socket=$DBHost";
    }
    else
    {
        if (empty($DBPort)) $DBPort = 3306;
        $Connection = "host=$DBHost;port=$DBPort";
    }

    //======================

    try
    {
        $dbh     = new PDO("mysql:$Connection$DBNameEq"
                                  ,  $DBUser, $DBPass);
    }
    catch (PDOException $e)
    {
        return $e->getMessage();
    }

    return $dbh;
}
/**
* Like the constructor, we make __clone private
* so nobody can clone the instance
*/
private function __clone(){
}

} /*** end of class ***/

?>
