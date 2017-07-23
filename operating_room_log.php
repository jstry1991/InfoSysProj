<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="style.css" type="text/css"></head>
<body>
	<?php
	include('dbconnect.php');
$query="SELECT *, e.name as e_name, p.name as p_name, n.name as n_nurse 
		FROM appointments a 
		INNER JOIN employee e ON e.employeeID=a.employeeID
		INNER JOIN patient p ON p.patientID = a.patientID 
		INNER JOIN appointmenttime ap ON ap.appointmentID = a.appointmentID 
		INNER JOIN surgeries s ON s.appointmentID = a.appointmentID
		INNER JOIN employee n ON n.employeeID=s.nurseID"; 
$result = mysqli_query($conn,$query);
echo
"<table>
<tr>
	<th>surgons name</th>
	<th>patient name</th>
	<th>nurse name</th>
	<th>date</th>
	<th>time</th>
	<th>day</th>
	<th>diagnosis</th>
	<th>description</th>
	<th>roomNumber</th>
	<th>cost</th>
	<th>notes</th>
</tr>";
if ($result->num_rows > 0) {
while ($row = mysqli_fetch_assoc($result)){ //Creates a loop through results
	if ($row)
		echo "<tr><td>".$row["e_name"]."</td><td>".$row["p_name"]."</td><td>".$row["n_nurse"]
	."</td><td>".$row["date"]."</td><td>".$row["time"]."</td><td>".$row["day"]."</td><td>"
	.$row["diagnosis"]."</td><td>".$row["description"]."</td><td>".$row["roomNumber"]."</td><td>".$row["cost"].
	"</td><td>".$row["notes"]."</td></tr>";
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