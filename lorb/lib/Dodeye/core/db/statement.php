<?php

/**
 * Description of statement
 *
 * @author etengomini.ubanga
 */
class statement {

   private $_where = array();
   protected $_column = array();

    function where($para,$value ="",$type="string"){
        //if drops
        if (is_string($para)){
            $value = ($type == "string") ? "'".$value."'" : $value;
            $parse_str = str_replace("?",$value, $para,$count);
            $this->_where[] = $parse_str;
        }
    }
    function columns($para){
        //@TODO: suppot alia later.
        if(is_array($para)){
             foreach($para as $col)
                $this->_column[] = $col;
        }else
        if(is_string($para)){
            $this->_column[] = $para;
        }
    }
    function putLimit($page, $rowCount){
        $page     = ($page > 0)     ? $page     : 1;
        $rowCount = ($rowCount > 0) ? $rowCount : 1;
        //$li =  ($page > 1)? ($rowCount * ($page - 1)): 0;
        $offset = ($page-1) * $rowCount;
        $this->_limit  = "limit " .$offset.",$rowCount ";
    }
    protected function getWheres(){
        $outwhere = "";
        $len = count($this->_where);
        if($len){
            $outwhere .= " WHERE ";
           for($i = 0; $i <$len; $i++ ){
               if($i)
                  $outwhere.= " AND ";
                  $outwhere.= "( ".$this->_where[$i]." )";
           }
        }
        return $outwhere;
    }
    protected function getColumns(){
        $str = "";
        $len = count($this->_column);
        if($len){
           for($i = 0; $i <$len; $i++ ){
               if($i)
                  $str.= ", ";
                  $str.= " ".$this->_column[$i]." ";
           }
        }
        return $str;
    }
    protected function getBindParamColumns(){
        $str = "";
        $len = count($this->_column);
        if($len){
           for($i = 0; $i <$len; $i++ ){
               if($i)
                  $str.= ", ";
                $str.= " ? ";
           }
        }
        return $str;
    }
}
?>
