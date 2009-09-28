<?php
/**
 * Description of Lorb
 *
 * @author sampris
 */
class Lorb {

   function requireLogin(){
      $washeading = $_SERVER['HTTP_REFERRER'];
      header("location:login.php");
   }
   function requireAdminlogin(){
      $washeading = $_SERVER['HTTP_REFERRER'];
      
   }
}
?>
