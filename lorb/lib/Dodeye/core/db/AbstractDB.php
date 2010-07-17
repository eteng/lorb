<?php
/** An abstract database class used for database manipulation.
 * Description of DB
 * @author etengomini.ubanga
 */
abstract class AbstractDB{

 public static function getConnString($params){

    $connString =null;
    if(strcasecmp($params['type'],'mysql')==0){
        $connString = "mysql:host={$params['host']}";
        if(isset($params['dbname']))
         $connString .= ";dbname={$params['dbname']}";
        if(isset($params['port']))
         $connString .=";port={$params['port']}";
    }
    return $connString;
}
}
?>
