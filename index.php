<?php include('crud.php'); ?>
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="style.css" type="text/css"></head>
<h1>Wellness Clinic Project</h1>
<h4> Justin Stryjewski, Richard Lin</h4>
<ul>
	<li>Relations</li>
</ul>
<ol>
	<li><a href="Appointments.php">Appointments</a></li>
	<li><a href="AppointmentTimes.php">Appointment Times</a></li>
	<li><a href="Clinic.php">Clinic</a></li>
	<li><a href="DrugInfo.php">Drug Info</a></li>
	<li><a href="Employee.php">Employee</a></li>
	<li><a href="Fees.php">Fees</a></li>
	<li><a href="Insurance.php">Insurance</a></li>
	<li><a href="LabTestPrint.php">Lab Test</a></li>
	<li><a href="Medication.php">Medication</a></li>
	<li><a href="Procedures.php">Procedures</a></li>
	<li><a href="Schedule.php">Schedule</a></li>
	<li><a href="Surgeries.php">Surgeries</a></li>
	<li><a href="Patient.php">Patient</a></li>
	<li><a href="Diagnoses.php">Diagnoses</a></li>
</ol>
<ul>
	<li>Reports</li>
</ul>
<ol>
	<li><a href="weeklyCoverageSchedule.php">weekly coverage schedule</a></li>
	<li><a href="dailyMasterSchedule.php">Daily Master Schedule</a></li>
	<li><a href="individualPractitionersSchedule.php">Individual Practitioners Schedule</a></li>
	<li><a href="physiciansStatement2_1.php">Physicians Statement For Insurance Forms</a></li>
	<li><a href="patientMonthlyStatement.php">Patient Monthly Statement</a></li>
	<li><a href="prescriptionLabelandReceipt.php">Prescription Label And Receipt</a></li>
	<li><a href="labTest.php">Daily Laboratory Log</a></li>
	<li><a href="operating_room_schedule.php">Operatign Room Schedule</a></li>
	<li><a href="operating_room_log.php">Operating Room Log</a></li>
	<li><a href="monthlyReport.php">Monthly Activity Report</a></li>
</ol>
<form action="clear_pop.php" method="post">
	<input type="submit"  name="clear" value="Clear Database">
	<input type="submit" name="populate" value ="Populate Database">
</form>
<br>
<form action="Ad_Hoc.php" method="post">
	<textarea name="query" rows="10" cols="30">Enter query here...</textarea>
	<br>
	<input type="submit" name ="submit">
	<button type="reset" >Clear</button>
</form>
</form>
<h2> Add Patient </h2>
<form method="post" action="crud.php">
	<input type="hidden" name="patient">
		<ul style="list-style-type: none">
			<li>Patient Name: <input type="text" size="25px" name="patientName" placeholder="First Last"></li>
			<li>Address: <input type="text" size="25px" name="patientAddress" placeholder="Address" ></li>
			<li>Date of Birth: <input type="text" size="25px" name="patientDateOfBirth" placeholder="MM/DD/YY" ></li>
			<li>Phone Number: <input type="text" size="25px" name="patientNumber" placeholder="x-xxx-xxx-xxxx" ></li>
			<li>Gender: <input type="text" size="25px" name="patientSex" placeholder="Male/Female"></li>
			<li>Patient ID: <input type="text" size="25px" name="patientID" placeholder="P_"></li>
			<button type="submit" name="save">Save</button>
		</ul>
</form>

<h2> Delete Patient </h2>
<?php while($row = mysqli_fetch_array($results)) { ?>
<form method="post" action="crud.php">
	<input type="hidden" name="patient">
		<ul style="list-style-type: none">
			<li>Patient Name: <input type="text" size="25" name="patientName" placeholder="First Last"></li>
			<li>Patient ID: <input type="text" size="25" name="patientID" placeholder="P_"></li>
			<a href="crud.php?delete=<?php echo $row['patientID']; ?>">Delete</a>
		</ul>
</form>
<?php } ?>
</body>
</html>