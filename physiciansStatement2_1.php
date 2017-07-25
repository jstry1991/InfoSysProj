<?php include('physiciansStatement2.php');

	if(isset($_GET['edit'])) {
		$clinicID = $_GET['edit'];
		$edit_state = true;
		$rec = mysqli_query($conn,"SELECT c.name as clinicName, c.address as clinicAddress, c.phoneNumber as clinicNumber, c.clinicID as clinicID, em.taxID as employeeTax, em.name as employeeName, em.employeeID, em.job as employeeJob,  p.name as patientName, p.patientID, a.visitType as visitType, a.appointmentID as appointmentID, pr.name as procedureName, pr.procedureID as procedureID, pr.codes as procedureCodes, pr.other, pr.otherFee, pr.fees as procedureFees, pr.otherCodes, f.amountPaid, f.totalBalance, f.amountOwed, f.datePaid, f.dateIssued, f.feeID, i.company
		FROM clinic as c 
		INNER JOIN appointments as a ON c.appointmentID=a.appointmentID
		INNER JOIN employee as em ON a.employeeID=em.employeeID
		INNER JOIN patient as p ON p.patientID=a.patientID
		INNER JOIN fees as f ON f.patientID=p.patientID
		INNER JOIN procedures as pr ON pr.procedureID=a.procedureID
		INNER JOIN insurance as i ON i.patientID=p.patientID
		WHERE clinicID='$clinicID'");
		$record = mysqli_fetch_array($rec);
		$patientName = $record['patientName'];
		$patientID = $record['patientID'];
		$clinicName = $record['clinicName'];
		$clinicAddress = $record['clinicAddress'];
		$clinicID = $record['clinicID'];
		$employeeName = $record['employeeName'];
		$employeeID = $record['employeeID'];
		$employeeJob = $record['employeeJob'];
		$visitType = $record['visitType'];
		$appointmentID = $record['appointmentID'];
		$procedureName = $record['procedureName'];
		$procedureID = $record['procedureID'];
		$procedureFees = $record['procedureFees'];
		$procedureCodes = $record['procedureCodes'];
		$otherCodes = $record['otherCodes'];
		$otherFee = $record['otherFee'];
		$amountOwed = $record['amountOwed'];
		$amountPaid = $record['amountPaid'];
		$datepaid = $record['datePaid'];
		$dateIssued = $record['dateIssued'];
		$totalBalance = $record['totalBalance'];
		$feeID = $record['feeID'];
	}

?>
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="style.css" type="text/css"></head>
<body>
	<?php if(isset($_SESSION['msg'])): ?>
		<?php
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		?>
	<?php endif ?>
	<table>
		<thead>
			<tr>
				<th>Patient Name</th>
				<th>Patient ID</th>
				<th>Clinic Name</th>
				<th>Clinic Address</th>
				<th>Clinic ID</th>
				<th>Employee Name</th>
				<th>Employee ID</th>
				<th>Employee Job</th>
				<th>Visit Type</th>
				<th>Appointment ID</th>
				<th>Procedure Name</th>
				<th>Procedure Code</th>
				<th>Fees</th>
				<th>Other Codes</th>
				<th>Other Fees</th>
				<th>Procedure ID</th>
				<th>Amount Owed</th>
				<th>Amount Paid</th>
				<th>Date Paid</th>
				<th>Date Issed</th>
				<th>Total Balance</th>
				<th>Fee ID</th>
				<th colspan = "2">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php while($row = mysqli_fetch_array($results)) { ?>
				<tr>
					<td><?php echo $row['patientName'] ?></td>
					<td><?php echo $row['patientID'] ?></td>
					<td><?php echo $row['clinicName'] ?></td>
					<td><?php echo $row['clinicAddress'] ?></td>
					<td><?php echo $row['clinicID'] ?></td>
					<td><?php echo $row['employeeName'] ?></td>
					<td><?php echo $row['employeeID'] ?></td>
					<td><?php echo $row['employeeJob'] ?></td>
					<td><?php echo $row['visitType'] ?></td>
					<td><?php echo $row['appointmentID'] ?></td>
					<td><?php echo $row['procedureName'] ?></td>
					<td><?php echo $row['procedureID'] ?></td>
					<th><?php echo $row['procedureFees'] ?></td>
					<th><?php echo $row['procedureCodes'] ?></td>
					<th><?php echo $row['otherCodes'] ?></td>
					<th><?php echo $row['amountOwed'] ?></td>
					<th><?php echo $row['amountPaid'] ?></td>
					<th><?php echo $row['datePaid'] ?></td>
					<th><?php echo $row['dateIssued'] ?></td>
					<th><?php echo $row['totalBalance'] ?></td>
					<th><?php echo $row['feeID'] ?></td>
					<td>
						<a href="physiciansStatement2_1.php?edit=<?php echo $row['clinicID']; ?>">Edit</a>
					</td>
					<td> 
						<a href="physiciansStatement2.php?delete=<?php echo $row['clinicID']; ?>">Delete</a>
					</td>	
				</tr>

			<?php } ?>
	</table>
	<form method="post" action="physiciansStatement2.php">
	<input type="hidden" name="clinicID" value ="<?php echo $clinicID ?>">

		<br><label>Patient Name</label>
			<input type="text" name="patientName" value ="<?php echo $patientName ?>">	
		<label>Patient ID</label>
			<input type="text" name="patientID" value ="<?php echo $patientID ?>">	<br><br>

		<label>Clinic Name</label>
			<input type="text" name="clinicName" value ="<?php echo $clinicName ?>">
		<label>Address</label>
			<input type="text" name="clinicAddress" value ="<?php echo $clinicAddress ?>">
		<label>Clinic ID</label>
			<input type="text" name="clinicID"><br><br>

		<label>Employee Name</label>
			<input type="text" name="employeeName" value ="<?php echo $employeeName ?>">	
		<label>Employee ID</label>
			<input type="text" name="employeeID" value ="<?php echo $employeeID ?>">
		<label>Employee Position</label>
			<input type="text" name="employeeJob" value ="<?php echo $employeeJob ?>">		<br><br>

		<label>Visit Type</label>
			<input type="text" name="visitType" value ="<?php echo $visitType ?>">
		<label>Appointment ID</label>
			<input type="text" name="appointmentID" value ="<?php echo $appointmentID ?>">	<br><br>

		<label>Procedure Name</label>
			<input type="text" name="procedureName" value ="<?php echo $procedureName ?>">
		<label>Procedure ID</label>
			<input type="text" name="procedureID" value ="<?php echo $procedureID ?>">
		<label>Procedure Codes</label>
			<input type="text" name="procedureCodes" value ="<?php echo $procedureCodes ?>">
		<label>Procedure Fees</label>
			<input type="text" name="procedureFees" value ="<?php echo $procedureFees ?>">
		<label>Other Codes</label>
			<input type="text" name="otherCodes" value ="<?php echo $otherCodes ?>">
		<label>Other Fees</label>
			<input type="text" name="otherFee" value ="<?php echo $otherFee ?>">	<br><br>

		<label>Amount Owed</label>
			<input type="text" name="amountOwed" value ="<?php echo $amountOwed ?>">
		<label>Amount Paid</label>
			<input type="text" name="amountPaid" value ="<?php echo $amountPaid ?>">
		<label>Date Paid</label>
			<input type="text" name="datePaid" value ="<?php echo $datePaid ?>">
		<label>Date Issued</label>
			<input type="text" name="dateIssued" value ="<?php echo $dateIssued ?>">
		<label>Total Balance</label>
			<input type="text" name="totalBalance" value ="<?php echo $totalBalance ?>">
		<label>Fee ID</label>
			<input type="text" name="feeID" value ="<?php echo $feeID ?>">	<br><br>

			<?php if($edit_state == false): ?>
				<button type="submit" name="save">Save</button>
			<?php else: ?>
				<button type="submit" name="edit">Edit</button>
			<?php endif ?>
			
	</form>
</body>
</html>