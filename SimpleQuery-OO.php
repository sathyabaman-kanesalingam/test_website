<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title>Simple Query - OO</title>
</head>
<body>
<?php
@$db = new mysqli('localhost','root','pwdpwd','Northwind');
if (mysqli_connect_errno())
{
	echo 'Cannot connect to database: ' . mysqli_connect_error();
}
else
{
	$query = 'SELECT * FROM Employees';
	$result = $db->query($query);
	$numResults = $result->num_rows;

	echo "<b>$numResults Employees</b>";
?>
	<table border="1">
	<tr>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Title</th>
		<th>Email</th>
		<th>Extension</th>
	</tr>
<?php

//just for stash testing
	while ($row = $result->fetch_assoc())
	{
		echo '<tr>';
		echo '<td>' . $row['FirstName'] . '</td>';
		echo '<td>' . $row['LastName'] . '</td>';
		echo '<td>' . $row['Title'] . '</td>';
		echo '<td>' . $row['Email'] . '</td>';
		echo '<td align="right">x' . $row['Extension'] . '</td>';
		echo '</tr>';
	}
?>
	</table>
<?php
	$result->free();
	$db->close();
}
?>
</body>
</html>
