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
      $match;
      preg_match_all("/url\(('?|\"?)([\w\d\/\.]*)('?|\"?)\)/",file_get_contents($filename),$match );
      $path = $this->reg->cfg->config('domain').'/'.'sys/templates/dodeye/css';
      $afun = function($match) use ($path){  return "url('$path". preg_replace("/('?|\"?)/",'',$match[1])."')"; };
      $this->response->content = preg_replace_callback("%url\(([\w\d\/\.'\"]*)\)%",$afun,$this->response->content);


     // print_r($match);
      //exit;
      
    // $this->response->content = print_r($match,true);
      $this->response->ready(TRUE);
    }
    private function getAssetPath($name){

    }
}
?>
