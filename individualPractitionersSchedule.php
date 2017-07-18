<!DOCTYPE html>
<html>
<body>
<?php
include('dbconnect.php'); 
$query="SELECT name FROM employee WHERE job <> 'nurse' AND job <> 'janitor' ORDER BY name ASC";
$result = mysqli_query($conn,$query); 
echo 
"<table>
<tr>
<th>Physician</th>
<th>patients name</th>
<th>description</th>
<th>time</th>
<th>day</th>
</tr>";
if($result->num_rows>0){
while($row = mysqli_fetch_assoc($result)){
	$name = $row["name"]; 
	echo "<tr><td>".$row["name"]."</td>";
	$query2 = "SELECT a.time, a.day,p.name,ap.description FROM employee e, appointmenttime a, 
	appointments ap,patient p WHERE e.employeeID = ap.employeeID 
	AND a.appointmentID = ap.appointmentID AND e.job <> 'nurse' AND e.job <> 'janitor' AND ap.patientID = p.patientID AND e.name = '".$name."';";
	$result2 = mysqli_query($conn,$query2); 
	while($row2 = mysqli_fetch_assoc($result2)){
		if($row2 > 1){
			echo"why";
			echo "<td></td>"."<td>".$row2["name"]."</td><td>".$row2["description"]."</td><td>".$row2["time"]."</td><td>".$row2["day"]."</td></tr>";
		}
		else{
		echo "<td>".$row2["name"]."</td><td>".$row2["description"]."</td><td>".$row2["time"]."</td><td>".$row2["day"]."</td></tr>";
	}
	}
}
}
else{
	echo "no results bro"; 
}
echo 
"</table>";

include('dbclose.php'); 
?>
</body>
</html>