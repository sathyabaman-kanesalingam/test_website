<?php
	$employeeID = $_POST['EmployeeID'];

	$query = "SELECT FirstName, LastName, Title, 
			TitleOfCourtesy, Email, 
			MONTH(BirthDate) AS BirthMonth,
			DAYOFMONTH(BirthDate) AS BirthDay,
			YEAR(BirthDate) AS BirthYear,
			MONTH(HireDate) AS HireMonth,
			DAYOFMONTH(HireDate) AS HireDay,
			YEAR(HireDate) AS HireYear,
			Address, City, Region, PostalCode, Country,
			HomePhone, Extension, Notes, ReportsTo, Password
			FROM Employees
			WHERE EmployeeID = $employeeID";
	$result = $db->query($query);
	$dbEntries = $result->fetch_assoc();
						
	$result->free();
?>
