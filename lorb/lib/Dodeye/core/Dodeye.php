<?php
require_once 'User.php';
require_once 'Login.php';
/**
 *this is the core of the system
 *@author Eteng omini <e-t-e-n-g@hotmail.com>
 */
class Dodeye {
    private $addon = array();
    private $reg;
    function  __construct($registry) {
      $this->reg  = $registry;
      $this->user = new User();
      $this->login = new Login();
    }
    function  __set($name,  $value){
        $this->addon[$name] = $value;
    }
    function  __get($name) {
        return $this->addon[$name];
    }
}
?>
