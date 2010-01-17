<?php
/**
 * Description of response
 * @author Eteng omini <e-t-e-n-g@hotmail.com>
 */
class Response {

    private $var = array(
        'contentType'=>null,
        'content'=>null,
        'ready'=>false,
       );
    function  __set($name,  $value) {
        if(array_key_exists($name, $this->var))
             $this->var[$name] = $value;
    }
    function  __get($name) {
        if(array_key_exists($name, $this->var))
             return $this->var[$name];
    }
    function ready($ready = false){
        if(is_bool($ready)){
            $this->var['ready'] = $ready;
            if($ready == true){
                $this->send();
            }
        }
    }
    function isReady(){
        return $this->var['ready'];
    }
    function send(){
        header("Content-Type: {$this->contentType}");
        print $this->content;
    }

}
?>
