<?php

pitch("Dodeye.html.TemplateExcep");
/**
 * the template class 
 * @author Eteng
 */
class Template{
    private static $baseDir = "";

    public static function getBaseDir(){
        return self::$baseDir;
    }
    public static function setBaseDir($dir = "sys/template"){
        self::$baseDir = $dir;
    }
    public static function display($_path,$vars = array()){
        print self::getPayLoad($_path, $vars);
    }
    public static function getPayLoad($_path,$vars = array()){
        $rut = self::getBaseDir();
        $t_path = $rut.DIRECTORY_SEPARATOR.$_path;
        //validations here
        if(!file_exists($t_path)){
           throw new TemplateExcep(TemplateExcep::FileNotFound.$_path,
                   TemplateExcep::NotFound);
        }
        return self::prcessTempFile($t_path,$vars);
    }
    public static function prcessTempFile($_path, $vars = array()){
        extract($vars,EXTR_OVERWRITE);
        //start output buffering
        $_templ ="";
        ob_start();
        require "{$_path}";
        $_templ = ob_get_contents();
        ob_end_clean();
        return $_templ;
    }
}
?>
