<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="style.css" type="text/css"></head>
<body>
	<?php
	include('dbconnect.php');
$query ="SELECT * FROM fees";
$result = mysqli_query($conn,$query);
echo
"<table>
<tr>
	<th> amountOwed </th>
	<th> amountPaid </th>
	<th> datePaid </th>
	<th> dateIssued </th>
	<th> feeID </th>
	<th> patientID </th>
	<th> totalBalance </th>
</tr>";
if ($result->num_rows > 0) {
while ($row = mysqli_fetch_assoc($result)){ //Creates a loop through results
	if ($row)
		echo "<tr><td>".$row["amountOwed"]."</td><td>".$row["amountPaid"]."</td><td>".$row["datePaid"]."</td><td>".$row["dateIssued"]
	."</td><td>".$row["feeID"]."</td><td>".$row["patientID"]."</td><td>".$row["totalBalance"]."</td></tr>";
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