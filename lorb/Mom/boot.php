<?php
/****include the db model class****/
include __SITE_PATH.'/model/'.'db.class.php';

/*** include the config class ***/
include __SITE_PATH .'/Mom/'.'LorbConfig.php';

/*** include the config class ***/
include __SITE_PATH .'/Mom/'.'Maps.php';

/*** include the controller class ***/
include __SITE_PATH .'/system/'.'controller_base.class.php';

/*** include the registry class ***/
include __SITE_PATH .'/system/'.'registry.class.php';

/*** include the FrontController class ***/
include __SITE_PATH .'/system/'.'FrontController.php';

/*** include the template class ***/
include __SITE_PATH .'/system/'.'template.class.php';

/*** include the development class ***/
include __SITE_PATH .'/system/'.'Dev.php';

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
$registry->lorbConfig = LorbConfig::getConfig();
$registry->maps = Maps::getInstance();
$registry->front = new FrontController($registry);
/*** load up the template ***/
$registry->template = new template($registry);

?>