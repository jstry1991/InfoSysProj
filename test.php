<!DOCTYPE html>
<html>
<body>
<?php
include('dbconnect.php'); 
$query ="SELECT e.name,e.phoneNumber,s.EmergencyCall,s.date,s.Mon,s.Tue,s.Wed,s.Thu,s.Fri,s.Sat,s.Sun FROM employee e, schedule s WHERE e.employeeID=s.employeeID";
$result = mysqli_query($conn,$query); 
echo 
"<table>
<tr>
<th>name</th>
<th>phoneNumber</th>
<th>EmergencyCall</th>
<th>date</th>
<th>Monday</th>
<th>Tuesday</th>
<th>Wednesday</th>
<th>Thursday</th>
<th>Friday</th>
<th>Saturday</th>
<th>Sunday</th>
</tr>";
if($result->num_rows>0){
while($row = mysqli_fetch_assoc($result)){
	if($row)
		echo "<tr><td>".$row["name"]."</td><<td>".$row["phoneNumber"]."</td><td>".$row["EmergencyCall"]."</td><td>".$row["date"]."</td><td>".$row["Mon"]
	."</td><td>".$row["Tue"]."</td><td>".$row["Wed"]."</td><td>".$row["Thu"]."</td><td>".$row["Fri"]."</td><td>".$row["Sat"]."</td><td>".$row["Sun"]."</td></tr>";
}}
else{
	echo "no results bro"; 
}
echo 
"<table>";

include('dbclose.php'); 
?>
</body>
</html>