<?php
require_once 'sys/comp.php';
/* 
 * this is the administrator component...
 * @author Eteng
 */
class Administrator extends Comp{
    
  public function init(){
       //$user = $this->login->requireLogin();
  }
  public function index(){
       print("<h1>Administrator</h1>");
       $sand = "To the index..";
  }
}
?>
