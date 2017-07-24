<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="style.css" type="text/css"></head>
<body>
	<?php
	include('dbconnect.php');
$query ="SELECT (SELECT COUNT(*) FROM appointments)as NumOfApp,(SELECT COUNT(*)FROM surgeries) as NumofSurg,(SELECT COUNT(*)FROM medication)as NumOfMed,(SELECT DISTINCT testType FROM labtest ORDER BY testType ASC)as Type,(SELECT COUNT(*)FROM labtest ORDER BY testType ASC)as NumOfTests";
$result = mysqli_query($conn,$query);
echo
"<table>
<tr>
	<th> Number of Appointments </th>
	<th> Number of Surgeries</th>
	<th> Number of Medications Dispensed </th>
	<th> Tests </th>
	<th>Number of Tests</th>
</tr>";
if ($result->num_rows > 0) {
while ($row = mysqli_fetch_assoc($result)){ //Creates a loop through results
	if ($row)
		echo "<tr><td>".$row["NumOfApp"]."</td><td>".$row["NumofSurg"]."</td><td>".$row["NumOfMed"]."</td><td>".$row["Type"]."</td><td>".$row["NumOfTests"]."</td></</tr>";
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