<?php
/**this class is used to query the mother configuration
 * @author eteng omini ubanga
 * <e-t-e-n-g@hotmail.com>
 */
class LorbConfig {

    private static $__instance = null;
    private $xconfig;

   /**Hidden magic function*/
    private function  __construct() {
        $this->xconfig = simplexml_load_file('config'.'/config.xml');
    }
    private function   __clone(){/**Empty Body*/}
    public static function getConfig(){
        if(self::$__instance ===null){
            $s = __CLASS__;
            self::$__instance = new $s;
        }
        return self::$__instance;
    }
    public function config($param){
        return strval($this->xconfig->config[$param]);
    }
    public function appSetting($param){
        return strval($this->xconfig->config->application->$param);
    }
    public function getDefaultDBConName(){
        $default = $this->xconfig->config->dbconnection['default'];
        return $default;
    }
    public function getDefaultDB(){
        return $this->getDB($this->getDefaultDBConName());
    }
    public function getDB($constring){
        $flag = false;
        $params = array();
        //@TODO: Advance this concept using xpath technology to query thus saving memory ;
         foreach($this->xconfig->config->dbconnection->db as $db){    
            if(((string)$db['name'])==$constring){
                $flag = true;
                if($db->count()){
                    foreach($db->children() as $dbparam => $dbval){
                        $params[strval($dbparam)]  = strval($dbval);
                    } 
                }
                else{
                    foreach($db->attributes() as $dbparam => $dbval){
                        $params[strval($dbparam)]  = strval($dbval);
                    }
                }
                /** @TODO: could be remove incase of grouping db connection by type*/
                $params['type'] = strval($db['type']);
                break;
            }
        }
        if(!$flag){
            throw new Exception("database connection name $constring not found!");
        }
        return $params;
    }

}
?>
