<?php

/****include the db model class****/
include __SITE_PATH.'/model/'.'db.class.php';

/*** include the config class ***/
include __SITE_PATH .'/sys/'.'LorbConfig.php';

/*** include the config class ***/
include __SITE_PATH .'/sys/'.'Maps.php';

/*** include the controller class ***/
include __SITE_PATH .'/sys/'.'Controller.php';

/*** include the registry class ***/
include __SITE_PATH .'/sys/'.'registry.class.php';

/*** include the FrontController class ***/
include __SITE_PATH .'/sys/'.'FrontController.php';

/*** include the template class ***/
include __SITE_PATH .'/sys/'.'template.class.php';

/*** include the development class ***/
include __SITE_PATH .'/sys/'.'Dev.php';

/*** include the path for the library utill ***/

/*** auto load model classes ***/
 function __autoload($class_name) {
    $filename = strtolower($class_name).'.Model.php';
    $file = __SITE_PATH . '/model/' . $filename;
    
    if (file_exists($file) == false)
    {
        return false;
    }
  include ($file);
}
function pitch($path){
    $path = str_replace('.',"\\",$path);
	$path = $path.".php";
    return require_once "{$path}";
}
 /*** a new registry object ***/
 $registry = new Registry();

/**creating the database reg object ***/
$registry->db = db::getDB(LorbConfig::getConfig()->getDefaultDB());
$registry->cfg = LorbConfig::getConfig();
$registry->maps = Maps::getInstance();
$registry->front = new FrontController($registry);
/*** load up the template ***/
$registry->tpl = new template($registry);

?>