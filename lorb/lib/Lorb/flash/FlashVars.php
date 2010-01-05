<?php
/**
 * this class is used to dunamically create FlashVars for embeded swf file
 * @author Eteng Omini <e-t-e-n-g@hotmail.com> 
 */
class FlashVars {
  private $flashvars = array();
  private $cast;
  public function  __set($name, $value) {
      $this->flashvars[$name] = $value;
  }
  public function  __get($name) {
      if(array_key_exits($name,$this->flashvars)){
         return $this->flashvars[$name];
      }else
         return null;
  }
  private function cleanVars(){
      $this->processString = array();
      foreach($this->flashvars as $key => $var){
          if(is_string($var)){
              $var = str_replace(" ",'+',$var);
              $this->cast[] = "{$key}={$var}";
          }else{
              $this->cast[] = "{$key}={$var}";
          }
      }
  }
  public function  __toString() {
      $this->cleanVars();
     return implode("&",$this->cast);
  }
}
?>
