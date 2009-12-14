<?php


$string = <<<XML
<a xmlns:b="http://www.google.com">
 <foo name="one" game="lonely">1</foo>
</a>
XML;
$dom = new domDocument();
$dom->loadXML($string);
//$xml = simplexml_load_string($string);
$xml = simplexml_import_dom($dom);
$back = XMLToArray($xml->foo);
print_r($back);



/**
*this function converts simpleXMLElement collection to Array
* Colloection
*@param SimpleXMLElement xml: a coloction of simpleXMLElement 
*/
function XMLToArray(SimpleXMLElement $xml){
  $ar_col = array();
  $ark  = $xml->attributes();
  foreach($ark as $a => $b ){
	$ar_col[(string)$a] = (string)$b;
  }
  return $ar_col;
}
echo "<br />\n".memory_get_peak_usage();
echo "<br />\n".memory_get_peak_usage(true);
echo "<br />\n".memory_get_usage();


?>