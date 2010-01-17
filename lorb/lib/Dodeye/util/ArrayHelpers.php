<?php

class ArrayHelpers{
/**
*this function converts simpleXMLElement collection to Array
* Colloection
*@param SimpleXMLElement xml: a coloction of simpleXMLElement 
*/
static function XMLAttrToArray(SimpleXMLElement $xml){
  $ar_col = array();
  $ark  = $xml->attributes();
  foreach($ark as $a => $b ){
	$ar_col[(string)$a] = (string)$b;
  }
  return $ar_col;
}

static function XMLElemToArray(SimpleXMLElement $xml,$depth = -1){
	
	$x = self::XMLAttrToArray($xml);	
	if($depth != 0){
	   $depth --;
	   foreach($xml->children() as $child){		
		 $x[$child->getName()] = self::XMLElemToArray($child,$depth);
	   }
	}
	return $x;
}


}
?>