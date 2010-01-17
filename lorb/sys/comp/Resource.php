<?php
pitch('Dodeye.util.basic');
require_once 'sys/comp.php';
/**
 * this class is basic component for manging the site resources like css
 * js
 * @author Eteng omini <e-t-e-n-g@hotmail.com>
 */
class Resource extends Comp{
    public function init(){
       //todo: initialise here
    }
    public function index(){
        //todo: Error
    }
    function manage_css(){
      $ext = ".css";
      $reqrex =  $this->getLastPath();
      $filename = realpath(__SITE_PATH.'/sys/templates/'.$reqrex.$ext);
      if(isBarren($reqrex) || !file_exists($filename)){
          throw new Exception("Resources Not sent!");
      }
      $this->response->contenType = 'text/css';
      $this->response->content  = file_get_contents($filename);
      $this->response->ready(TRUE);
    }
    private function getAssetPath($name){

    }
}
?>
