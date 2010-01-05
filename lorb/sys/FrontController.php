<?php
//pitching in basic file.
pitch("Lorb.util.basic");
pitch("lib.Lorb.util.ArrayHelpers");
/**
 * Description of FrontController
 * @author eteng omini
 * <e-t-e-n-g@hotmail.com
 */
class FrontController {

  protected $controller;
  
  protected $process;
  
  protected $url;
 /*
 * @the registry
 */
 private $reg;
   //@TODO: coupling to tight need to release;
  public function  __construct($registry) {
        $this->reg = $registry;
  }
  private function HaltRequest(){
    
    $request =  $this->parseRequest();
	if (empty($request))
	     $request = 'index';  //front
	else{
      /*** get the parts of the request ***/
      $parts = explode('/', $request);
      $this->controller = strtolower($parts[0]);
      if(isset( $parts[1]))
         $this->process = $parts[1];
	} 
	/*** Get trailers after controller ***/
	if(isBarren($this->process)){
	  $this->process = 'index';
	}
    $modul = $this->reg->maps->getModuleByName($this->controller);
    if(!isBarren($modul)){
      $this->url = $this->processMatch($modul);    
    }else{
      // register Page Not found Event
      echo "<h1>Page Error</h1> Page not found";
    }
    $this->dispatch();
  }
/**this method get the requested url and returns the part related your base
* url which allows report for subdomain site
* @return String the request url relative to the baseURL of you system  
*/
private function parseRequest(){
     //getting the URL
    $requrl = $_SERVER['REQUEST_URI'];
    //remove application url from the request url
    $count = 0;  //intialise the counter to 0;
    $requrl = str_replace($this->reg->cfg->appSetting('baseURL'),"",$requrl,$count);
    /*TODO: there must be a problem to get more than one match
    could be resolve using matching */
    if($count > 1){
        //@TODO:find a better way to handle Error
        throw New Exception("URL Parse Error");
    }
    return $requrl;
  }
 public function dispatch(){    
    if(isset ($this->url['class'])){
        $com_path = "sys/comp/".$this->url['class'].".php";
        $clasName = $this->url['class'];
    }else{
        $com_path = "sys/comp/".$this->url['name'].".php";
        $clasName = $this->url['name'];
    }//else
	if(file_exists($com_path)){
	  include ($com_path);
    }else{
         print($com_path);
	 die('<h1>Controller Not Found</h1>');
    }
    //declaring class
    $contr = new $clasName($this->reg);
    if ($contr instanceof comp){
          $contr->init();
          $contr->pushRoute();
    }
    //@TODO:what else could it be..
 }
private function processMatch($map){
$line = array();
    foreach($map as $k => $v){
        if($v instanceof SimpleXMLElement){
                $line = ArrayHelpers::XMLElemToArray( $v );
        }
    }
    return $line;
 }
 public function start(){
    $this->HaltRequest();
 }
 public function getAct(){
     return $this->process;
 }
}
?>
