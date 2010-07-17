<?php

/****include the db model class****/
include __SITE_PATH.'/lib/Dodeye/core/db/'.'DB.php';

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
include __SITE_PATH .'/sys/'.'Template.php';

/*** include the development class ***/
include __SITE_PATH .'/sys/'.'Dev.php';

/******include the  dodeye class ****/
include __SITE_PATH.'/lib/Dodeye/core/'.'Dodeye.php';
/*** include the path for the library utill ***/
//todo:modle the autoload properly
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
/**A function used to load Dodeye library
 * @param String $path of the Class to inport e.g <"Dodeye.util.basic">
 * @return requirement to the path
 */
function pitch($path){
    $path = str_replace('.',"\\",$path);
	$path = $path.".php";
    return require_once "{$path}";
}
/*** a new registry object ***/
$registry = new Registry();
$registry->dodeye = new Dodeye($registry);
/**creating the database reg object ***/
$registry->db = DB::getDB(LorbConfig::getConfig()->getDefaultDB());
$registry->cfg = LorbConfig::getConfig();
$registry->maps = Maps::getInstance();
Template::setBaseDir();
$registry->front = new FrontController($registry);

?>