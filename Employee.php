<!DOCTYPE html>
<html>
<body>
	<?php
	include('dbconnect.php');
$query ="SELECT * FROM employee";
$result = mysqli_query($conn,$query);
echo
"<table>
<tr>
	<th> address | </th>
	<th> name | </th>
	<th> phoneNumber | </th>
	<th> job | </th>
	<th> taxID | </th>
	<th> employeeID | </th>
</tr>";
if ($result->num_rows > 0) {
while ($row = mysqli_fetch_assoc($result)){ //Creates a loop through results
	if ($row)
		echo "<tr><td>".$row["address"]."</td><td>".$row["name"]."</td><td>".$row["phoneNumber"]."</td><td>".$row["job"]."</td><td>".$row["taxID"]."</td><td>".$row["employeeID"]."</td></tr>";
}
}
else {
	echo "DIDN'T FIND ANYTHING";
}
echo 
"</table>";

include('dbclose.php'); 
?>
</body>
</html>