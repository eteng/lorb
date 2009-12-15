<?php

class ArrayHelpers{
/**
*this function converts simpleXMLElement collection to Array
* Colloection
*@param SimpleXMLElement xml: a coloction of simpleXMLElement 
*/
static function XMLToArray(SimpleXMLElement $xml){
  $ar_col = array();
  $ark  = $xml->attributes();
  foreach($ark as $a => $b ){
	$ar_col[(string)$a] = (string)$b;
  }
  return $ar_col;
}

static function XMLElemToArray(SimpleXMLElement $xml, $depth=-1){
	
	$x = self::XMLToArray($xml);
	foreach($xml->children() as $child){		
		$x[$child->getName()] = self::XMLElemToArray($child);
	}
	return $x;
}


}
?>