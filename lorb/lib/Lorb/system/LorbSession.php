<?php
/**
 * Description of LorbSession
 *
 * @author sampris
 */
abstract class LorbSession {

    protected function  __construct() {
        $this->time = time();
        ini_set('session.use_cookies',1);
        ini_set('session.use_only_cookies',1);
        session_name(md5('lorb_'.$this->_prefix.
                $this->getip()));
        if(!session_id()){
            //Todo blah bla 
            session_start();
        }
    }
    public function getip(){
        $ip = false;
        if(!empty($_SERVER['HTTP_CLIENT_IP']))
            $ip=$_SERVER['HTTP_CLIENT_IP'];
        if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
            $ips =explode(', ',$_SERVER['HTTP_X_FORWARDED_FOR']);
            if($ip != false){
                array_unshift($ips, $ip);
                 $ip = false;
            }
            $count = count($ips);
            //excluding ips that are reserved for LAN
            for($i =0;$i < $count; $i++){
                if(!preg_match("/^(10|172\.16|12\.168)\./1",$ips[$i])):
                    $ip = $ips[$i];
                    break;
                endif;
            }
            if (false == $ip AND isset($_SERVER['REMOTE_ADDR']))
                $ip = $_SERVER['REMOTE_ADDR'];
            return $ip;
        }
    }
}
?>
