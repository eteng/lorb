<?php
require_once 'sys/comp.php';
//require_once 'sys/Template.php';
/* 
 * this is the administrator component...
 * @author Eteng
 */
class Administrator extends Comp{
    
  public function init(){
    $dodeye = $this->reg->dodeye;
    $user = $dodeye->login->requireLogin();
  }
  public function index(){
       $data = file_get_contents('php://input');
       print_r($data);
       $favicon = $this->reg->cfg->config('domain')."/favicon.ico";
       Template::setBaseDir('views');
       Template::display('AdminLogin.php',array('favicon'=>$favicon,
       'css'=>function($csls){print "http://localhost/lorb/lorb/mxfactory/css/".$csls;}
       ,'url_login'=>$this->reg->front->getRawURL()));
  }
  public function comps(){
       Template::setBaseDir('views/login');
       Template::display('show.php',array());
  }
}
?>
