<?php
/**
 * Description of Alice
 * @author Eteng Omini <e-t-e-n-g@hotmail.com> 
 */
abstract class Alice {
    private $pkey;
    private $tbl_name;
    function model($param){
        extract($param);
        $this->fkey = fkey;
        $this->pkey = pkey;
    }
    function getPk(){
        return $this->pkey;
    }
    function setPk($param){
        $this->pkey = $param;
    }
    function getTableName(){
        return $this->tbl_name;
    }
    function setTableName($param){
        $this->tbl_name = $param;
    }
}
?>
