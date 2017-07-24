<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="style.css" type="text/css"></head>
<a href ="index.html">Home</a>
<body>
<?php
include('dbconnect.php'); 
$query = "SELECT *, em.name as em_name,p.name as p_name FROM labtest l INNER JOIN employee em ON l.employeeID=em.employeeID INNER JOIN patient p ON l.patientID=p.patientID";
$result = mysqli_query($conn,$query); 
echo 
"<table>
<tr>
<th>employeeID</th>
<th>patientID</th>
<th>result</th>
<th>testDate</th>
<th>testID</th>
<th>testTime</th>
<th>testType</th>
<th>cost</th>
</tr>";
if($result->num_rows>0){
while($row = mysqli_fetch_assoc($result)){
	if($row)
		echo "<tr><td>".$row["em_name"]."</td><td>".$row["p_name"]."</td><td>".$row["result"]."</td><td>".$row["testDate"]."</td><td>".$row["testID"]
	."</td><td>".$row["testTime"]."</td><td>".$row["testType"]."</td><td>".$row["cost"]."</td></tr>";
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