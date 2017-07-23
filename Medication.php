<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="style.css" type="text/css"></head>
<body>
	<?php
	include('dbconnect.php');
$query ="SELECT * FROM medication";
$result = mysqli_query($conn,$query);
echo
"<table>
<tr>
	<th> dateFilled </th>
	<th> directions </th>
	<th> drugName </th>
	<th> employeeID </th>
	<th> form </th>
	<th> medicationID </th>
	<th> numberOfRefills </th>
	<th> originalDate </th>
	<th> patientID </th>
	<th> quantity </th>
	<th> strength </th>
</tr>";
if ($result->num_rows > 0) {
while ($row = mysqli_fetch_assoc($result)){ //Creates a loop through results
	if ($row)
		echo "<tr><td>".$row["dateFilled"]."</td><td>".$row["directions"]."</td><td>".$row["drugName"]."</td><td>".$row["employeeID"]
	."</td><td>".$row["form"]."</td><td>".$row["medicationID"]."</td><td>".$row["numberOfRefills"]."</td><td>".$row["originalDate"]
	."</td><td>".$row["patientID"]."</td><td>".$row["quantity"]."</td><td>".$row["strength"]."</td></tr>";
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