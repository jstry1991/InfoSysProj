<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="style.css" type="text/css"></head>
<a href ="index.html">Home</a>
<body>
	<?php
	include('dbconnect.php');
$query ="SELECT p.name, p.address, p.dateOfBirth, p.phoneNumber, f.amountOwed, f.amountPaid, f.datePaid, f.dateIssued, f.totalBalance FROM patient p, 
fees f WHERE p.patientID=f.patientID AND f.amountOwed IS NOT NULL";
$result = mysqli_query($conn,$query);
echo
"<table>
<tr>
	<th>Patient Name</th>
	<th>Address</th>
	<th>Date of Birth</th>
	<th>Phone Number</th>
	<th>Amount Owed</th>
	<th>Amount Paid</th>
	<th>Date Paid</th>
	<th>Date Issued</th>
	<th>Total Balance</th>
</tr>";
if ($result->num_rows > 0) {
while ($row = mysqli_fetch_assoc($result)){ //Creates a loop through results
	if ($row)
		echo "<tr><td>".$row["name"]."</td><td>".$row["address"]."</td><td>".$row["dateOfBirth"]."</td><td>".$row["phoneNumber"]."</td><td>".$row["amountOwed"]."</td><td>".$row["amountPaid"]."</td><td>".$row["datePaid"]."</td><td>".$row["dateIssued"]."</td><td>".$row["totalBalance"]."</td></tr>";
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