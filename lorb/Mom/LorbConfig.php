<?php
/**this class is used to query the mother configuration
 * @author etengomini.ubanga
 * <e-t-e-n-g@hotmail.com>
 */
class LorbConfig {

    private static $__instance = null;
    private $xconfig;

   /**Hidden magic function*/
    private function  __construct() {
        $this->xconfig = simplexml_load_file(dirname(__FILE__).'/config.xml');
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
    public function getDefaultDB(){
        $default = $this->xconfig->config->dbconnection['default'];
        return $this->getDB($default);
    }
    public function getDB($constring){
        $flag = false;
        $params = array();
        foreach($this->xconfig->config->dbconnection->db as $db){
            if(((string)$db['name'])==$constring){
                $flag = true; 
                foreach($db->children() as $dbparam => $dbval){
                    $params[strval($dbparam)]  = strval($dbval);
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
