<?php
/**
 * this class is used for interprete url variable matching
 * @author eteng omini
 * <e-t-e-n-g@hotmail.com
 */
class URLVariable{
   // manipulation constants
   /**floating number**/
   const VAR_FLOAT = 'float';
   /**string literal**/
   const VAR_STRING = 'string';
   /**positive whole numbers**/
   const VAR_INT = 'int';
   /**negative to positive number**/
   const VAR_NUMBER = 'number';
   /**mating using regular express**/
   const VAR_PATTERN = 'pattern';
   
   public function decode_var($Type){
   
   }
   public function encode_var($Type){
   
   }

}
?>