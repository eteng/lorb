<?php
/** this class contains the all related mysql function and task
 *  requires the default login configurations
 *  Description of Mysql
 *  this class Requires the config.php file that holds constants
 * @author "Eteng omini"
 */

class Mysql {
    private $username;private $password; private $database;
    private $server; private $connectionx; private $QUERY;
public function  __construct() {  
   
    $this->username = DB_USER; $this->password =DB_PASS;
    $this->database = DB_NAME; $this->server =DB_SVR;
    $this->getContrix();
 }
private function getContrix(){
    $dns  =  @mysql_connect($this->server,$this->username, $this->password) or die("Could not connect to database".mysql_error());
    $this->connectionx = $dns;
    $this->select();
}
private function select(){
    @mysql_select_db($this->database, $this->connectionx) or die("I can't select database".mysql_error());
  }
public function result($query){
   $this->QUERY = @ mysql_query($query) or die("can not run query".mysql_error());
   return $this->QUERY;
}
public function isExecuted(){
    if(mysql_affected_rows($this->connectionx) == 1)
        return true;
    else return false;
}
public function toArray(){
    $rows = array();
     while($row = mysql_fetch_array($this->QUERY)){
            array_push(&$rows, $row);
     }
    mysql_free_result($row); 
    return $rows;  
}
public function freeResource(){
    if(is_resource($this->QUERY))
       mysql_free_result($this->QUERY);
}
public function getRow(){
    $row  = mysql_fetch_array($this->QUERY);return $row;
}
public function error(){
    return mysql_error($this->connectionx);
}
public function close(){
   @mysql_close($this->connectionx) or die("cant close connection".mysql_error());
}
public function getInsertID(){
    return mysql_insert_id($this->connectionx);
}
public function  __destruct() {
    $this->close(); //close connections
}
public static function mysqlClean($value){
    $new_enough  = function_exists("msql_real_escape_string");
    if($new_enough){ //undo magic quotes
       if(get_magic_quotes_gpc()){$value = stripslashes($value);}
       $value = mysql_real_escape_string($value);
    }else{
       if(!get_magic_quotes_gpc()){$value = addslashes($value); }
    }
    return $value;
}
}
?>
