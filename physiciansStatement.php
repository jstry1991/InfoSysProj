<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="style.css" type="text/css"></head>

<body><!--
<form action="./physiciansStatement.php" method="post">
	<input type="text" value="" size="25px" name="search" />
	<input type="submit" value="search"/>
</form>-->
<?php

	include('dbconnect.php');

?>
<?php

$query ="SELECT (SELECT c.name FROM clinic c) as clinic_name,(SELECT c.address FROM clinic c)as clinic_address, (SELECT c.phoneNumber FROM clinic c)as clinic_number,em.taxID as employee_tax, em.name as employee_name, p.name as patient_name, a.visitType, pr.name as procedure_name, pr.codes, pr.other, pr.otherFee, pr.fees as procedure_fees, pr.otherCodes, f.amountPaid, f.totalBalance, i.company, f.amountOwed as amount_owed
		FROM appointments as a  
		INNER JOIN employee as em ON em.employeeID=a.employeeID
		INNER JOIN patient as p ON p.patientID=a.patientID
		INNER JOIN fees as f ON f.patientID=p.patientID
		INNER JOIN procedures as pr ON pr.procedureID=a.procedureID
		INNER JOIN insurance as i ON i.patientID=p.patientID";
$query2 = "SELECT d.name as diagnoses_name, d.codes as diagnoses_codes, d.other as diagnoses_other FROM diagnoses as d";

$result = mysqli_query($conn,$query); // result for table output
$result2 = mysqli_query($conn,$query2); //result for diagnoses output


echo
"<table>
	<tr>
		<th>Clinic Name </th>
		<th>Clinic Address </th>
		<th>Clinic Phone Number </th>
		<th>Patient Name </th>
		<th>Employee Name </th>
		<th>Tax Identification Number </th>
		<th>Visit Type </th>
		<th>Procesures That are Preformed </th>
		<th>Procedure Code </th>
		<th>Other Procedures </th>
		<th>Other Fees</th>
		<th>Other Codes </th>
		<th>Amount Paid</th>
		<th>Balance Due </th>
		<th>Amount Owed </th>
		<th>Patient's Insurance Company </th>
		</tr>";
if ($result->num_rows > 0) {
while ($row = mysqli_fetch_assoc($result)){ //Creates a loop through results
	if ($row)
		echo "<tr><td>".$row["clinic_name"]."</td><td>".$row["clinic_address"]."</td><td>".$row["clinic_number"]."</td><td>".$row["patient_name"]."</td><td>".$row["employee_name"]."</td><td>".$row["employee_tax"]."</td><td>".$row["visitType"]."</td><td>".$row["procedure_name"]."</td><td>".$row["codes"]."</td><td>".$row["other"]."</td><td>".$row["otherFee"]."</td><td>".$row["otherCodes"]."</td><td>".$row["amountPaid"]."</td><td>".$row["totalBalance"]."</td><td>".$row["amount_owed"]."</td><td>".$row["company"]."</td></tr>";
	}
echo "</table>";
//----------------This echos out the common diagnoses table-----------
echo 
	"<br/><table>
		<tr> 
			<th>Common Diagnoses</th>
			<th>Common Codes</th>
			<th>Other Codes</th>
		</tr>";
while ($row = mysqli_fetch_assoc($result2)){
	if ($row)
		echo "<tr><td>".$row["diagnoses_name"]."</td><td>".$row["diagnoses_codes"]."</td><td>".$row["diagnoses_other"]."</td></tr>";
}
echo "</table>";
//----------------------------------------------------------------------
}
else {
	echo "DIDN'T FIND ANYTHING";
}

include('dbclose.php'); 
?>
</body>
</html>