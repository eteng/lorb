<?php
/**
 * Description of TemplateExcep
 *
 * @author Eteng omini <e-t-e-n-g@hotmail.com>
 */
class TemplateExcep extends Exception{
   const NotFound = 1;
   const FileNotFound = "The Template File Does not Exits";
   public function __constructor($message, $code=0, $previous=null){
        parent::__construct($message, $code, $previous);
   }
}
?>
