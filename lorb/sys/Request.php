<?php
/**
 * this cass wil be handing access to request variables
 * @author Eteng
 */
class Request {

    public function getParam($param){

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
