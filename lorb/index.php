<?php
$_time = microtime(true);
/**turn error reporting on**/
error_reporting(E_ALL);

//site path constant
$site_path = realpath(dirname(__FILE__));
define('__SITE_PATH',$site_path);

//making the library avaliable to the users
$pathToLib =';'.__SITE_PATH.DIRECTORY_SEPARATOR.'lib'.DIRECTORY_SEPARATOR;
set_include_path($pathToLib.get_include_path());

/********setting the session save path ********/
ini_set("session.save_path",__SITE_PATH."/Data/sessions");
//session_start();
//$_SESSION['name']=__SITE_PATH;

//include the boot file
include 'sys/boot.php';

/*** set the path to the controllers directory ***/
//$registry->router->setPath (__SITE_PATH . '/controller');

/*** load the controller ***/
$registry->front->start();
if($registry->front->getController()!= 'mxfactory'){
print "<br />\n| Memory peak usage: ".memory_get_peak_usage();
print " | Memory peak usage(true): ".memory_get_peak_usage(true);
print " | Memory usage: ".memory_get_usage();
print " | Memory usage(true): ".memory_get_usage(true);
printf ("\n\r | Time elapsed: %s seconds",microtime(true) - $_time);
}
?>

