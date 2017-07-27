<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="style.css" type="text/css"></head>
<div class ="box">
	<a href ="index.html">Home</a>
</div>
<body>
	<?php
	include('dbconnect.php');
$query ="SELECT * FROM procedures";
$result = mysqli_query($conn,$query);
echo
"<table>
<tr>
	<th> codes </th>
	<th> otherCodes </th>
	<th> fees </th>
	<th> name </th>
	<th> procedureID </th>
	<th> other </th>
	<th> otherFee </th>
	<th> patientID </th>
	</tr>";
if ($result->num_rows > 0) {
while ($row = mysqli_fetch_assoc($result)){ //Creates a loop through results
	if ($row)
		echo "<tr><td>".$row["codes"]."</td><td>".$row["otherCodes"]."</td><td>".$row["fees"]."</td><td>".$row["name"].
	"</td><td>".$row["procedureID"]."</td><td>".$row["other"]."</td><td>".$row["otherFee"]."</td><td>".$row["patientID"]."</td></tr>";
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