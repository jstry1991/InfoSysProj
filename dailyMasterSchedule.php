<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="style.css" type="text/css"></head>
<div class ="box">
	<a href ="index.html">Home</a>
</div>
<body>
<?php
include('dbconnect.php'); 
$query="SELECT DISTINCT name FROM employee WHERE job <> 'nurse' AND job <> 'janitor' ORDER BY name ASC";
$result = mysqli_query($conn,$query); 
if($result->num_rows>0){
while($row = mysqli_fetch_assoc($result)){
	echo 
	"<table>
	<tr>
	<th>name</th>
	</tr>";
	$name = $row["name"];  
	echo "<tr><td>".$row["name"]."</tr></td>";
	$query2 = "SELECT a.time, a.day FROM employee e, appointmenttime a, 
	appointments ap WHERE e.employeeID = ap.employeeID 
	AND a.appointmentID = ap.appointmentID AND e.job <> 'nurse' AND e.job <> 'janitor' 
	AND e.name = '".$name."';";
	$result2 = mysqli_query($conn,$query2); 
	echo"<table>
	<tr><th>time</th>
	<th>day</th></tr>";
	while($row2 = mysqli_fetch_assoc($result2)){
		echo "<tr><td>".$row2["time"]."</td><td>".$row2["day"]."</td></tr>";
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