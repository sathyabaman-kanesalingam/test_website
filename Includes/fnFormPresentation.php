<?php
/********* FORM PRESENTATION FUNCTIONS *********/

/*
	Function Name: textEntry
	Arguments: $display,$name,$entries,$errors,$size?
	Returns:
		one table row as string
*/
function textEntry($display,$name,$entries,$errors,$size=15)
{
	$returnVal = "
	<tr>
		<td>$display:</td>
		<td>
			<input type='text' name='$name' size='$size'
			value=\"" . browserString($entries[$name]) . "\">";

	if (array_key_exists($name,$errors))
	{
		$returnVal .= '<span class="Error" style="white-space:nowrap">* ' .
				$errors[$name] .
			'</span>';
	}

	$returnVal .= "</td>
	</tr>";

	return $returnVal;
}

/*
	Function Name: pwEntry
	Arguments: $pw1,$pw2,$errors,$size?
	Returns:
		table rows as string
*/
function pwEntry($pw1,$pw2,$errors,$size=10)
{
	$returnVal = "
	<tr>
		<td>Password:</td>
		<td>
			<input type='password' name='$pw1' size='$size'>
		</td>
	</tr>
	<tr>
		<td>Repeat Password:</td>
		<td>
			<input type='password' name='$pw2' size='$size'>
		</td>
	</tr>";

	if (array_key_exists('Password',$errors))
	{
		$returnVal .= addErrorRow('Password',$errors);
	}
	return $returnVal;
}

/*
	Function Name: textAreaEntry
	Arguments: $display,$name,$entries,$errors,$cols?,$rows?
	Returns:
		table rows as string
*/
function textAreaEntry($display,$name,$entries,$errors,$cols=45,$rows=5)
{
	$returnVal = "
	<tr>
		<td colspan='2'>$display:</td>
	</tr>
	<tr>
		<td colspan='2'>
			<textarea name='$name' cols='$cols' rows='$rows'>";
			$returnVal .= $entries[$name];
			$returnVal .= "</textarea>
		</td>
	</tr>";

	if (array_key_exists($name,$errors))
	{
		$returnVal .= addErrorRow($name,$errors);
	}
	return $returnVal;
}

/*
	Function Name: radioEntry
	Arguments: $display,$name,$entries,$errors,$values
	Returns:
		table rows as string
*/
function radioEntry($display,$name,$entries,$errors,$values)
{
	$returnVal = "
	<tr>
		<td>$display:</td>
		<td>";
		foreach ($values as $value)
		{
			if (array_key_exists($name,$entries) &&
					$entries[$name]==$value)
			{
				$returnVal .= "<input type='radio' name='$name'
							value='$value' checked> $value ";
			}
			else
			{
				$returnVal .= "<input type='radio' name='$name'
							value='$value'> $value ";
			}
		}
	$returnVal .= "</td></tr>";

	if (array_key_exists($name,$errors))
	{
		$returnVal .= addErrorRow($name,$errors);
	}
	return $returnVal;
}

/*
	Function Name: selectEntry
	Arguments: $display,$name,$entries,$errors,$selected?
	Returns:
		table rows as string
*/
function selectEntry($display,$name,$options,$errors,$selected=0)
{
	$returnVal = "<tr>
		<td>$display:</td>
		<td>
			<select name='$name'>
			<option value='0'>Choose one...</option>";
			foreach ($options as $key=>$option)
			{
				if ($key == $selected)
				{
					$returnVal .= "<option value='$key' selected>
								$option</option>";
				}
				else
				{
					$returnVal .= "<option value='$key'>
								$option</option>";
				}
			}
			$returnVal .= "</select>
		</td>
		</tr>";

		if (array_key_exists($name,$errors))
		{
			$returnVal .= addErrorRow($name,$errors);
		}
	return $returnVal;
}

/*
	Function Name: selectDateEntry
	Arguments: $display,$namePre,$month,$day,$year
	Returns:
		table rows as string
*/
function selectDateEntry($display,$namePre,$month,$day,$year,$errors)
{
	$returnVal = "<tr>
		<td>$display:</td>
		<td>
			<select name='$namePre" . "Month'>";
			for ($i=1; $i<=12; $i++)
			{
				if ($i == $month)
				{
					$returnVal .= "<option value='$i' selected>";
				}
				else
				{
					$returnVal .= "<option value='$i'>";
				}
				$returnVal .= monthAsString($i) . "</option>";
			}
			$returnVal .= "</select>
			<select name='$namePre" . "Day'>";
			for ($i=1; $i<=31; $i++)
			{
				if ($i == $day)
				{
					$returnVal .= "<option value='$i' selected>";
				}
				else
				{
					$returnVal .= "<option value='$i'>$i</option>";
				}
				$returnVal .= "$i</option>";
			}
			$returnVal .= "</select>
			<select name='$namePre" . "Year'>";
			for ($i=date('Y'); $i>=1900; $i=$i-1)
			{
				if ($i == $year)
				{
					$returnVal .= "<option value='$i' selected>";
				}
				else
				{
					$returnVal .= "<option value='$i'>$i</option>";
				}
				$returnVal .= "$i</option>";
			}
			$returnVal .= "</select>
		</td>
	</tr>";

	if (array_key_exists($namePre . 'Date',$errors))
	{
		$returnVal .= addErrorRow($namePre . 'Date',$errors);
	}
	return $returnVal;
}

/*
	Function Name: addErrorRow
	Arguments: $name
	Returns:
		table row as string
*/
function addErrorRow($name,$errors)
{
	$errorRow = "<tr>
				<td colspan='2' class='Error'>* " .
					$errors[$name] .
				"</td>
			</tr>";
	return $errorRow;
}
?>
