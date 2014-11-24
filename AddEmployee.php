<?php
	require 'Includes/fnFormValidation.php';
	require 'Includes/fnFormPresentation.php';
	require 'Includes/fnStrings.php';
	require 'Includes/fnDates.php';
	require 'Includes/init.php';
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title>Add New Employee</title>
<style type="text/css">
	.Error {color:red; font-size:smaller;}
</style>
</head>
<body>
<?php
	require 'Includes/Header.php';

	if (array_key_exists('Submitted',$_POST))
	{
		require 'Includes/ProcessEmployee.php';
	}
	elseif (array_key_exists('Confirmed',$_POST))
	{
		require 'Includes/InsertEmployee.php';
	}

	if ($showForm)
	{
		require 'Includes/EmployeeForm.php';
	}

	require 'Includes/Footer.php';
?>
</body>
</html>
