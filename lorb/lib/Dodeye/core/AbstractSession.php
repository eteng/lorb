<?php
/**
 * Description of AbtractSession
 *
 * @author Eteng omini <e-t-e-n-g@hotmail.com>
 */
abstract class AbstractSession {

    protected function  __construct() {
       session_start();
    }
    /**A method used to retrieve the client IP Address.
     * @return string Ip of the clien
     */
    public function getIP(){
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
