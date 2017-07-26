<?php
include('dbconnect.php');
if(isset($_REQUEST['clear'])){
	$sqlquery="SET FOREIGN_KEY_CHECKS=0";
	mysqli_query($conn,$sqlquery);
	$tableList=array("appointments","appointmenttime","clinic","diagnoses","druginfo","employee","fees","insurance",
	"labtest","medication","patient","procedures","schedule","surgeries");
	for($i=0; $i<count($tableList); $i++){
	$sqldel="Truncate table ".$tableList[$i]."";
	mysqli_query($conn,$sqldel);}
	$sqlquery="SET FOREIGN_KEY_CHECKS=1";
	mysqli_query($conn,$sqlquery);
}

?>

<?php

if(isset($_REQUEST['populate'])){
	$sqlquery="SET FOREIGN_KEY_CHECKS=0";
mysqli_query($conn,$sqlquery);
	$sqlinsert="INSERT INTO `appointments` (`appointmentID`, `cost`, `description`, `roomNumber`, `visitType`, `employeeID`, `patientID`, `diagnosis`, `procedureID`) VALUES
		('A1', '$12.50', 'stomach pains', 1, 'walk-in', 'E1', 'P1', 'headache', 'PR2'),
		('A2', '$30.00', 'fractured bone', 2, 'scheduled', 'E2', 'P1', 'broken arm', 'PR1'),
		('A3', '$50.00', 'fractured bone', 5, 'scheduled', 'E2', 'P1', 'broken leg', 'PR1')";
mysqli_query($conn,$sqlinsert);
	$sqlinsert="INSERT INTO `appointmenttime` (`day`, `time`, `appTimeID`, `date`, `appointmentID`) VALUES
		('Mon', '8:00', 'AT1', '07/17/2017', 'A1'),
		('Mon', '8:10', 'AT2', '07/17/2017', 'A2'),
		('Mon', '8:20', 'AT3', '07/17/2017', 'A3'),
		('Mon', '8:30', 'AT4', '07/17/2017', NULL),
		('Mon', '8:40', 'AT5', '07/17/2017', NULL),
		('Mon', '8:50', 'AT6', '07/17/2017', NULL)";
mysqli_query($conn,$sqlinsert);
	$sqlinsert="INSERT INTO `clinic` (`address`, `clinicID`, `phoneNumber`, `name`, `appointmentID`) VALUES
		('76354 donovan dr', 'C1', '1-813-975-3342', 'wellness clinic', 'A1')";
mysqli_query($conn,$sqlinsert);
	$sqlinsert="INSERT INTO `diagnoses` (`name`, `codes`, `other`, `diagnosesID`) VALUES
		('Hypertension', '1234', NULL, 'D1'),
		('Hyperlipidemia', '2345', NULL, 'D2'),
		('Diabetes', NULL, '3456', 'D3'),
		('Back Pain', '4567', NULL, 'D4'),
		('Anxiety', NULL, '5678', 'D5'),
		('Obesity', '6798', NULL, 'D6'),
		('Allergic Rhinitis', NULL, '7890', 'D7'),
		('Reflux Esophagitis', '1122', NULL, 'D8'),
		('Respiratory Problems', '2233', NULL, 'D9')";
mysqli_query($conn,$sqlinsert);
	$sqlinsert="INSERT INTO `druginfo` (`cost`, `description`, `drugID`, `name`, `warning`) VALUES
		('$20.00', 'Abilify is used to treat the symptoms of psychotic conditions such as schizophrenia and bipolar I disorder (manic depression.', 
		'D1', 'Abilify', 'Common Abilify side effects may include:\r\nweight gain;\r\nblurred vision;\r\nnausea, vomiting, changes in appetite, se, 
		sneezing, sore throat.')";
mysqli_query($conn,$sqlinsert);
	$sqlinsert="INSERT INTO `employee` (`address`, `name`, `phoneNumber`, `job`, `taxID`, `employeeID`) VALUES
		('67543 willow dr', 'bob thorton', '1-313-234-6543', 'doctor', 784563920, 'E1'),
		('546372 weatherstone dr', 'cathy', '1-654-734-76354', 'doctor', 78654328, 'E2'),
		('74532 maple dr', 'nancy', '1-810-543-9732', 'nurse', 543982730, 'E3'),
		('1234 maple dr', 'Rachel', '1-800-121-4547', 'Pharmacis', 85267453, 'E4')";
mysqli_query($conn,$sqlinsert);
	$sqlinsert="INSERT INTO `fees` (`amountOwed`, `amountPaid`, `datePaid`, `dateIssued`, `feeID`, `patientID`, `totalBalance`) VALUES
		('$25.00', '$50.00', '12/21/2001', '12/21/2001', 'F1', 'P1', '$25.00')";
mysqli_query($conn,$sqlinsert);
	$sqlinsert="INSERT INTO `insurance` (`company`, `insuranceID`, `drugID`, `policyType`, `patientID`) VALUES
		('total health', 'I1', 'D1', 'medical', 'P1')";
mysqli_query($conn,$sqlinsert);
	$sqlinsert="INSERT INTO `labtest` (`cost`, `employeeID`, `patientID`, `result`, `testDate`, `testID`, `testTime`, `testType`) VALUES
		('$12.50', 'E1', 'P1', 'positive', '05/24/2000', 'T1', '12:30pm', 'bipolar')";
mysqli_query($conn,$sqlinsert);
	$sqlinsert="INSERT INTO `medication` (`rxNumber`, `dateFilled`, `directions`, `drugName`, `employeeID`, `form`, `medicationID`, `numberOfRefills`, `originalDate`, `patientID`, `quantity`, `strength`, `pharmacist`, `drugID`) VALUES
		('rx672432', '05/24/2000', 'take one pill everyday in the morning', 'Abilify', 'E1', 'tablet', 'M1', 4, '05/24/2000', 'P1', 30, '10mg', 'Rachel Jene', 'D1')";
mysqli_query($conn,$sqlinsert);
	$sqlinsert="INSERT INTO `patient` (`address`, `dateOfBirth`, `name`, `phoneNumber`, `patientID`, `sex`) VALUES
		('45362 willow dr', '09/12/2001', 'jake glowright', '1-745-987-3245', 'P1', 'male')";
mysqli_query($conn,$sqlinsert);
	$sqlinsert="INSERT INTO `procedures` (`codes`, `otherCodes`, `fees`, `name`, `procedureID`, `other`, `otherFee`, `patientID`) VALUES
		('C151', NULL, '120.50', 'surgery', 'PR1', NULL, NULL, 'P1'),
		('C150', NULL, '30.00', 'patient check-up', 'PR2', NULL, NULL, 'P1')";
mysqli_query($conn,$sqlinsert);
	$sqlinsert="INSERT INTO `schedule` (`emergencyCall`, `scheduleID`, `employeeID`, `date`, `Mon`, `Tue`, `Wed`, `Thu`, `Fri`, `Sat`, `Sun`) VALUES
	(	'yes', 'S1', 'E1', '07/17/2017-07/23/2017', '8-4pm', '8-4pm', '8-4pm', '8-4pm', '8-4pm', NULL, NULL),
		('no', 'S2', 'E1', '07/17/2017-07/23/2017', '8-4pm', '6-12am', '6-12am', '8-4pm', '8-4pm', NULL, NULL)";
mysqli_query($conn,$sqlinsert);
	$sqlinsert="INSERT INTO `surgeries` (`nurseID`, `SurgeryID`, `notes`, `appointmentID`) VALUES
		('E3', 'SU1', 'his shit was broken dawg', 'A2'),
		('E3', 'SU2', 'his shit was broken again dawg', 'A3')";
mysqli_query($conn,$sqlinsert);
	$sqlquery="SET FOREIGN_KEY_CHECKS=1";
mysqli_query($conn,$sqlquery);
}

?>