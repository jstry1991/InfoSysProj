<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="style.css" type="text/css"></head>
<a href ="index.html">Home</a>
<body>
	<?php
	include('dbconnect.php');

$query ="SELECT c.name as clinic_name, c.address as clinic_address, c.phoneNumber as clinic_number, em.taxID as employee_tax, em.name as employee_name, p.name as patient_name, a.visitType, pr.name as procedure_name, pr.codes, pr.other, pr.otherFee, pr.fees as procedure_fees, pr.otherCodes, f.amountPaid, f.totalBalance, i.company
		FROM clinic as c 
		INNER JOIN appointments as a ON c.appointmentID=a.appointmentID
		INNER JOIN employee as em ON a.employeeID=em.employeeID
		INNER JOIN patient as p ON p.patientID=a.patientID
		INNER JOIN fees as f ON f.patientID=p.patientID
		INNER JOIN procedures as pr ON pr.procedureID=a.procedureID
		INNER JOIN insurance as i ON i.patientID=p.patientID";

$query2 = "SELECT d.name as diagnoses_name, d.codes as diagnoses_codes, d.other as diagnoses_other FROM diagnoses as d";
$result = mysqli_query($conn,$query);
$result2 = mysqli_query($conn,$query2);
echo
"<table>
	<tr>
		<th>Clinic Name</th>
		<th>Clinic Address</th>
		<th>Clinic Phone Number</th>
		<th>Patient Name</th>
		<th>Employee Name</th>
		<th>Tax Identification Number</th>
		<th>Visit Type</th>
		<th>Procesures That are Preformed</th>
		<th>Procedure Code</th>
		<th>Other</th>
		<th>Other Fees</th>
		<th>Other Codes</th>
		<th>Fee</th>
		<th>Amount Paid</th>
		<th>Balance Due</th>
		<th>Patient's Insurance Company</th>
		</tr>";
if ($result->num_rows > 0) {
while ($row = mysqli_fetch_assoc($result)){ //Creates a loop through results
	if ($row)
		echo "<tr><td>".$row["clinic_name"]."</td><td>".$row["clinic_address"]."</td><td>".$row["clinic_number"]."</td><td>".$row["patient_name"]."</td><td>".$row["employee_name"]."</td><td>".$row["employee_tax"]."</td><td>".$row["visitType"]."</td><td>".$row["procedure_name"]."</td><td>".$row["codes"]."</td><td>".$row["other"]."</td><td>".$row["otherFee"]."</td><td>".$row["otherCodes"]."</td><td>".$row["procedure_fees"]."</td><td>".$row["amountPaid"]."</td><td>".$row["totalBalance"]."</td><td>".$row["company"]."</td></tr>";
	}
	echo"</table>";
echo 
	"<table>
	<tr> 
		<th>COMMON DIAGNOSES</th>
		<th>Codes</th>
		<th>Other</th>
	</tr>";
while ($row = mysqli_fetch_assoc($result2)){
		echo "<tr><td>".$row["diagnoses_name"]."</td><td>".$row["diagnoses_codes"]."</td><td>".$row["diagnoses_other"]."</td></tr>";
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