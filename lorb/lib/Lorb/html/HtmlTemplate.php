<?php
/**A class that reas a template and
 * sets the different values
 */
class HtmlTemplate{
	var $template;
	var $html;
	var $parameters = array();

	function HtmlTemplate($template){
		$this->identifyTemplate($template);
	}
	function identifyTemplate($template){
		$this->template = $template;
	}
	function setParameter($varable,$value){
		$this->parameters[$varable] = $value;
	}
    function replaceTags($params){
        foreach($params as $key => $value){
          $this->parameters[$key] = $value; 
        }
    }
    function createPage(){
		$this->html = implode("",(file($this->template)));
		foreach($this->parameters as $key => $value){
			$template_name = '{'.$key.'}';
            if($value instanceof Module){
               $this->html = str_replace($template_name,$value->moduleDisplay(),$this->html);
            }else
              $this->html = str_replace($template_name,$value,$this->html);
		}
		return $this->html;
	}
}
?>