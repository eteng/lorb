<?php
/**
 * the abstract component class to which other component
 * extend to.
 * @author Eteng Omini <e-t-e-n-g@hotmail.com> 
 */
abstract class Comp{

    private $reg;
    //Error occurrable
    const ROUT_MISSING = 1;
    
    final function  __construct(&$reg) {
        $this->reg = $reg;
    }
    abstract function init();//function that does the initialisation
    abstract function index();// the default index 
    final protected function dispatch(){       
    }
    final function pushRoute(){
        $act1 = $this->reg->front->getAct();
        if(method_exists($this,$act1)){
           call_user_func(array($this,$act1));
        }else
           echo "<h3>Routine Missing</h3>";
    }
    function hasErrors(){

    }
    function getError(){

    }
    private function registerError(){

    }
}
?>
