<?php

/* * a web service class, uses the the site database config in config.xml
 * as the data base interface.
 * uses basic crud operations (CRUD)
 * @author etengomini.ubanga
 */

class coreds {
    private $method_name;
    private $table;
    private $database;
    private $reg;
    private $dbcon;
    private $request;
    private $type;
    function  __construct($param){
        $this->passRegistry($param);
    }
    function passRegistry($reg){
        $this->reg = $reg;
    }
    function setRequest($req){
        $this->request = $req[0];
        $this->type = $req[1];
    }
    function setParamList($params) {
        $this->database = $params[0];
        $this->table = $params[1];
        $this->method_name = $params[2];
        //process others later likepaging and ..
    }
    //put your code here
    function getInput() {
        
    }
    function fetch() {
        //@TODO: add this to a routing and configurable setting sothat
        //column can be specify
        $sql = $this->dbcon->prepare("SELECT * FROM ".$this->table);
        $sql->execute();
        $result_set = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $result_set;
    }
    function insert() {
         pitch("Dodeye.core.db.Insert");
         $data = $this->request->getParam($this->type);
         $xml = simplexml_load_string($data);
         $array_val = ToArray($xml);
         $row_key = key($array_val);
         $row1_key = key($array_val[$row_key]);
         
         $Insert  = new Insert();
         $Insert->into($this->table);
         //@NOTE: peple might send multiple insert
         if(is_numeric($row1_key)){
             //there are may rows
             $tbl_cols = array_keys($array_val[$row_key][$row1_key]);
             $Insert->columns($tbl_cols);
             $sql = $this->dbcon->prepare($Insert->bindable_sql());
            // foreach ($tbl_cols as $key =>$val)
               // $sql->bindParam($key,$val);
         }else{
             //single entry
             $tbl_cols = array_keys($array_val[$row_key]);
             $Insert->columns($tbl_cols);
             $sql = $this->dbcon->prepare($Insert->bindable_sql());
             
             foreach ($tbl_cols as $key => $val){
                 $sql->bindParam(($key + 1),$array_val[$row_key][$val]);
             }
             
             //$rs = $sql->execute();
             if($rs){
                 print "true";
             }else{
                 print "false";
             }
         }

         //$sql
         exit;
    }
    function update() {

    }
    function delete() {
        
    }
    function result(){
        if($this->reg->cfg->getDefaultDBConName() == $this->database){
            //@log: found existing connecting string
            $this->dbcon = $this->reg->db;
            $cont = "";
            if(method_exists(__CLASS__,$this->method_name)){
                $cont = call_user_func(array($this,$this->method_name));
                //print_r($cont);
                //exit;
            }else
                $cont = "<error>There is no such operation</error>";
            return $cont;
        }else{
            //@log: opening a new connecting string
            return "<rs>Locate new connection resources</rs>";
        }
    }

}
?>
