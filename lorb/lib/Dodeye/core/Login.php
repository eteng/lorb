<?php
pitch("Dodeye.core.Request");
pitch("Dodeye.util.basic");
/**
 * this is a plugin class used in the system
 * @author Eteng
 */
class Login {
    const USER = "uid";
    const TOGO = "tempurl";
    
    function requireLogin(){
//        if(isBarren(Request::getSessionParam(self::USER))){
//            $this->getRequestedURL();
//            redirect_to($this->getToGoUrl());
//        }
    }
    private function getRequestedURL(){
       global $registry;
       $sand = $registry->cfg->config("domain");
       if(isset($_SERVER['HTTP_REFERER']))
                $sand = $_SERVER['HTTP_REFERER'];
       $_SESSION[self::TOGO] = $sand;
    }
    private function getToGoUrl(){
        return strval($_SESSION[self::TOGO]);
    }
    public function validate(){

    }
}
?>
