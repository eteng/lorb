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
static function xml2Array(SimpleXMLElement $xml,&$x, $depth = -1){
	   foreach($xml->children() as $child){
                 $c = self::xml2Array($child,$c,$depth);
		 $x[$child->getName()] = $c;
           }
	return $x;
}
//@TODO: fiture out a way out of here..
static function ArrayToXMLRow(SimpleXMLElement $xml,$param,$node="row",$depth = -1){

	if($depth != 0){
	   $depth --;
            if(is_array($param)){
                foreach($param as $rk => $rv){
                        if(is_int($rk))
                            $rk = $node;
                        $xl = $xml->addChild($rk);
                        $rv = self::ArrayToXMLRow($xl,$rv,$node, $depth);
                }
            }else
                $xml[0] = $param;
	}

	//return $param;
}
//@TODO: fiture out a way out of here..
static function ArrayToXml(SimpleXMLElement $xml,$params,$resp,$depth = -1){
		//preparing the reponse attribute
		if(is_array($resp)){
			foreach($resp as $rk => $rv){
				$xml->addAttribute($rk,$rv);
			}
		}
		//preparing the reponse children
		if(is_array($params)){
			foreach($params as $rk => $rv){
				$xml->addChild($rk,$rv);
			}
		}
		return $xml;
   }
}
?>