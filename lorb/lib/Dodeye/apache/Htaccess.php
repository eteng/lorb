<?php
needs("Mysql.Mysql");

/**
 * this is is used to maniuplate the htaccess file
 * and requires the mysql class
 */
class Htaccess{
	private $filename;
	private $htaccess;
	
	public function __construct($filename = null){
		if(is_null($filename)){
			$this->filename = ".htaccess";
		}
	}
	function read(){
		
	}
	function writeOut(){
	
	if(touch($this->filename)){
	$rules = "RewriteEngine On ";
	$rules .= "\n########## Begin - Rewrite rules to block out some common exploits";
	$rules .= "\n## If you experience problems on your site block out the operations listed below";
	$rules .= "\n## This attempts to block the most common type of exploit !";
	$rules .= "\n# Block out any script trying to set a mosConfig value through the URL";
	$rules .= "\nRewriteCond %{QUERY_STRING} mosConfig_[a-zA-Z_]{1,21}(=|\%3D) [OR]";
	$rules .= "\n# Block out any script trying to base64_encode crap to send via URL";
	$rules .= "\nRewriteCond %{QUERY_STRING} base64_encode.*\(.*\) [OR]";
	$rules .= "\n# Block out any script that includes a <script> tag in URL";
	$rules .= "\nRewriteCond %{QUERY_STRING} (\<|%3C).*script.*(\>|%3E) [NC,OR]";
	$rules .= "\n# Block out any script trying to set a PHP GLOBALS variable via URL";
	$rules .= "\nRewriteCond %{QUERY_STRING} GLOBALS(=|\[|\%[0-9A-Z]{0,2}) [OR]";
	$rules .= "\n# Block out any script trying to modify a _REQUEST variable via URL";
	$rules .= "\nRewriteCond %{QUERY_STRING} _REQUEST(=|\[|\%[0-9A-Z]{0,2})";
	$rules .= "\n# Send all blocked request to homepage with 403 Forbidden error!";
	$rules .= "\nRewriteRule ^(.*)$ index.php [F,L]";
	
	$handle = fopen($filename,'w');
	//write the rules
	fwrite($handle,$rules);	
	fclose($handle);
	
	}
	}
	
}
?>