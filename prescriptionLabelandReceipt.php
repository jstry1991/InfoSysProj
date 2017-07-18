<!DOCTYPE html>
<html>
<body>
	<?php
	include('dbconnect.php');
$query ="SELECT med.drugName as med_name, med.dateFilled, med.directions, med.form, med.numberOfRefills, med.quantity, med.strength, med.originalDate, p.name as p_name, p.address, em.name as em_name, ph.name as ph_name FROM medication as med 
INNER JOIN patient as p ON med.patientID= p.patientID
INNER JOIN employee as em ON med.employeeID= em.employeeID
INNER JOIN pharmacist as ph on med.pharmacistID=ph.pharmacistID";
$result = mysqli_query($conn,$query);
echo
"<table>
<tr>
	<th> Patient Name | </th>
	<th> Patient Address | </th>
	<th> Doctor Name | </th>
	<th> Drug Name | </th>
	<th> Directions | </th>
	<th> Original Date | </th>
	<th> Date Filled | </th>
	<th> Number of Refills Remaining | </th>
	<th> Strength | </th>
	<th> Quantity | </th>
	<th> Pharmacist Name | </th>
</tr>";
if ($result->num_rows > 0) {
while ($row = mysqli_fetch_assoc($result)){ //Creates a loop through results
	if ($row)
		echo "<tr><td>".$row["p_name"]."</td><td>".$row["address"]."</td><td>".$row["em_name"]."</td><td>".$row["med_name"]."</td><td>".$row["directions"]."</td><td>".$row["originalDate"]."</td><td>".$row["dateFilled"]."</td><td>".$row["numberOfRefills"]."</td><td>".$row["strength"]."</td><td>".$row["quantity"]."</td><td>".$row["ph_name"]."</td></tr>";
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