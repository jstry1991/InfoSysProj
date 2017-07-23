<!DOCTYPE html>
<html>
<body>
	<?php
	include('dbconnect.php');
$query ="SELECT * FROM schedule";
$result = mysqli_query($conn,$query);
echo
"<table>
<tr>
	<th> emergencyCall | </th>
	<th> scheduleID | </th>
	<th> employeeID | </th>
	<th> date | </th>
	<th> Monday | </th>
	<th> Tuesday | </th>
	<th> Wednesday | </th>
	<th> Thursday | </th>
	<th> Friday | </th>
	<th> Saturday| </th>
	<th> Sunday | </th>
</tr>";
if ($result->num_rows > 0) {
while ($row = mysqli_fetch_assoc($result)){ //Creates a loop through results
	if ($row)
		echo "<tr><td>".$row["emergencyCall"]."</td><td>".$row["scheduleID"]."</td><td>".$row["employeeID"]."</td><td>".$row["date"]
	."</td><td>".$row["Mon"]."</td><td>".$row["Tue"]."</td><td>".$row["Wed"]."</td><td>".$row["Thu"]
	."</td><td>".$row["Fri"]."</td><td>".$row["Sat"]."</td><td>".$row["Sun"]."</td></tr>";
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