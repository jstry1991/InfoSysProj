<!DOCTYPE html>
<html>
<body>
<?php
include('dbconnect.php'); 
$query = "SELECT e.name, a.time, a.day FROM employee e, appointmenttime a, appointments ap WHERE e.employeeID = ap.employeeID AND a.appointmentID = ap.appointmentID";
$result = mysqli_query($conn,$query); 
echo 
"<table>
<tr>
<th>name</th>
<th>time</th>
<th>day</th>
</tr>";
if($result->num_rows>0){
while($row = mysqli_fetch_assoc($result)){
	if($row)
		echo "<tr><td>".$row["name"]."</td><td>".$row["time"]."</td><td>".$row["day"]."</td></tr>";
	}}
else{
	echo "no results bro"; 
}
echo 
"</table>";

include('dbclose.php'); 
?>
</body>
</html>