<?php
	session_start();
	$clinicName = "";
	$clinicAddress = "";
	$clinicID = "";
	$patientName = "";
	$patientID= "";
	$employeeName ="";
	$employeeID = "";
	$employeeJob= "";
	$visitType = "";
	$appointmentID = ""; 
	$procedureName = "";
	$procedureID = "";
	$procedureFees = "";
	$procedureCodes = "";
	$otherCodes = "";
	$otherFee = "";
	$amountOwed= "";
	$amountPaid= "";
	$datePaid= "";
	$dateIssued= "";
	$totalBalance= "";
	$feeID= "";


	$edit_state = false;

	include("dbconnect.php");

	//if save button is clicked
	if (isset($_POST['save'])){
		$patientName = $_POST['patientName'];
		$patientID = $_POST['patientID'];
		$clinicName = $_POST['clinicName'];
		$clinicAddress = $_POST['clinicAddress'];
		$clinicID = $_POST['clinicID'];
		$employeeName = $_POST['employeeName'];
		$employeeID = $_POST['employeeID'];
		$employeeJob = $_POST['employeeJob'];
		$visitType = $_POST['visitType'];
		$appointmentID = $_POST['appointmentID'];
		$procedureName = $_POST['procedureName'];
		$procedureID = $_POST['procedureID'];
		$procedureName = $_POST['procedureName'];
		$procedureID = $_POST['procedureID'];
		$procedureFees = $_POST['procedureFees'];
		$procedureCodes = $_POST['procedureCodes'];
		$otherCodes = $_POST['otherCodes'];
		$otherFee = $_POST['otherFee'];
		$amountOwed = $_POST['amountOwed'];
		$amountPaid = $_POST['amountPaid'];
		$datePaid = $_POST['datePaid'];
		$dateIssued = $_POST['dateIssued'];
		$totalBalance = $_POST['totalBalance'];
		$feeID = $_POST['feeID'];


		$query ="INSERT INTO clinic (name, address, clinicID, appointmentID) VALUES ('$clinicName', '$clinicAddress', '$clinicID', '$applointmentID')";
		mysqli_query($conn, $query);
		$query ="INSERT INTO patient (name, patientID) VALUES ('$patientName', '$patientID')";
		mysqli_query($conn, $query);
		$query ="INSERT INTO employee (name, job, employeeID) VALUES ('$employeeName', '$employeeJob', '$employeeID')";
		mysqli_query($conn,$query);
		$query ="INSERT INTO appointments (appointmentID, visitType, employeeID, patientID) VALUES ('$appointmentID', '$visitType', '$employeeID', '$patientID')";
		mysqli_query($conn,$query);
		$query ="INSERT INTO procedures (name, procedureID, patientID, codes, otherCodes, otherFee, fees) VALUES ('$procedureName', '$procedureID', '$patientID', '$procedureCodes', '$otherCodes', '$otherFee', '$procedureFees')";
		mysqli_query($conn,$query);
		$query ="INSERT INTO fees (amountOwed, amountPaid, datePaid, dateIssued, totalBalance, feeID) VALUES ('$amountOwed', '$amountPaid', '$datePaid', '$dateIssued', '$totalBalance', '$feeID')";
		mysqli_query($conn,$query);

		$_SESSION['msg'] = "Entry Saved";
		header('location: physiciansStatement2_1.php');
	}

	//update Records
	if (isset($_POST['edit'])) {
		$patientName = ($_POST['patientName']);
		$patientID = ($_POST['patientID']);
		$clinicName = ($_POST['clinicName']);
		$clinicAddress = ($_POST['clinicAddress']);
		$clinicID = ($_POST['clinicID']);
		$employeeName = ($_POST['employeeName']);
		$employeeJob = ($_POST['employeeJob']);
		$employeeID = ($_POST['employeeID']);
		$appointmentID = ($_POST['appointmentID']);
		$visitType = ($_POST['visitType']);
		$procedureID = ($_POST['procedureID']);
		$procedureName = ($_POST['procedureName']);
		$procedureFees = ($_POST['procedureFees']);
		$procedureCodes = ($_POST['procedureCodes']);
		$otherCodes = ($_POST['otherCodes']);
		$otherFee = ($_POST['otherFee']);
		$amountOwed = ($_POST['amountOwed']);
		$amountPaid = ($_POST['amountPaid']);
		$datePaid = ($_POST['datePaid']);
		$dateIssued = ($_POST['dateIssued']);
		$totalBalance = ($_POST['totalBalance']);
		$feeID = ($_POST['feeID']);

		mysqli_query($conn,"UPDATE clinic SET name='$clinicName', address='$clinicAddress' WHERE clinicID='$clinicID'");
		mysqli_query($conn, "UPDATE patient SET name='$patientName', patientID='$patientID' WHERE patientID='$patientID'");
		mysqli_query($conn, "UPDATE employee SET name='$employeeName', job='$employeeJob' WHERE emplyeeID='$employeeID'");
		mysqli_query($conn, "UPDATE appointments SET appointmentID='$appointmentID', visitType='$visitType' WHERE appointmentID= '$appointmentID'");
		mysqli_query($conn, "UPDATE procedures SET procedureName = '$procedureName', codes = '$procedureCodes', fees = '$procedureFees', otherCodes = '$otherCodes', otherFee = '$otherFee' WHERE procedureID='$procedureID'");
		mysqli_query($conn, "UPDATE fees SET amountOwed = '$amountOwed', amountPaid = '$amountPaid', datePaid = '$datePaid', dateIssued = '$dateIssued', totalBalance = '$totalBalance', feeID = '$feeID'");
		$_SESSION['msg'] = "Entry Updated";
		header('location: physiciansStatement2_1.php');
	}


	//Delete Records
	if( isset($_GET['delete'])) {
		$clinicID = $_GET['delete'];
		mysqli_query($conn, "DELETE FROM clinic WHERE clinicID = '$clinicID'");
		mysqli_query($conn, "DELETE FROM patient WHERE patientID = '$patientID'");
		mysqli_query($conn, "DELETE FROM employee WHERE employeeID = '$employeeID'");
		mysqli_query($conn, "DELETE FROM appointments WHERE appointmentID = '$appointmentID'");
		mysqli_query($conn, "DELETE FROM procedures WHERE procedureID= '$procedureID'");
		mysqli_query($conn, "DELETE FROM fees WHERE feeid = '$feeID'");
		$_SESSION['msg'] = "Entry Deleted";
		header('location: physiciansStatement2_1.php');
	}



	//Retrieve Records
	$results = mysqli_query($conn, "SELECT c.name as clinicName, c.address as clinicAddress, c.phoneNumber as clinicNumber, c.clinicID as clinicID, em.taxID as employeeTax, em.name as employeeName, em.job as employeeJob, em.employeeID as employeeID, p.name as patientName, p.patientID, a.visitType as visitType, a.appointmentID as appointmentID, pr.name as procedureName,pr.procedureID as procedureID, pr.codes as procedureCodes, pr.other, pr.otherFee, pr.fees as procedureFees, pr.otherCodes, f.amountPaid, f.amountPaid, f.totalBalance, f.amountOwed, f.datePaid, f.dateIssued, f.feeID, i.company
		FROM clinic as c 
		INNER JOIN appointments as a ON c.appointmentID=a.appointmentID
		INNER JOIN employee as em ON a.employeeID=em.employeeID
		INNER JOIN patient as p ON p.patientID=a.patientID
		INNER JOIN fees as f ON f.patientID=p.patientID
		INNER JOIN procedures as pr ON pr.procedureID=a.procedureID
		INNER JOIN insurance as i ON i.patientID=p.patientID");
?>