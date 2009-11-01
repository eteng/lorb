<?php //this is where its begins
function dox($params){
    foreach($params as $key => $value){
    echo $key." ==> ".$value."<br />";
    }
}
require_once 'config/App_const.php';

define('b',"<br />");
/**turn error reporting on**/
error_reporting(E_ALL);

//site path constant
$site_path = realpath(dirname(__FILE__));
define('__SITE_PATH',$site_path);

//include the boot file
include 'Mom/boot.php';

//making the library avaliable to the users
$pathToLib =';'.__SITE_PATH.DS.'lib'.DS;
set_include_path($pathToLib.get_include_path());

//finding the domain
$domain = LorbConfig::getConfig()->config('domain');

//loadin gthe router
$registry->router = new router($registry);

/*** set the path to the controllers directory ***/
$registry->router->setPath (__SITE_PATH . '/controller');

 /*** load up the template ***/
 $registry->template = new template($registry);

 /*** load the controller ***/
 $registry->router->loader();

 //DOJO toolkit
 //SCRIPT TYPE="text/javascript" SRC="dojo/dojo.js"></SCRIPT>

?>
<!--DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="shortcut icon" type="image/icon" href="<?php //echo $domain;?>/favicon.ico">
        <title></title>
    </head>
    <body-->
<?php
//      echo LorbConfig::getInstance()->config('site').b;
//      echo "welome to main page".b;
//		echo __SITE_PATH.b;
//        $routes = array(
//                        array('url'=>'/^post\/(?P<id>\d+)$/','controller' =>'post','view'=>'show'),
//                        array('url'=>'/^post\/(?P<id>\d+\/edit)$/','controller' =>'post','view'=>'edit')
//                        );
//       // $pattern ='/^post\/(?P<id>\d+\/edit)$/';
//       // $pattern ='/^(?P<comp>\w+)\/(?P<id>\d+)\/(?P<action>\w+)$/'; //for further development
//       $params = array();
//       foreach($routes as $urls =>$route)
//       {
//          if(preg_match($route['url'],$url,$matches))
//          {
//              $params = array_merge($params,$matches);
//              break;
//          }
//       }
        ?>
    </body>
</html>
