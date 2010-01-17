<?php
/**A class used for manipulating the the .HTACCESS File
 * @author Eteng omini <e-t-e-n-g@hotmail.com>
 * @version 1.0
 */ 
class HTAccess{

 /**note this will result to an internal Error if rewrite rules or on
  * and link is not absolute to document root
  */
 public function writeRedirect($from , $to){
    $commad = "Redirect ".$from." ".$to;
    return $commad;
 }
 /**this function is used to implement the .htacess password protection
  * functionality
  * @param Array $params {'AuthName'=>'Section Name','AuthType'=>'Basic','AuthUserFile'=>'full/path/.htpasswd',}
  */
 public function protectDir($params){
     $commad ='AuthName \"'.$params['AuthName'].'\"'.'\n';
     $commad .='AuthType '.$params['AuthType'].'\n';
     $commad .='AuthUserFile '.$params['AuthUserFile'].'\n';
     $commad .='Require valid-user'.'\n';
     return $commad;
 }

}

?>
