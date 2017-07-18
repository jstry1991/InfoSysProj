<!DOCTYPE html>
<html>
<body>
	<?php
	include('dbconnect.php');
$query ="SELECT c.name as clinic_name, c.address as clinic_address, c.phoneNumber as clinic_number, em.taxID as employee_tax, em.name as employee_name, p.name as patient_name FROM clinic as c 
INNER JOIN employee as em ON c.employeeID=em.employeeID
INNER JOIN patient as p ON c.patientID=p.patientID";
$result = mysqli_query($conn,$query);
echo
"<table>
	<tr>
		<th>Clinic Name |</th>
		<th>Clinic Address |</th>
		<th>Clinic Phone Number |</th>
		<th>Patient Name |</th>
		<th>Employee Name |</th>
		<th>Tax Identification Number </th>
	</tr>";
if ($result->num_rows > 0) {
while ($row = mysqli_fetch_assoc($result)){ //Creates a loop through results
	if ($row)
		echo "<tr><td>".$row["clinic_name"]."</td><td>".$row["clinic_address"]."</td><td>".$row["clinic_number"]."</td><td>".$row["patient_name"]."</td><td>".$row["employee_name"]."</td><td>".$row["employee_tax"]."</td></tr>";
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