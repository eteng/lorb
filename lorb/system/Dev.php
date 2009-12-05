<?php
/**
 * Description of Dev
 * @author etengomini.ubanga
 * e-t-e-n-g@hotmail.com
 */
class Dev {
  static function print_a($params,$case = false){
    foreach($params as $key => $value){
        if($case) $x_str = $key." ==> ".$value."<br />";
        else echo $key." ==> ".$value."<br />";
    }
    if($case)return $x_str;
}
}
?>
