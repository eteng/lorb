<?php

/**
 * a function used to import library classes
 *
 * @param string $path to the file to include without the .php extention
 * @return include_once of the path specified
 */
function import($path){
	$path = str_replace('.',"\\",$path);
	$path = dirname(__FILE__).'\\'.$path.".php";
	return include_once "{$path}";
}
function need($path){
	$path = str_replace('.',"\\",$path);
	$path = dirname(__FILE__).'\\'.$path.".php";
	return require_once "{$path}";
}
function module($path){
    $path = str_replace('.',"\\",$path);
    return require_once MOD_PATH."{$path}.php";
}
function plugin($plath){
    $path = str_replace('.',"\\",$path);
    return require_once CONFIG_PATH.PLG_PATH."{$path}.php";
}
?>
