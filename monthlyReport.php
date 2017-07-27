<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="style.css" type="text/css"></head>
<a href ="index.html">Home</a>
<body>
	<?php
	include('dbconnect.php');
$query ="SELECT (SELECT COUNT(*) FROM appointments)as NumOfApp,(SELECT COUNT(*)FROM surgeries) as NumofSurg,(SELECT COUNT(*)FROM medication)as NumOfMed";
$result = mysqli_query($conn,$query);
echo
"<table>
<tr>
	<th> Number of Appointments </th>
</tr>";
if ($result->num_rows > 0) {
while ($row = mysqli_fetch_assoc($result)){ //Creates a loop through results
	if ($row)
		echo "<tr><td>".$row["NumOfApp"]."</td></tr>";
}
echo 
"</table>";
echo
"<table>
<tr>
	<th> Number of Surgeries</th>
</tr>";
$result = mysqli_query($conn,$query);
while ($row = mysqli_fetch_assoc($result)){ //Creates a loop through results
	if ($row)
		echo "<tr><td>".$row["NumofSurg"]."</td></tr>";
}
echo 
"</table>";
echo
"<table>
<tr>
	<th> Number of Medications Dispensed </th>
</tr>";
$result = mysqli_query($conn,$query);
while ($row = mysqli_fetch_assoc($result)){ //Creates a loop through results
	if ($row)
		echo "<tr><td>".$row["NumOfMed"]."</td></tr>";
}
echo 
"</table>";
echo
"<table>
<tr>
	<th> Tests </th>
	<th>Number of Tests</th>
</tr>";
$query="SELECT testType, COUNT(*) as testCount FROM labtest GROUP BY testType";
$result = mysqli_query($conn,$query);
while ($row = mysqli_fetch_assoc($result)){ //Creates a loop through results
	if ($row)
		echo "<tr><td>".$row["testType"]."</td><td>".$row["testCount"]."</td></tr>";
}
echo 
"</table>";
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