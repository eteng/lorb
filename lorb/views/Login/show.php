<?php

?>
<html>
<head>
<script type="text/javascript">
    function doLogin(){

    }
</script>
<style type="text/css" >
    .busy{
	position: absolute;
	top: 10px;
	right: 10px;
	background-color: red;
	width: 80px;
	padding: 4px;
	display: none;
  }
  .errorbox {
	padding: 8px;
	border: 1px solid #ff0000;
	display: none;
}

</style>  
</head>
<body>
	<!-- THE ERROR MESSAGES -->
	<div id="messages" class="errorbox"></div>
	<br />

	<!-- THE FORM -->
	<form action="" method="post" onSubmit="doLogin(); return false;">

		<fieldset style="width: 500px;">
			<legend>Enter Login Credentials</legend>

			<table width="400" border="0" cellspacing="0" cellpadding="2">
				<tr>
					<td><label for="username">Username:</label></td>
					<td><input type="text" name="username" id="username" size="40" tabindex="1"></td>
				</tr>
				<tr>
					<td><label for="password">Password:</label></td>
					<td><input type="text" name="password" id="password" size="40" tabindex="2"></td>
				</tr>
				<tr>
					<td><label for="email">E-mail:</label></td>
					<td><input type="text" name="email" id="email" size="40" tabindex="3"></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td><input type="submit" value="  login  ">&nbsp;<input type="reset" value="  reset  "></td>
				</tr>
			</table>
		</fieldset>
	</form>
	<div id="AjaxBusy" class="busy">Please wait while loading</div>
</body>
</html>