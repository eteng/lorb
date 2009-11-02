<?php
/**
 * Description of Alice, this class will be returnig
 * diferent types of sql query string
 * @author eteng omini ubanga
 * <e-t-e-n-g@hotmail.com>
 */
class Alice {
  private $sqlStrings;
  private $__instance = null;
  public static function getHer(){
      if ($this->__instance === null)
            $this->__instance = new Alice;
      return $this->__instance;
  }
  public function  sql($sql){
     if (array_key_exists($sql,$this->sqlStrings))
        return $this->sqlStrings[$sql];
     else
        return false;
  }
  private function __construct();
  private function __clone(){}
}
?>
