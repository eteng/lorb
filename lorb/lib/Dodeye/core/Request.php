<?php
/**
 * Description of Request
 * @author Eteng omini <e-t-e-n-g@hotmail.com>
 */
class Request {

    public function getParam(){

    }
    public function getPathParam(){

    }
    public static function getSessionParam($param){
        $return ="";
        if(isset ($_SESSION[$param])){
            $return = $_SESSION[$param];
        }
        return $return;
    }
}
?>
