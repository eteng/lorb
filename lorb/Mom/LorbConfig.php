<?php
/**
 * Description of LorbConfig
 *
 * @author etengomini.ubanga
 * <e-t-e-n-g@hotmail.com>
 */
class LorbConfig {
   
   private static $__instance = null;
   private $__xmlconfig;

   /**Hidden magic function*/
   private function  __construct() {
       $this->__xmlconfig = simplexml_load_file(dirname(__FILE__).'/config.xml');
   }
   private function   __clone(){/**Empty Body*/}
   
   public static function getInstance(){
       if(self::$__instance ===null){
           $s = __CLASS__;
           self::$__instance = new $s;
       }
       return self::$__instance;
   }
   public function config($param){
     return $this->__xmlconfig->config[$param];
   }

}
?>
