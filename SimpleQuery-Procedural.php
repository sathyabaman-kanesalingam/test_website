<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title>Simple Query - Procedural</title>
</head>
<body>
<?php
@$db = mysqli_connect('localhost','root','pwdpwd','Northwind');
if (mysqli_connect_errno())
{
	echo 'Cannot connect to database: ' . mysqli_connect_error();
}
else
{
	$query = 'SELECT * FROM Employees';
	$result = mysqli_query($db,$query);
	$numResults = mysqli_num_rows($result);

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
	while ($row = mysqli_fetch_assoc($result))
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
	mysqli_free_result($result);
	mysqli_close($db);
}
?>
</body>
</html>
