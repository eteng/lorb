<?php
/** An abstract database class used for database manipulation.
 * Description of DB
 *
 * @author etengomini.ubanga
 */
class DB {

    /*** the instance ***/
    private static $instance = null;
    /**making the contructor priave so that not user
     * can create an object throught it.
     */
    private function  __construct() {
      //no creating of objects here.
    }
    /**making cloning of the object inpossible
     */
    private function  __clone() {
      //no cloning allowed.
    }
    public static function getInstance(){
        if(self::$instance ==null){
            self::$instance = new PDO("");
            //@TODO:setting of PDO attribute here
        }
        return self::$instance;
    }
}
?>
