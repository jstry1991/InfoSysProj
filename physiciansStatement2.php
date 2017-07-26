<?php
	session_start();
	
	$patientName = "";
	$patientAddress = "";
	$patientDateOfBirth = "";
	$patientNumber = "";
	$patientSex = "";
	$patientID ="";


	$edit_state = false;

	include("dbconnect.php");

	//if save button is clicked
	if (isset($_POST['save'])){
		$patientName = $_POST['patientName'];
		$patientAddress = $_POST['patientAddress'];
		$patientDateOfBirth = $_POST['patientDateOfBirth'];
		$patientNumber =$_POST['patientNumber'];
		$patientSex = $_POST['patientSex'];
		$patientID = $_POST['patientID'];

		$query = "INSERT INTO patient (name, address, dateOfBirth, phoneNumber, sex, patientID) VALUES ('$patientName', '$patientAddress', '$patientDateOfBirth', '$patientNumber', '$patientSex', '$patientID')";
		mysqli_query($conn, $query);

		$_SESSION['msg'] = "Entry Saved";
		header('location: physiciansStatement2_1.php');
	}

	//update Records
	if (isset($_POST['edit'])) {
		$patientName = $_POST['patientName'];
		$patientAddress = $_POST['patientAddress'];
		$patientDateOfBirth = $_POST['patientDateOfBirth'];
		$patientNumber =$_POST['patientNumber'];
		$patientSex = $_POST['patientSex'];
		$patientID = $_POST['patientID'];

		
		mysqli_query($conn, "UPDATE patient SET name='$patientName', patientID='$patientID' WHERE patientID='$patientID', address ='$patientAddress', dateOfBirth='$patientDateOfBirth', phoneNumber='$patientNumber', sex='$patientSex'");
		
		$_SESSION['msg'] = "Entry Updated";
		header('location: physiciansStatement2_1.php');
	}


	//Delete Records
	if( isset($_GET['delete'])) {
		$patientID = $_GET['delete'];
		mysqli_query($conn, "DELETE FROM patient WHERE patientID = '$patientID'");
		
		$_SESSION['msg'] = "Entry Deleted";
		header('location: physiciansStatement2_1.php');
	}



	//Retrieve Records
	$results = mysqli_query($conn, "SELECT p.address as patientAddress, p.dateOfBirth as patientDateOfBirth, p.name as patientName, p.phoneNumber as patientNumber, p.patientID as patientID, p.sex as patientSex FROM patient as p");
?>