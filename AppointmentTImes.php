<!DOCTYPE html>
<html>
<body>
	<?php
	include('dbconnect.php');
$query ="SELECT * FROM appointmenttime";
$result = mysqli_query($conn,$query);
echo
"<table>
<tr>
	<th> day | </th>
	<th> time | </th>
	<th> appTimeID | </th>
	<th> date | </th>
	<th> appointmentID | </th>
</tr>";
if ($result->num_rows > 0) {
while ($row = mysqli_fetch_assoc($result)){ //Creates a loop through results
	if ($row)
		echo "<tr><td>".$row["day"]."</td><td>".$row["time"]."</td><td>".$row["appTimeID"]."</td><td>".$row["date"]
	."</td><td>".$row["appointmentID"]."</td></tr>";
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