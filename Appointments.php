<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="style.css" type="text/css"></head>
<div class ="box">
<a href ="index.html">Home</a>
</div>
<body>
	<?php
	include('dbconnect.php');
$query ="SELECT * FROM appointments";
$result = mysqli_query($conn,$query);
echo
"<table>
<tr>
	<th> appointmentID</th>
	<th> cost</th>
	<th> description</th>
	<th> roomNumber</th>
	<th> visitType</th>
	<th> employeeID</th>
	<th> patientID</th>
	<th> diagnosis</th>
	<th> procedureID</th>
</tr>";
if ($result->num_rows > 0) {
while ($row = mysqli_fetch_assoc($result)){ //Creates a loop through results
	if ($row)
		echo "<tr><td>".$row["appointmentID"]."</td><td>".$row["cost"]."</td><td>".$row["description"]
	."</td><td>".$row["roomNumber"]."</td><td>".$row["visitType"]."</td><td>".$row["employeeID"]."</td><td>".$row["patientID"]
	."</td><td>".$row["diagnosis"]."</td><td>".$row["procedureID"]."</td></tr>";
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