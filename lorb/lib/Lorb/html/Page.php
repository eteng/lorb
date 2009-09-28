<?php

/**
 * Description of Page
 *
 * @author sampris
 */
class Page {
   public $content;
   public $title;
   public $keyword;
   public $button = array('Home'=>'index.php');
   public function __set($name,$value)
   {
       $this->$name = $value;
   }
   public function displayKeywords(){
       echo "<meta name =\"Keywords\" content=\"".
        htmlentities($this->keyword)."\" />";
   }
   public function isURLCurrentPage($url){
       if(strpos($_SERVER['PHP_SELF'],$url)==false){
           return false;
       }else{
           return true;
       }
   }
   public function displayButton($name,$url,$selected = true){
        if($selected){
            echo "<a href='".htmlentities($url)."'>$name</a>";
        }else{

        }
   }


}
?>
