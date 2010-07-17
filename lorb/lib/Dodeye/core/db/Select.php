<?php
require_once 'statement.php';
/**
 *  A class to remodle db select
 *
 * @author darius
 */
class Select extends statement{
   
    private $from;
    private $_tbl_alais = "";

    function beforeSelect($string){
        $this->before = $string;
    }
    function from($para){
        if(is_array($para)){
             $key = key($para);
             $this->from = $para[$key]." AS ".$key ;
             $this->_tbl_alais = $key;
        }else
        if(is_string($para)){
            $this->from = $para;
        }
    }
    private function getFrom(){
        //@TODO:implement array boys
           return $this->from;
    }
    private function get_columns_w(){
        $str = "";
        $len = count($this->_column);
        if($len){
           for($i = 0; $i <$len; $i++ ){
               if($i)
                  $str.= ", ";
               if($this->_tbl_alais ==""){
                  //@TODO:modify later
                  //$str.= "`".$this->from."`.".$this->_column[$i]." ";
                  $str.= " ".$this->_column[$i]." ";
               }else{
                  $str.= "`".$this->_tbl_alais."`.".$this->_column[$i]." ";
               }
           }
        }else{
            if($this->_tbl_alais ==""){
                  $str.= "`".$this->from."`.* ";
             }else{
                  $str.= "`".$this->_tbl_alais."`.* ";
             }
        }
        return $str;
    }
    function  __toString(){
        //@TODO: manage columns later
        $output = "SELECT ". $this->before;
        $output .= $this->get_columns_w();
        $output .= " FROM ";
        $output .= " ".$this->getFrom()." ";
        $output .= " ".$this->getWheres()." ";
        $output .= " ".$this->_limit;
       // $output .= " ".$this->_offset;
        return $output;
    }
}
?>
