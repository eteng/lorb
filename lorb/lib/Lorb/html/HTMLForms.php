<?php

need('database.Mysql');//mysql class
need('util.basic');//basic function
/**
 * a class used in handling all operations about forms and validation
 *
 * @author sampris
 */
class HTMLForms{
    var $errors = array();
    var $formparams;
    private $inputs = array();
    static $singleIns;
public function  __construct($formparams){
  $this->formparams = $formparams;
}
public function addInput($params,$tag='p'){
    $temp = ($tag=='br')?"":($tag=="")?"":"<{$tag}>";
    $temp .="\n<input ";
    foreach($params as $attr => $value){
        $temp .= " {$attr} = "."\"{$value}\"";
    }
    $temp .="  />";
    $temp .= ($tag=='br')?"<br />":($tag=="")?"":"</{$tag}>";
    $this->inputs[] = $temp;
    return $this;
}
public function makeForm(){
    foreach($this->formparams as $attr => $value)
      $fm .= " {$attr} = "."\"{$value}\"";
    $fm = "<form".$fm." >";
    $count = count($this->inputs);
    for($i = 0; $i < $count ; $i++)
      $fm .= $this->inputs[$i];
    $fm.="\n</form>";
    return $fm;
}
public function get_error_count(){
        return count($this->errors);
}
    /*this function is used to validted posted form data and field
     * @param $required_fields an array of the required data
     * @param $fieldWithLenght an optional associative array of fildname pointing to size
     *        ex: username => 30
     * @return true if the post value passed the validation or else false
     */
    public static function is_Posted_form_valid($required_fields,$fieldWithLenght = null){
        foreach($required_fields as $fieldname){
            if(!isset($_POST[$fieldname]) ||(empty($_POST[$fieldname]) &&
                $_POST[$fieldname] !=0) ){ // incase of radio button value of zero which is empty
                $this->errors[] = $fieldname;
            }
        }
        if(!is_null($fieldWithLenght)){
            foreach($fieldWithLenght as $fieldname => $maxlength){
            $cleanedText = trim(Mysql::mysqlClean($_POST[$fieldname]));
            if(strlen($cleanedText) > $maxlength || strlen($cleanedText)==0)
               $this->errors[] = $fieldname;
            }
        }
        if(!empty($this->errors))return false;
        else return true;
    }
    /** Form dave@addedbytes.com.
     * AddedBytes.com is the online playground of Dave Child
     * @param string $email
     * @return boolean if true or false 
     */
    public static function check_email_address($email) {
    // First, we check that there's one @ symbol, and that the lengths are right
    if (!ereg("^[^@]{1,64}@[^@]{1,255}$", $email)) {
        // Email invalid because wrong number of characters in one section, or wrong number of @ symbols.
        return false;
    }
    // Split it into sections to make life easier
    $email_array = explode("@", $email);
    $local_array = explode(".", $email_array[0]);
    for ($i = 0; $i < sizeof($local_array); $i++) {
         if (!ereg("^(([A-Za-z0-9!#$%&'*+/=?^_`{|}~-][A-Za-z0-9!#$%&'*+/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$", $local_array[$i])) {
            return false;
        }
    }
    if (!ereg("^\[?[0-9\.]+\]?$", $email_array[1])) { // Check if domain is IP. If not, it should be valid domain name
        $domain_array = explode(".", $email_array[1]);
        if (sizeof($domain_array) < 2) {
                return false; // Not enough parts to domain
        }
        for ($i = 0; $i < sizeof($domain_array); $i++) {
            if (!ereg("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$", $domain_array[$i])) {
                return false;
            }
        }
    }
    return true;
}
}
?>
