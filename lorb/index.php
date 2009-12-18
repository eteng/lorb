<?php 
/**turn error reporting on**/
error_reporting(E_ALL);

//site path constant
$site_path = realpath(dirname(__FILE__));
define('__SITE_PATH',$site_path);

//making the library avaliable to the users
$pathToLib =';'.__SITE_PATH.DIRECTORY_SEPARATOR.'lib'.DIRECTORY_SEPARATOR;
set_include_path($pathToLib.get_include_path());

//include the boot file
include 'sys/boot.php';

/*** set the path to the controllers directory ***/
//$registry->router->setPath (__SITE_PATH . '/controller');

/*** load the controller ***/
$registry->front->start();

//echo "<br />\n Memory peak usage:".memory_get_peak_usage();
//echo "<br />\n Memory peak usage: ".memory_get_peak_usage(true);
//echo "<br />\n Memory usage :".memory_get_usage();
//echo "<br />\n Memory usage:".memory_get_usage(true);

?>
 
