<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="style.css" type="text/css"></head>
<div class ="box">
	<a href ="index.html">Home</a>
</div>
<body>
<form action="prescriptionLabelandReceipt.php" method="post">
<br>
<div class="box">
  name:
  </div>
  <br>
  <input type="text" name="fname"><br>
  <div class="box">
  drug name:
  </div>
  <br>
  <input type="text" name ="drug"><br>
  <input type="submit" name="submit" value ="submit">
</form>
<?php 
include('dbconnect.php');
if(isset($_POST['fname'],$_POST['drug'])){
$patient=$_POST['fname'];
$drug=$_POST['drug'];
$query ="SELECT med.rxNumber, med.drugName as med_name, med.dateFilled, med.directions, med.form, med.numberOfRefills, med.quantity, 
med.strength, med.originalDate, p.name as p_name, p.address, em.name as em_name, ph.name as ph_name, di.cost, di.description, 
di.warning, ins.company, ins.policyType FROM medication as med 
INNER JOIN patient as p ON med.patientID= p.patientID
INNER JOIN employee as em ON med.employeeID= em.employeeID
INNER JOIN employee as ph on med.pharmacistID=ph.employeeID
INNER JOIN druginfo as di on med.drugID= di.drugID
INNER JOIN insurance as ins on ins.drugID=di.drugID WHERE p.name = '".$patient."' AND med.drugName = '".$drug."'";
$result = mysqli_query($conn,$query);
echo
"<table>
<tr>
	<th> Patient Name </th>
	<th> Patient Address </th>
	<th> Doctor Name </th>
	<th> Rx Number </th>
	<th> Drug Name </th>
	<th> Directions </th>
	<th> Original Date </th>
	<th> Date Filled </th>
	<th> Number of Refills Remaining </th>
	<th> Strength </th>
	<th> Quantity </th>
	<th> Pharmacist Name </th>
	<th> Drug Cost </th>
	<th> Drug Description </th>
	<th> Warnings </th>
	<th> Insurance COmpany </th>
	<th> Policy Type </th>
</tr>";
if ($result->num_rows > 0) {
while ($row = mysqli_fetch_assoc($result)){ //Creates a loop through results
	if ($row)
		echo "<tr><td>".$row["p_name"]."</td><td>".$row["address"]."</td><td>".$row["em_name"]."</td><td>".$row["rxNumber"]."</td><td>"
	.$row["med_name"]."</td><td>".$row["directions"]."</td><td>".$row["originalDate"]."</td><td>".$row["dateFilled"]."</td><td>"
	.$row["numberOfRefills"]."</td><td>".$row["strength"]."</td><td>".$row["quantity"]."</td><td>".$row["ph_name"]."</td><td>".$row["cost"].
	"</td><td>".$row["description"]."</td><td>".$row["warning"]."</td><td>".$row["company"]."</td><td>".$row["policyType"]."</td></tr>";
}
}
else {
	echo "DIDN'T FIND ANYTHING";
}
}
echo 
"</table>";

include('dbclose.php'); 
?>
</body>
</html>