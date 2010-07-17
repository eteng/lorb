<?php
require_once 'statement.php';
/**
 * Description of Insert
 *
 * @author etengomini.ubanga
 */
class Insert extends statement{
    //put your code here
    private $tbl_nam;
    private $values;
    function into($param){
        $this->tbl_nam = $param;
    }
    function values($vals){
        $this->values = $vals;
    }
    function bindable_sql(){
         //@TODO: manage columns later
        $output = "INSERT INTO ". $this->tbl_nam;
        $output .= " (".$this->getColumns();
        $output .= ") VALUES (";
        $output .= $this->getBindParamColumns();
        $output .= ")";
        return $output;
    }
    function raw_sql(){
         //@TODO: manage columns later
        $output = "INSERT INTO ". $this->tbl_nam;
        $output .= " (".$this->getColumns();
        $output .= ") VALUES (";
        $output .= $this->getBindParamColumns();
        $output .= ")";
        return $output;
    }
    protected function getColVals(){
        $str = "";
        $len = count($this->values);
        if($len){
           for($i = 0; $i <$len; $i++ ){
               if($i)
                  $str.= ", ";
                $str.= " ".$this->values[$i]." ";
           }
        }
        return $str;
    }
    
}
?>
