<?php
//pitching in basic file.
pitch("Lorb.util.basic");
/**
 * Description of FrontController
 * @author eteng omini
 * <e-t-e-n-g@hotmail.com
 */
class FrontController {

  protected $controller;
  
  protected $url;

 /*
 * @the registry
 */
 private $registry;
   //@TODO: coupling to tight need to release;
  public function  __construct($registry) {
        $this->registry = $registry;
  }
  private function HaltRequest(){
    
    $request =  $this->parseRequest();
	if (empty($request))
		 $request = 'index';  //front
	else
	{   /*** get the parts of the request ***/
      
		$parts = explode('/', $request);
		$this->controller = $parts[0];

		if(isset( $parts[1]))
			$this->action = $parts[1];

        $modu = $this->registry->maps->getModuleByName($this->controller);
        if(!isBarren($modu)){
            $this->matchRoute($request);
        }else{
            echo "<h1>Page Error</h1> Page not found";
        }      
	}
	if (empty($this->controller))
	{
		$this->controller = 'index';
	}
    $this->matchRoute($request);
	/*** Get action ***/
	if (empty($this->action))
	{
		$this->action = 'index';
	}
	/*** set the file path ***/
	//$this->file = $this->path .'/'. $this->controller . 'Controller.php';
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
    $requrl = str_replace($this->registry->lorbConfig->appSetting('baseURL'),"",$requrl,$count);
    /*TODO: there must be a problem to get more than one match
    could be resolve using matching */
    if($count > 1){
        //@TODO:find a better way to handle Error
        throw New Exception("URL Parse Error");
    }
    return $requrl;
  }
 private function matchRoute($request){
    
 }
 public function run_main(){
    $this->HaltRequest();
 }
}
?>
