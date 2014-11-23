<?php
	require 'Includes/fnFormValidation.php';
	require 'Includes/fnFormPresentation.php';
	require 'Includes/fnStrings.php';
	require 'Includes/fnDates.php';
	require 'Includes/init.php';
	@$db = new mysqli('localhost','root','pwdpwd','Northwind');
	if (mysqli_connect_errno())
	{
		echo 'Cannot connect to database: ' . mysqli_connect_error();
	}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title>Edit Employee</title>
<style type="text/css">
	.Error {color:red; font-size:smaller;}
</style>
</head>
<body>
<?php
	require 'Includes/Header.php';

	if (array_key_exists('Updating',$_POST))
	{
		require 'Includes/ProcessEmployee.php';
	}

	require 'Includes/EmployeeData.php';
	require 'Includes/EmployeeForm.php';

	require 'Includes/Footer.php';

	$db->close();
?>
</body>
</html>
