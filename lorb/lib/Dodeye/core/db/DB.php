<?php
require_once 'AbstractDB.php';

/**Data access point class for the system
 * @author Eteng Omini <e-t-e-n-g@hotmail.com> 
 */
class DB extends AbstractDB{

/*** Declare instance ***/
private static  $instance = NULL;
/**
* the constructor is set to private so
* so nobody can create a new instance using new
*/
private function __construct($params) {
  /*** maybe set the db name here later ***/
}
/**make __clone private so nobody can clone the instance */
private function __clone(){}

/**
* Return DB instance or create intitial connection
* @return object (PDO)
* @access public
*/
public function getDB($param = null){
    if(!is_null($param)){
       self::$instance=null;
    }
    if (!self::$instance)
    {
        $password = array_key_exists('password',$param) ? $param['password'] : "";
        $username = array_key_exists('username',$param) ? $param['username'] : "";

        self::$instance = new PDO(self::getConnString($param),$username,$password);
        self::$instance-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    return self::$instance;
}


}
?>
