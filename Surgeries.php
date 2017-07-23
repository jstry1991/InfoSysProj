<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="style.css" type="text/css"></head>
<body>
	<?php
	include('dbconnect.php');
$query ="SELECT * FROM surgeries";
$result = mysqli_query($conn,$query);
echo
"<table>
<tr>
	<th> nurseID </th>
	<th> SurgeryID </th>
	<th> notes </th>
	<th> appointmentID </th>
	</tr>";
if ($result->num_rows > 0) {
while ($row = mysqli_fetch_assoc($result)){ //Creates a loop through results
	if ($row)
		echo "<tr><td>".$row["nurseID"]."</td><td>".$row["SurgeryID"]."</td><td>".$row["notes"]."</td><td>".$row["appointmentID"]."</td></tr>";
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