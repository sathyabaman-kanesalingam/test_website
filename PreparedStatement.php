<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<meta description="just a description">
<title>Prepared Statement</title>
</head>
<body>
<?php
$companyID = $_GET['City']; //Try London

@$db = new mysqli('localhost','root','pwdpwd','Northwind');
if (mysqli_connect_errno())
{
	echo 'Cannot connect to database: ' . mysqli_connect_error();
}
else
{
	$query = 'SELECT CompanyName,ContactName,Phone
		 FROM Customers WHERE City=?';
	$stmt = $db->prepare($query);
	$stmt->bind_param('s',$companyID);
	$stmt->execute();
	$stmt->bind_result($company,$contact,$phone);
?>
	<table border="1">
	<tr>
		<th>Company</th>
		<th>Contact</th>
		<th>Phone</th>
	</tr>
<?php
	while ($stmt->fetch())
	{
		echo '<tr>';
		echo "<td>$company</td>";
		echo "<td>$contact</td>";
		echo "<td>$phone</td>";
		echo '</tr>';
	}
?>
	</table>
<?php
	$stmt->close();
	$db->close();
}
?>


//test
</body>
</html>
