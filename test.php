<!DOCTYPE html>
<html>
<body>
<?php
include('dbconnect.php');
$query = "SELECT appointmentID, cost,roomNumber FROM appointments";
$result = mysqli_query($conn,$query); 
echo 
"<table>
<tr>
<th>appointmentID</th>
<th>Cost</th>
<th>roomNumber</th>
</tr>";
if($result->num_rows>0){
while($row = mysqli_fetch_assoc($result)){
	echo "<tr><td>".$row["appointmentID"]."</td><td>".$row["cost"]. "</td><td>".$row["roomNumber"]. "</td></tr>";
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