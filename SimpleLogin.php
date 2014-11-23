<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title>Login Page</title>
</head>
<body>
<?php
	require 'Includes/Header.php';

	$msg='';
	$email = '';
	if (array_key_exists('LoggingIn',$_POST))
	{
		$email = $_POST['Email'];
		$pw = $_POST['Password'];
		if ($email == 'jwayne@northwind.com' && $pw == 'cowboy')
		{
			echo '<div align="center">Success</div>';
		}
		else
		{
			echo '<div align="center">Login Failed</div>';
			unset($_POST['LoggingIn']);
		}
	}

	if (!array_key_exists('LoggingIn',$_POST))
	{
?>

<div align="center">

	<h2>Log in</h2>
	<form method="post" action="SimpleLogin.php">
	<input type="hidden" name="LoggingIn" value="true">
		<table>
		<tr>
			<td>Email:</td>
			<td><input type="text" name="Email"
					value="<?php echo $email?>" size="25"></td>
		</tr>
		<tr>
			<td>Password:</td>
			<td>
			<input type="password" name="Password" size="10">
			</td>
		</tr>
		<tr>
			<td align="right" colspan="2">
			<input type="submit" value="Log in">
			</td>
		</tr>
		</table>
	</form>
</div>
<?php
	}
	require 'Includes/Footer.php';
?>
</body>
</html>
