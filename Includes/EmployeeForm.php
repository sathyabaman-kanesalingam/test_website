<?php
	if (array_key_exists('EmployeeID',$_POST))
	{
		$action = 'Edit';
		$formFlag = 'Updating';
	}
	else
	{
		$action = 'Add';
		$formFlag = 'Submitted';
	}
?>


<h1 align="center"><?php echo $action ?> Employee</h1>
<form method="post" action="<?php echo $action ?>Employee.php">
<input type="hidden" name="<?php echo $formFlag ?>" value="true">
<?php
if (array_key_exists('EmployeeID',$_POST))
{
	echo "<input type='hidden' name='EmployeeID' value='$employeeID'>";
}
?>
<table align="center" border="1" width="500">
	<?php
		echo textEntry('First name','FirstName',$dbEntries,$errors,15);
		echo textEntry('Last name','LastName',$dbEntries,$errors,15);
		echo textEntry('Email','Email',$dbEntries,$errors,25);
		echo textEntry('Title','Title',$dbEntries,$errors,30);
		echo radioEntry('Title of Courtesy','TitleOfCourtesy',
			$dbEntries,$errors,
			array('Dr.','Mr.','Mrs.','Ms.'));
		echo selectDateEntry('Birth date','Birth',
							$dbEntries['BirthMonth'],
							$dbEntries['BirthDay'],
							$dbEntries['BirthYear'],
							$errors);
		echo selectDateEntry('Hire date','Hire',
							$dbEntries['HireMonth'],
							$dbEntries['HireDay'],
							$dbEntries['HireYear'],
							$errors);
		echo textEntry('Address','Address',$dbEntries,$errors,50);
		echo textEntry('City','City',$dbEntries,$errors,30);
		echo textEntry('Region','Region',$dbEntries,$errors,2);
		echo textEntry('Postal Code','PostalCode',$dbEntries,$errors,10);
		echo textEntry('Country','Country',$dbEntries,$errors,5);
		echo textEntry('Home phone','HomePhone',$dbEntries,$errors,15);
		echo textEntry('Extension','Extension',$dbEntries,$errors,5);
		echo textAreaEntry('Notes','Notes',$dbEntries,$errors,50,3);
		echo selectEntry('Manager','ReportsTo',$mgrEntries,$errors,$dbEntries['ReportsTo']);
		echo pwEntry('Password1','Password2',$errors,10);
	?>
	<tr>
		<td colspan="2"><input type="submit" value="<?php echo $action ?> Employee"></td>
	</tr>
</table>
</form>
