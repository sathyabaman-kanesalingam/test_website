<?php
	$dbEntries = $_POST;
	foreach ($dbEntries as &$entry)
	{
		$entry = dbString($entry);
	}

	@$db = new mysqli('localhost','root','pwdpwd','Northwind');
	if (mysqli_connect_errno())
	{
		echo 'Cannot connect to database: ' . mysqli_connect_error();
	}
	$query = "INSERT INTO Employees
		(FirstName, LastName, Title,
			TitleOfCourtesy, Email, BirthDate, HireDate,
			Address, City, Region, PostalCode, Country,
			HomePhone, Extension, Notes, ReportsTo, Password)
		VALUES ('" .	$dbEntries['FirstName'] . "','" .
						$dbEntries['LastName'] . "','" .
						$dbEntries['Title'] . "','" .
						$dbEntries['TitleOfCourtesy'] . "','" .
						$dbEntries['Email'] . "','" .
						$dbEntries['BirthYear'] . "-" .
					 		$dbEntries['BirthMonth'] . "-" .
					 		$dbEntries['BirthDay'] . "','" .
						$dbEntries['HireYear'] . "-" .
					 		$dbEntries['HireMonth'] . "-" .
					 		$dbEntries['HireDay'] . "','" .
						$dbEntries['Address'] . "','" .
						$dbEntries['City'] . "','" .
						$dbEntries['Region'] . "','" .
						$dbEntries['PostalCode'] . "','" .
						$dbEntries['Country'] . "','" .
						$dbEntries['HomePhone'] . "','" .
						$dbEntries['Extension'] . "','" .
						$dbEntries['Notes'] . "'," .
						$dbEntries['ReportsTo'] . ",'" .
						$dbEntries['Password1'] . "')";

	if ($db->query($query))
	{
		echo '<div align="center">Employee Added</div>
			<a href="EmployeeReport.php">Employee Report</a>';
		$showForm = false;
	}
	else
	{
		echo '<div align="center">Insert failed</div>';
	}
?>
