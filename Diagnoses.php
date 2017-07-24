<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="style.css" type="text/css"></head>
<body>
	<?php
	include('dbconnect.php');
$query ="SELECT * FROM diagnoses";
$result = mysqli_query($conn,$query);
echo
"<table>
<tr>
	<th> name </th>
	<th> codes </th>
	<th> other </th>
	<th> diagnosesID </th>
</tr>";
if ($result->num_rows > 0) {
while ($row = mysqli_fetch_assoc($result)){ //Creates a loop through results
	if ($row)
		echo "<tr><td>".$row["name"]."</td><td>".$row["codes"]."</td><td>".$row["other"]."</td><td>".$row["diagnosesID"]."</td></tr>";
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