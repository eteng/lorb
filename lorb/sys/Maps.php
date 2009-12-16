<?php
/**
 * this class handlse the querying of the maps site track and return matches
 * @author eteng omini ubanga
 * e-t-e-n-g@hotmail.com
 */
class Maps{
   // manipulation constants
   private $x_maps;
   private static $__instance = null;
   private $tags = array(
       'root'=>'comps',
       'module'=>'nav'
   );
   protected function  __construct() {/**Hide the constructor*/}
   public function   __clone(){/**Empty Body*/}
   static function getInstance(){
        if(self::$__instance ===null){
            $s = __CLASS__;
            self::$__instance = new $s;
            self::$__instance->init_vars();
        }
        return self::$__instance;
   }
   //overriding interface
   public function init_vars(){
       $this->x_maps =
       simplexml_load_file('config/site-track.xml');
   }
   private  function checkBasePath($Path){
       return $this->x_maps->xpath("/{$this->tags['root']}/".$Path);
   }
   private function checkRelPath($Path){
       return $this->x_maps->xptha($Path);
   }
   public function getModuleByName($str){
       $comp =
       $this->checkBasePath("{$this->tags['module']}[@name='{$str}']");
      return $comp;
   }
    
}
?>
