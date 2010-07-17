<?php
require_once 'sys/comp.php';
/**A rest server implementation
 * @author etengomini.ubanga
 */
class restserver extends Comp{
    public function init(){
    }
    public function index(){
        print("<h1>Webservice working correctly</h1>");
    }
    function webserviceHandler(){
        print("<h1>Webservice Handler</h1>");
    }
    function dataserviceHandler(){
       $this->response->useContentType('xml');
       $rest_url = $this->getLastPath();
       $list = explode('/',$rest_url );
       $content  = "";
       if(!isset ($list[0])){
           $content = "<error>Database connection not supplied</error>";
       }else if(!isset ($list[1])){
           $content = "<error>Database Table not supplied</error>";
       }else if(!isset ($list[2])){
           $content = "<error>Database Table Operation not supplied</error>";
       }else{
           if(isBarren($list[2])){
             $content = "<error>Database Table Operation can not be empty</error>";
           }else {
               require_once __SITE_PATH.DIRECTORY_SEPARATOR.'apps/restserver/ds/coreds.php';
               $dscore = new coreds($this->reg);
               $dscore->setParamList($list);
               $dscore->setRequest(array($this->request,"XML"));
               $content = $dscore->result();
               $xml = $this->getSimpleX();
               ArrayHelpers::ArrayToXMLRow($xml, $content,"row",3);
               $content = $xml->asXML();
           }
       }
       $this->response->content = $content;
       return $this->response->send();
    }
    /**
     * @return SimpleXMLElement obj
     */
    private function getSimpleX(){
        $str = '<?xml version="1.0" encoding="UTF-8"?><response/>';
		$xml = new SimpleXMLElement( $str );
                return $xml;
    }

}
?>
