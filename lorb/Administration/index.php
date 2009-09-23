<?php
/**
 * @author Eteng omini <e-t-e-n-g@hotmail.com>
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title> Administration</title>
	<style>
	 body{background:#555;}
	.login{width:300px;border:1px solid; text-align:left;padding:0px 0px 100px 100px;background:#666;}
	.login h2{background:#433;color:#fff;font-family:validi, helvertica;border:1px inset #000; border-right:none;}
	.login form{text-align:left;}
	.login form p input{display:block}
	.submit{background:#333;color:#fff;width:200px;border:1px outset #000}
	</style>
  </head>
  <body>
	<center>
	<div class="login">
	<h2>Login Form</h2>
	<form method="post" action="index.php">
		<p>Username <input type="text" value="" /></p>
		<p>Password	<input type="password" /></p>
		<input class="submit" type="submit" value="Login" />
	</form>
	</div>
	</center>
  </body>
</html>
