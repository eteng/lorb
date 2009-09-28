<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
		require_once 'config/App_config.php';
		require_once 'config/App_const.php';
		define('b',"<br />");
		/**turn error reporting on**/
		error_reporting(E_ALL);
		
		//site path constant
		$site_path = realpath(dirname(__FILE__));
		define('__SITE_PATH',$site_path);
		
		//include the boot file
		include 'Mom/boot.php';
		
		//loadin gthe router 
		$registry->router = new router($registry);
		
		/*** set the path to the controllers directory ***/
		//$router->setPath (__SITE_PATH . 'controller');
        
        echo "welome to main page".b;
		echo __SITE_PATH.b;
		//get the request url	
		$url = $_SERVER['REQUEST_URI'];
		//remove application url from the request url 
		$url = str_replace(PS.AppURL.PS,'',$url);
        //Matching the url
        $routes = array(
                        array('url'=>'/^post\/(?P<id>\d+)$/','controller' =>'post','view'=>'show'),
                        array('url'=>'/^post\/(?P<id>\d+\/edit)$/','controller' =>'post','view'=>'edit')
                        );
       // $pattern ='/^post\/(?P<id>\d+\/edit)$/';

       // $pattern ='/^(?P<comp>\w+)\/(?P<id>\d+)\/(?P<action>\w+)$/'; //for further development
       $params = array();
       foreach($routes as $urls =>$route)
       {
          if(preg_match($route['url'],$url,$matches))
          {
              $params = array_merge($params,$matches);
              break;
          }
       }

        echo b."request = ".$url.b.b;
        dox($params);

        function dox($params){
            foreach($params as $key => $value){
				echo $key." ==> ".$value."<br />";
			}
        }
        ?>
    </body>
</html>
