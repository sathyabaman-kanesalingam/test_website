<?php
	$dbEntries = $_POST;
	foreach ($dbEntries as &$entry)
	{
		$entry = dbString($entry);
	}
	$dbEntries['Title'] = ucwords($dbEntries['Title']);

	if (!checkLength($_POST['FirstName']))
	{
		$errors['FirstName'] = 'First name omitted.';
	}
	else
	{
		$browserEntries['FirstName'] = browserString($_POST['FirstName']);
	}

	if (!checkLength($_POST['LastName']))
	{
		$errors['LastName'] = 'Last name omitted.';
	}
	else
	{
		$browserEntries['LastName'] = browserString($_POST['LastName']);
	}

	if (!checkLength($_POST['Title']))
	{
		$errors['Title'] = 'Title omitted.';
	}
	else
	{
		$browserEntries['Title'] = ucwords(browserString($_POST['Title']));
	}

	if ( array_key_exists('TitleOfCourtesy',$_POST) )
	{
		$browserEntries['TitleOfCourtesy'] = browserString($_POST['TitleOfCourtesy']);
		$dbEntries['TitleOfCourtesy'] = dbString($_POST['TitleOfCourtesy']);
	}
	else
	{
		$errors['TitleOfCourtesy'] = 'Title of Courtesy not selected.';
	}

	if (!checkdate($_POST['BirthMonth'],$_POST['BirthDay'],$_POST['BirthYear']))
	{
		$errors['BirthDate'] = 'Birth date is not a valid date.';
	}

	if (!checkdate($_POST['HireMonth'],$_POST['HireDay'],$_POST['HireYear']))
	{
		$errors['HireDate'] = 'Hire date is not a valid date.';
	}

	if (!checkLength($_POST['Address'],5,200))
	{
		$errors['Address'] = 'Address omitted.';
	}
	else
	{
		$browserEntries['Address'] = browserString($_POST['Address']);
	}

	if (!checkLength($_POST['City'],1,100))
	{
		$errors['City'] = 'City omitted.';
	}
	else
	{
		$browserEntries['City'] = browserString($_POST['City']);
	}

	if (!checkLength($_POST['Region'],2,2) && !checkLength($_POST['Region'],0,0))
	{
		$errors['Region'] = 'Region name must be two characters.';
	}
	else
	{
		$browserEntries['Region'] = browserString($_POST['Region']);
	}

	if (!checkLength($_POST['PostalCode']))
	{
		$errors['PostalCode'] = 'Postal Code omitted.';
	}
	else
	{
		$browserEntries['PostalCode'] = browserString($_POST['PostalCode']);
	}

	if (!checkLength($_POST['Country']))
	{
		$errors['Country'] = 'Country omitted.';
	}
	else
	{
		$browserEntries['Country'] = browserString($_POST['Country']);
	}

	if (!checkLength($_POST['HomePhone'],10,15))
	{
		$errors['HomePhone'] = 'Home phone must be between 10 and 15 characters.';
	}
	else
	{
		$browserEntries['HomePhone'] = browserString($_POST['HomePhone']);
	}

	if (!checkLength($_POST['Extension'],3,5))
	{
		$errors['Extension'] = 'Extension must be between 3 and 5 characters.';
	}
	else
	{
		$browserEntries['Extension'] = browserString($_POST['Extension']);
	}

	if (!checkLength($_POST['Notes'],0,500))
	{
		$errors['Notes'] = 'Notes must be fewer than 100 characters:<br>
			<span style="color:blue; font-weight:normal">' .
			browserString(substr($_POST['Notes'],0,100)) .
			'</span><span style="color:red; font-weight:normal;
			text-decoration:line-through;">' .
			browserString(substr($_POST['Notes'],100)) .
			'</span>';
	}
	else
	{
		$browserEntries['Notes'] = browserString($_POST['Notes']);
	}

	if ($_POST['ReportsTo'] == 0)
	{
		$errors['ReportsTo'] = 'Manager not selected.';
	}
	else
	{
		$browserEntries['ReportsTo'] = $_POST['ReportsTo'];
	}

	if (array_key_exists('EmployeeID',$_POST))
	{
		$pwCheckLen = false;
	}
	else
	{
		$pwCheckLen = true;
	}

	if ( !checkPassword($_POST['Password1'],$_POST['Password2'],$pwCheckLen) )
	{
		$errors['Password'] = 'Passwords do not match or are not the right length.';
	}
	else
	{
		$browserEntries['Password'] = browserString($_POST['Password1']);
	}

	if ( !checkEmail($_POST['Email']) )
	{
		$errors['Email'] = 'Email is invalid.';
	}
	else
	{
		$browserEntries['Email'] = browserString($_POST['Email']);
	}
?>
<?php
	if (!count($errors) && array_key_exists('EmployeeID',$_POST))
	{
		$employeeID = $_POST['EmployeeID'];
		$query = "UPDATE Employees
				SET FirstName='" . $dbEntries['FirstName'] . "',
				LastName='" . $dbEntries['LastName'] . "',
				Title='" . $dbEntries['Title'] . "',
				TitleOfCourtesy='" . $dbEntries['TitleOfCourtesy'] . "',
				Email='" . $dbEntries['Email'] . "',
				BirthDate='" . $dbEntries['BirthYear'] . '-' .
					 $dbEntries['BirthMonth'] . '-' .
					 $dbEntries['BirthDay'] . "',
				HireDate='" . $dbEntries['HireYear'] . '-' .
					 $dbEntries['HireMonth'] . '-' .
					 $dbEntries['HireDay'] . "',
				Address='" . $dbEntries['Address'] . "',
				City='" . $dbEntries['City'] . "',
				Region='" . $dbEntries['Region'] . "',
				PostalCode='" . $dbEntries['PostalCode'] . "',
				Country='" . $dbEntries['Country'] . "',
				HomePhone='" . $dbEntries['HomePhone'] . "',
				Extension='" . $dbEntries['Extension'] . "',
				Notes='" . $dbEntries['Notes'] . "',
				ReportsTo=" . $dbEntries['ReportsTo'];
				if (CheckLength($dbEntries['Password1']))
				{
					$query .= ", Password='" . $dbEntries['Password1'] . "'";
				}
				$query .= " WHERE EmployeeID = $employeeID";
		$db->query($query);
		echo '<div align="center">Record Updated</div>';
	}
	elseif (!count($errors))
	{
		$showForm = false;
?>
	<form method="post" action="AddEmployee.php">
	<input type="hidden" name="Confirmed" value="true">
	<?php
		echo '<h2>Confirm Entries</h2>';
		echo '<ol>';
		foreach ($browserEntries as $key=>$entry)
		{
			if ($key=="ReportsTo")
			{
				echo "<li><b>Manager:</b> $mgrEntries[$entry]</li>";
			}
			else
			{
				echo "<li><b>$key:</b> $entry</li>";
			}
		}
		echo '</ol>';

		foreach ($dbEntries as $key=>$entry)
		{
	?>
		<input type="hidden" name="<?php echo $key ?>"
			value="<?php echo $entry ?>">
	<?php
		}
	?>
		<input type="submit" value="Confirm">
	</form>
<?php
	}
	else
	{
		$dbEntries = $_POST;
	}
?>
