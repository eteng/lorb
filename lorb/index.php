<?php //this is where its begins

require_once 'config/App_const.php';

/**turn error reporting on**/
error_reporting(E_ALL);

//site path constant
$site_path = realpath(dirname(__FILE__));
define('__SITE_PATH',$site_path);

//making the library avaliable to the users
$pathToLib =';'.__SITE_PATH.DS.'lib'.DS;
set_include_path($pathToLib.get_include_path());

//include the boot file
include 'Mom/boot.php';

/*** set the path to the controllers directory ***/
//$registry->router->setPath (__SITE_PATH . '/controller');

/*** load the controller ***/
$registry->front->run_main();

?>
 
