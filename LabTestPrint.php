<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="style.css" type="text/css"></head>
<a href ="index.html">Home</a>
<body>
	<?php
	include('dbconnect.php');
$query ="SELECT * FROM labtest";
$result = mysqli_query($conn,$query);
echo
"<table>
<tr>
	<th> cost </th>
	<th> employeeID </th>
	<th> patientID </th>
	<th> result </th>
	<th> testDate </th>
	<th> testID </th>
	<th> testTime </th>
	<th> testType </th>
</tr>";
if ($result->num_rows > 0) {
while ($row = mysqli_fetch_assoc($result)){ //Creates a loop through results
	if ($row)
		echo "<tr><td>".$row["cost"]."</td><td>".$row["employeeID"]."</td><td>".$row["patientID"]."</td><td>".$row["result"]
	."</td><td>".$row["testDate"]."</td><td>".$row["testID"]."</td><td>".$row["testTime"]."</td><td>".$row["testType"]."</td><tr>";
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