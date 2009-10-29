<?php

// for all basic function that will be reused (!empty ($_GET[$getParams]) && $_GET[$getParams]!==0)
function getUrl($params){
   $result = array();
   foreach($params as $getParams => $identifier){
       if(isset($_GET[$getParams]) && !_empty($_GET[$getParams])){
           $result[$identifier] = $_GET[$getParams]; 
       }
   }
   return $result;
}
function isBarren() {
    foreach(func_get_args() as $args) {
        if( !is_numeric($args) ) {
            if( is_array($args) ) { // Is array?
                if( count($args, 1) < 1 ) return true;
            }
            elseif(!isset($args) || strlen(trim($args)) == 0)
                return true;
            }
        }
      return false;
}

/**A function used to redirect to different page
 * @param string $location the location of the page to redirector
 */
function redirect_to($location){
   header("Location: {$location}");
   exit;
}


?>
