<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="style.css" type="text/css"></head>
<body>
	<?php
	include('dbconnect.php');
$query ="SELECT * FROM patient";
$result = mysqli_query($conn,$query);
echo
"<table>
<tr>
	<th> address </th>
	<th> dateOfBirth</th>
	<th> name </th>
	<th> phoneNumber </th>
	<th> patientID </th>
	<th> sex </th>
</tr>";
if ($result->num_rows > 0) {
while ($row = mysqli_fetch_assoc($result)){ //Creates a loop through results
	if ($row)
		echo "<tr><td>".$row["address"]."</td><td>".$row["dateOfBirth"]."</td><td>".$row["name"]."</td><td>".$row["phoneNumber"]
	."</td><td>".$row["patientID"]."</td><td>".$row["sex"]."</td></tr>";
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