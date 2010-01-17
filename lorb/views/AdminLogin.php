<html>
 <head>
    <title>Lorb Administration</title>
    <link href="<?php $css('soulleave/css/admin');?>" type="text/css" rel="stylesheet">
    <link rel="shortcut icon" type="image/ico" href="<?php echo $favicon ?>" >
  </head>
  <body>
	<center>
	<div class="login">
	<h2>Administration Login</h2>
        <form method="post" action="<?php echo $url_login ?>">
            <p>Username <input type="text" value="" name="username" /></p>
            <p>Password <input type="password" name="password" /></p>
            <input class="submit" type="submit" value="Login" name="submit"/>
        <input class="submit" type="reset" value="reset" />
	</form>
	</div>
	</center>
  </body>
</html>