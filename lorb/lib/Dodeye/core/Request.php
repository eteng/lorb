<?php
/**this class handles the client request
 * @author Eteng omini <e-t-e-n-g@hotmail.com>
 */
class Request {
    private $_type;
    private $_request = array();
    private $_req_type;
    
    public function  __construct() {
        $this->_type = isset ($_SERVER['CONTENT_TYPE']) ? $_SERVER['CONTENT_TYPE'] : null;
    }
    protected function _get_param($type){
        
        $this->_req_type = $type;

        if($this->_type === null){
            switch (strtoupper($type)){
                case 'GET':
                    $this->_request['GET'] = $_GET;
                    break;
                default: return null;

            }
        }
        switch($this->_type){
            case 'application/x-www-form-urlencoded':
                switch (strtoupper($type)){
                    case 'POST':
                        $this->_request['POST'] = $_POST; break;
                    case 'GET':
                        $this->_request['GET'] = $_GET; break;
                    case 'COOKIE':
                        $this->_request['COOKIE'] = $_COOKIE; break;
                    default: return null;
                };
                break;
            case 'application/xml':
                switch (strtoupper($type)){
                    case 'XML':
                        $xml = file_get_contents('php://input');
                        $this->_request['XML'] = $xml; break;
                    case 'GET':
                         $this->_request['GET'] = $_GET; break;
                    default: return null;
                };
                break;
            case 'application/json':
                switch (strtoupper($type)){
                    case 'JSON':
                        $xml = file_get_contents('php://input');
                        $this->_request['JSON'] = $xml; break;
                    case 'GET':
                         $this->_request['GET'] = $_GET; break;
                    default: return null;
                };
                break;
            default:
                switch (strtoupper($type)){
                   case 'POST':
                        $this->_request['POST'] = $_POST; break;
                   case 'GET':
                         $this->_request['GET'] = $_GET; break;
                   default: return null;
               }
       }
       return $this;
    }
    /** retrieve the request from the client
     * @param String $type GET | POST | XML | JSON | COOKIE
     * @return Object the result or null when not avaliable
     */
    public  function getParam($type){
        $r = $this->_get_param($type);
        if($r === null) return null;
        return $this->_request[$this->_req_type];
    }
    public static function getSessionParam($param){
        $return ="";
        if(isset ($_SESSION[$param])){
            $return = $_SESSION[$param];
        }
        return $return;
    }
    public function getContentType(){
        return $this->_type;
    }
}
?>
