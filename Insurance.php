<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="style.css" type="text/css"></head>
<body>
	<?php
	include('dbconnect.php');
$query ="SELECT * FROM insurance";
$result = mysqli_query($conn,$query);
echo
"<table>
<tr>
	<th> company </th>
	<th> insuranceID </th>
	<th> drugID </th>
	<th> policyType </th>
	<th>patientID</th>
	</tr>";
if ($result->num_rows > 0) {
while ($row = mysqli_fetch_assoc($result)){ //Creates a loop through results
	if ($row)
		echo "<tr><td>".$row["company"]."</td><td>".$row["insuranceID"]."</td><td>".$row["drugID"]."</td><td>".$row["policyType"]."</td><td>".$row["patientID"]."</td></tr>";
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