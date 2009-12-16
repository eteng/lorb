<?php
class router {
 /*
 * @the registry
 */
 private $registry;
 /*
 * @the controller path
 */
 private $path;

 private $controllerID;

 private $args = array();

 public $file;

 public $controller;

 public $action;

 function __construct($registry) {
        $this->registry = $registry;
 }
 /**
 * @set controller directory path
 * @param string $path
 * @return void
 */
 function setPath($path) {

	/*** check if path i sa directory ***/
	if (is_dir($path) == false)
	{
		throw new Exception ('Invalid controller path: `' . $path . '`');
	}
	/*** set the path ***/
 	$this->path = $path;
}
 /**
 * @load the controller
 * @access public
 * @return void
 */
 public function loader()
 {
	/*** check the route ***/
	$this->getController();

	/*** if the file is not there diaf ***/
	if (is_readable($this->file) == false)
	{
		$this->file = $this->path.'/error404.php';
                $this->controller = 'error404';
	}
	/*** include the controller ***/
	include $this->file;

	/*** a new controller class instance ***/
	$class = $this->controller . 'Controller';
	$controller = new $class($this->registry);

	/*** check if the action is callable ***/
	if (is_callable(array($controller, $this->action)) == false)
	{
		$action = 'index';
	}
	else
	{
		$action = $this->action;
	}
	/*** run the action ***/
	$controller->$action();
 }
 /**
 * @get the controller
 * @access private
 * @return void
 */
private function getController() {
    /**** Getting the request from the  url*/
    $request =  $this->parseRequest();   
	if (empty($request))
		 $request = 'index';  //front
	else
	{   /*** get the parts of the request ***/

		$parts = explode('/', $request);
		$this->controller = $parts[0]; 
		if(isset( $parts[1]))
			$this->action = $parts[1];
       //checking registered componest
       $sql = "SELECT * FROM  components WHERE com_name = :contx";

       $stst =$this->registry->db->prepare($sql);
       $stst->bindValue(':contx',$this->controller,PDO::PARAM_STR);
       $stst->execute();
       $pdo_resullt = $stst->fetch();
       
       //checking if the controller is registered to the database
       if(!isset($pdo_resullt['com_id']))
           $this->controller = "";
       else
            $this->controllerID = $pdo_resullt['com_id'];
       //TODO: DEBUGING >> getController
       //print_r($pdo_resullt);
        $this->matchRoute($request);
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
	$this->file = $this->path .'/'. $this->controller . 'Controller.php';
}
private function parseRequest(){
    //getting the URL
    $requrl = $_SERVER['REQUEST_URI'];
    //remove application url from the request url
    $count = 0;  //intialise the counter to 0;
    $requrl = str_replace(LorbConfig::getConfig()->appSetting('baseURL'),"",$requrl,$count);
    /*TODO: there must be a problem to get more than one match
    could be resolve using matching */
    if($count > 1){
        throw New Exception("URL Parse Error");
    }
    return $requrl;
}
private function matchRoute($request){

    /* $sql = "SELECT * FROM routes WHERE com_id = :com ";
     $stst =$this->registry->db->prepare($sql);
     $stst->bindValue(':com',$this->controllerID,PDO::PARAM_INT);
     $stst->execute();
     $pdo_resullt = $stst->fetchAll();
     //TODO: DEBUGING >> getController
     (!isset($pdo_resullt[0])) or dox($pdo_resullt[0]);
     *
     */
     

}



}

?>
