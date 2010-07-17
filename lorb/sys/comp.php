<?php
pitch('Dodeye.core.Response');
pitch('Dodeye.core.Request');
pitch('Dodeye.util.basic');
/** the abstract component class to which other component
 * extend to.
 * @author Eteng Omini <e-t-e-n-g@hotmail.com> 
 */
abstract class Comp{

    protected $reg;
    private $nav_com;
    private $nav_name;
    protected $response;
    protected $request;
    private $urlStrng;
    private $my;
    private $next = "";
    private $error = array(
    );
    //Error occurrable
    const ROUT_MISSING = 1;
    //constructor
    final function  __construct(&$reg) {
        $this->reg = $reg;
        $this->response = new Response();
        $this->request = new Request();
    }
    function pre_init(){
        $pax = "/^{$this->reg->front->getController()}\/(?P<cid>[a-zA-Z0-9_]*)\/(?P<lid>[a-zA-Z0-9_\/]*)/";
       
        preg_match($pax, $this->reg->front->getRequestUrl(),$myx);
        //print_r($myx);
        //@Todo:validations when empty
        if(!isBarren($myx)){
          $this->my =  $myx['cid'];
          $this->next = $myx['lid'];
        } 
       
    }
    abstract function init();//function that does the initialisation
    abstract function index();// the default index 
    final protected function dispatch(){       
    }
    /** this function checks if there was an error within that has being register to
     * this component
     * @return boolean true if there are errors otherwise false
     */
    final public function hasErrors(){
        $k = true;
        if(isBarren($this->error)){
            $k = false;
        }
        return $k;
    }
    final function getError(){
        return $this->error;
    }
    final function registerError($error){
        array_push($this->error, $error);
    }
    final public function pushRoute(){
        $act1 = $this->reg->front->getAct();
        $dix = $this->reg->maps->getPathById($this->getNavName(),$act1);
        //@todo: Add validations here
        if(isBarren($dix)){
            if(method_exists($this,$act1)){
                call_user_func(array($this,$act1));
            }else
                print "<h3>Routine Missing</h3>";
        }else{
            $m_x = ArrayHelpers::XMLElemToArray($dix[0]);
            if(isset ($m_x['method'])){
                if(method_exists($this,$m_x['method'] ))
                   call_user_func(array($this,$m_x['method']));
                else{
                   print "<h3>Routine Method Missing</h3>";
                }
            }else
                   print "<h3>Routine Missing in Class</h3>";
        }  
    }
    final public function _getName(){
        return get_class($this);
    }
    final public function getLastPath(){
          return $this->next;
    }
    function setNavName($name){
        $this->nav_name = $name;
    }
    public function getNavName(){
        return $this->nav_name;
    }
    public function getUrlParam(){

    }

}
?>
