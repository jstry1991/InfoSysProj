<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="style.css" type="text/css"></head>
<body>
	<?php
	include('dbconnect.php');
$query="SELECT *, e.name as e_name 
		FROM appointments a 
		INNER JOIN employee e ON e.employeeID=a.employeeID 
		INNER JOIN appointmenttime ap ON ap.appointmentID = a.appointmentID
		INNER JOIN surgeries s ON s.appointmentID = a.appointmentID";
$result = mysqli_query($conn,$query);
echo
"<table>
<tr>
	<th>surgons name</th>
	<th>day</th>
	<th>date</th>
	<th>time</th>
</tr>";
if ($result->num_rows > 0) {
while ($row = mysqli_fetch_assoc($result)){ //Creates a loop through results
	if ($row){
		echo "<tr><td>".$row["e_name"]."</td><td>".$row["day"]."</td><td>".$row["date"]."</td><td>".$row["time"]."</td></tr>";
	}
else {
	echo "DIDN'T FIND ANYTHING";
}
}
}
echo 
"</table>";

include('dbclose.php'); 
?>
</body>
</html>