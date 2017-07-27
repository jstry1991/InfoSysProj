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
		header('location: index.html');
	?>

	<?php

	if(isset($_REQUEST['populate'])){
		$sqlquery="SET FOREIGN_KEY_CHECKS=0";
		mysqli_query($conn,$sqlquery);
		$sqlinsert="INSERT INTO `appointments` (`appointmentID`, `cost`, `description`, `roomNumber`, `visitType`, `employeeID`, `patientID`, `diagnosis`, `procedureID`) VALUES
		('A1', '$12.00', 'stomach pains', 1, 'walk-in', 'E1', 'P1', 'ulcer', ''),
		('A2', '$30.00', 'fractured bone', 2, 'scheduled', 'E2', 'P2', 'broken arm', 'PR1'),
		('A3', '$5.00', 'head ache', 5, 'scheduled', 'E4', 'P3', 'migraine', ''),
		('A4', '$50.00', 'flu', 8, 'walk-in', 'E7', 'P4', 'common cold', ''),
		('A5', '9000.00', 'organ transplant', 12, 'scheduled', 'E3', 'P5', 'heart transplant', 'PR9'),
		('A6', '$6000.00', 'sore Back', 3, 'walk-in', 'E1', 'P6', 'scoliosis', 'PR3'),
		('A7', '$150.00', 'broken finger', 9, 'walk-in', 'E2', 'P7', 'broken finger', 'PR1'),
		('A8', '$666.00', 'Seeing ghosts', 6, 'scheduled', 'E5', 'P8', 'send them away', 'PR666'),
		('A9', '$400.00', 'fractured bone', 27, 'scheduled', 'E2', 'P9', 'broken arm', 'PR1'),
		('A10', '$8000.00', 'knee removal', 20, 'scheduled', 'E2', 'P10', 'knees are broken', 'PR1')";
		mysqli_query($conn,$sqlinsert);
		$sqlinsert="INSERT INTO `appointmenttime` (`day`, `time`, `appTimeID`, `date`, `appointmentID`) VALUES
		('monday', '8:00', 'AT1', '07/03/2017', 'A1'),
		('tuesday', '10:00', 'AT2', '07/11/2017', 'A2'),
		('wednesday', '11:00', 'AT3', '07/19/2017', 'A3'),
		('thursday', '9:00', 'AT4', '07/27/2017', 'A4'),
		('friday', '13:00', 'AT5', '07/21/2017', 'A5'),
		('saturday', '9:30', 'AT6', '07/15/2017', 'A6'),
		('sunday', '14:00', 'AT7', '07/2/2017', 'A7'),
		('wednesday', '6:00', 'AT8', '07/12/2017', 'A8'),
		('tuesday', '6:06', 'AT9', '07/18/2017', 'A9'),
		('monday', '8:00', 'AT10', '07/31/2017', 'A10')";
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
		('$20.00', 'Abilify is used to treat the symptoms of psychotic conditions such as schizophrenia and bipolar I disorder', 'D1', 'Abilify', 'Common Abilify side effects may include, weight gain, blurred vision, nausea, vomiting, changes in appetite, sneezing, sore throat.'),
		('$10.00','Ibuprofen is used to help reduce fever in children and adults','D2','Ibuprofen','DO NOT use ibuprofen in children under the age of 6 months.'),
		('$30.00','Gauifenesin helps break up mucus','D3','Guaifenesin','Do not take more than 4 times per day'),
		('$60.00','Rolaids releives hear burn, sour stomach, etc.','D4','Rolaids','Ask doctor before taking'),
		('$25.00','Midol is used to temporarily relieve minor aches and paines','D5','Midol','May cause an allergic reaction'),
		('$15.00','Execdrin is used to temporarily relieve minor aches and pains due to headaches','D6','Excedrin','Reyes syndrome'),
		('$16.00','Claritin is used to relieve symptoms due to hay fever or upper respiratory allergies','D7','Claritin','Do not use if you have an allergic reaction to this product or any of its ingredients'),
		('$22.00','Orajel is used as an oral pain relieve','D8','Orajel','Do not take more than directed'),
		('$32.00','Cortaid is used to temporarily relieve itching associated with minor skin irritations','D9','Cortaid','Do not use more than once per day'),
		('$80.00','Cepacol Antibacterial helps prevent and reduce plaque that leads to gingivitis','D10','CepacolAntibacterial','Ask a dentist before using')";
		mysqli_query($conn,$sqlinsert);
		$sqlinsert="INSERT INTO `employee` (`address`, `name`, `phoneNumber`, `job`, `taxID`, `employeeID`) VALUES
		('67543 Willow Dr', 'Bob Billing', '1-313-234-6543', 'surgeon', 784563920, 'E1'),
		('546372 Weatherstone Dr', 'Kathy Kensingon', '1-654-734-76354', 'doctor', 78654328, 'E2'),
		('74532 Maple Dr', 'Nancy Neugen', '1-810-543-9732', 'nurse', 543982730, 'E3'),
		('57354 Big Beaver Rd', 'Amy Andrews', '1-248-858-1283', 'doctor', 48593038, 'E4'),
		('7243 Long Pine Rd', 'Simon Simmons', '1-234-654-9453', 'pharmacist', 49585676, 'E5'),
		('9028 Willow Creek Rd', 'Tom Torreto', '1-835-734-8764', 'physiatric', 48593962, 'E6'),
		('6721 South Bend St', 'Rick Reinhardt', '1-945-246-5432', 'nurse', 08472331, 'E7'),
		('132 Maplehurst Dr.', 'Jane Johnson', '1-543-834-4231', 'doctor', 09821443, 'E8'),
		('5743 Forgetful Rd.', 'Mary Middlesetin', '1-356-834-3546', 'pharmacist', 56402830, 'E9'),
		('2643 Old Willow Ave.', 'Larry Lanestrom', '1-723-452-1246', 'surgeon', 57839375, 'E10')";
		mysqli_query($conn,$sqlinsert);
		$sqlinsert="INSERT INTO `fees` (`amountOwed`, `amountPaid`, `datePaid`, `dateIssued`, `feeID`, `patientID`, `totalBalance`) VALUES
		('$6.00', '$6.00', '07/03/2017', '07/03/2017', 'F1', 'P1', '$12.00'),
		('$15.00', '$15.00', '07/13/2017', '07/11/2017', 'F2', 'P2', '$30.00'),
		('$0.00', '$5.00', '07/23/2017', '07/19/2017', 'F3', 'P3', '$5.00'),
		('$20.00', '$30.00', '07/28/2017', '07/27/2017', 'F4', 'P4', '$50.00'),
		('$9000.00', '$0.00', '07/25/2017', '07/21/2017', 'F5', 'P5', '$9000.00'),
		('$1000.00', '$5000.00', '07/19/2017', '07/15/2017', 'F6', 'P6', '$6000.00'),
		('$100.00', '$50.00', '07/05/2017', '07/02/2017', 'F7', 'P7', '$150.00'),
		('$166.00', '$500.00', '07/17/2017', '07/12/2017', 'F8', 'P8', '$666.00'),
		('$375.00', '$25.00', '07/20/2017', '07/18/2017', 'F9', 'P9', '$400.00'),
		('$7999.00', '$1.00', '07/31/2017', '07/31/2017', 'F10', 'P10', '$8000.00')";
		mysqli_query($conn,$sqlinsert);
		$sqlinsert="INSERT INTO `insurance` (`company`, `insuranceID`, `drugID`, `policyType`, `patientID`) VALUES
		('Total Health', 'I1', 'D1', 'EPO', 'P1'),
		('Cigna Health Group','I2','D2','HMO','P2'),
		('Best Insurance','I3','D3','POS','P3'),
		('Better Than Best','I4','D4','PPO','P4'),
		('Wellcare Group','I5','D5','PPO','P5'),
		('Humana Group','I6','D6','HMO','P6'),
		('HCSC Group','I7','D7','POS','P7'),
		('Wellpoint Inc. Group','I8','D8','EPO','P8'),
		('Unitedhealth Group','I9','D9','HMO','P9'),
		('Better Insurance','I10','D10','EPO','P10')";
		mysqli_query($conn,$sqlinsert);
		$sqlinsert="INSERT INTO `labtest` (`cost`, `employeeID`, `patientID`, `result`, `testDate`, `testID`, `testTime`, `testType`) VALUES
		('$20.00', 'E1', 'P1', 'positive', '05/24/2000', 'T1', '12:30pm', 'physical'),
		('$50.00', 'E5', 'P2', 'negative', '05/24/2000', 'T2', '12:30pm', 'x-ray'),
		('$10.00', 'E6', 'P3', 'positive', '05/24/2000', 'T3', '12:30pm', 'physical'),
		('$22.00', 'E4', 'P4', 'positive', '05/24/2000', 'T4', '12:30pm', 'physical'),
		('$300.00', 'E9', 'P5', 'negative', '05/24/2000', 'T5', '12:30pm', 'cat-scan'),
		('$200.00', 'E8', 'P6', 'negative', '05/24/2000', 'T6', '12:30pm', 'cat-scan'),
		('$80.00', 'E5', 'P7', 'positive', '05/24/2000', 'T7', '12:30pm', 'x-ray'),
		('$90.00', 'E6', 'P8', 'negative', '05/24/2000', 'T8', '12:30pm', 'mental health test'),
		('$20.00', 'E8', 'P9', 'positive', '05/24/2000', 'T9', '12:30pm', 'x-ray'),
		('$250.00', 'E1', 'P10', 'positive', '05/24/2000', 'T10', '12:30pm', 'x-ray')";
		mysqli_query($conn,$sqlinsert);
		$sqlinsert="INSERT INTO `medication` (`rxNumber`, `dateFilled`, `directions`, `drugName`, `employeeID`, `form`, `medicationID`, `numberOfRefills`, `originalDate`, `patientID`, `quantity`, `strength`, `pharmacistID`, `drugID`) VALUES
		('rx672432', '07/19/2017', 'take one pill everyday in the morning', 'Abilify', 'E1', 'tablet', 'M1', 3, '07/04/2017', 'P1', 15, '10mg', 'E5', 'D1'),
		('rx239044', '07/17/2017', 'take two everyday in the morning', 'Ibuprofen', 'E4', 'tablet', 'M2', 6, '07/12/2017', 'P2', 10, '10mg', 'E5', 'D2'),
		('rx103030', '08/13/2017', 'take one before sleeping', 'Gauifenesin', 'E3', 'tablet', 'M3', 1, '07/23/2017', 'P3', 20, '10mg', 'E9', 'D3'),
		('rx658493', '08/13/2017', 'take one during meals', 'Rolaids', 'E2', 'tablet', 'M4', 3, '07/29/2017', 'P4', 15, '10mg', 'E4', 'D4'),
		('rx202021', '09/01/2017', 'take before bed', 'Midol', 'E6', 'tablet', 'M5', 2, '07/24/2017', 'P5', 40, '10mg', 'E9', 'D5'),
		('rx407850', '08/05/2017', 'take two during meals', 'Execdrin', 'E8', 'tablet', 'M6', 2, '07/16/2017', 'P6', 40, '10mg', 'E9', 'D6'),
		('rx022034', '07/10/2017', 'take twice a day', 'Claritin', 'E10', 'tablet', 'M7', 5, '07/05/2017', 'P7', 10, '10mg', 'E9', 'D7'),
		('rx302302', '08/05/2017', 'take one in the morning', 'Orajel', 'E3', 'tablet', 'M8', 3, '07/12/2017', 'P8', 30, '10mg', 'E5', 'D8'),
		('rx393013', '07/20/2017', 'take every four hours', 'Cortaid', 'E4', 'tablet', 'M9', 2, '07/19/2017', 'P9', 20, '10mg', 'E9', 'D9'),
		('rx303039', '08/06/2017', 'take every six hours', 'Cepacol', 'E2', 'tablet', 'M10', 4, '07/31/2017', 'P10', 25, '10mg', 'E5', 'D10')";
		mysqli_query($conn,$sqlinsert);
		$sqlinsert="INSERT INTO `patient` (`address`, `dateOfBirth`, `name`, `phoneNumber`, `patientID`, `sex`) VALUES
		('45362 Willow Dr', '09/12/1993', 'Jake Glowright', '1-745-987-3245', 'P1', 'male'),
		('12342 Goodfello St', '04/31/1985', 'Clark Kent', '1-324-624-5456', 'P2', 'male'),
		('1293 Hammer Dr', '03/17/2010', 'Kal El', '1-432-654-1234', 'P3', 'male'),
		('94922 Delldes Rd', '02/03/1993', 'Oliver Queen', '1-734-734-8864', 'P4', 'male'),
		('10248 Hydro Dr', '02/16/1990', 'Bruce Wayne', '1-123-654-9300', 'P5', 'male'),
		('86043 Spring Water Dr', '10/31/1990', 'Natasha Romanoff', '1-534-678-4367', 'P6', 'female'),
		('49028 Tapping Way Dr.', '11/25/1991', 'Peter Parker', '1-346-363-4567', 'P7', 'male'),
		('12312 Scracher Lane', '01/01/1992', 'Mary Jane', '1-345-664-1135', 'P8', 'femal'),
		('02130 Samsung Blvd', '07/04/1988', 'Pepper Pots', '1-744-245-4325', 'P9', 'female'),
		('19238 Apple Lane', '02/04/1993', 'Wally West', '1-432-765-2467', 'P10', 'male')";
		mysqli_query($conn,$sqlinsert);
		$sqlinsert="INSERT INTO `procedures` (`codes`, `otherCodes`, `fees`, `name`, `procedureID`, `other`, `otherFee`, `patientID`) VALUES
		('C151', NULL, '120.00', 'surgery', 'PR1', NULL, NULL, 'P1'),
		('C100', NULL, '30.00', 'patient check-up', 'PR2', NULL, NULL, 'P2'),
		('C200', NULL, '900.00', 'biopsy test', 'PR3', NULL, NULL, 'P3'),
		('C342', NULL, '300.00', 'urinalysis', 'PR4', NULL, NULL, 'P4'),
		('C543', NULL, '150.00', 'colonoscopy', 'PR5', NULL, NULL, 'P5'),
		('C645', NULL, '330.00', 'stool test', 'PR6', NULL, NULL, 'P6'),
		('C432', NULL, '200.00', 'gastrocopy', 'PR7', NULL, NULL, 'P7'),
		('C324', NULL, '220.00', 'aortography', 'PR8', NULL, NULL, 'P8'),
		('C754', NULL, '180.00', 'cardiac stress test', 'PR9', NULL, NULL, 'P9'),
		('C999', NULL, '50.00', 'otoscopy', 'PR10', NULL, NULL, 'P10')";
		mysqli_query($conn,$sqlinsert);
		$sqlinsert="INSERT INTO `schedule` (`emergencyCall`, `scheduleID`, `employeeID`, `date`, `Mon`, `Tue`, `Wed`, `Thu`, `Fri`, `Sat`, `Sun`) VALUES
		('yes', 'S1', 'E1', '07/17/2017-07/23/2017', '8-4pm', '8-4pm', '8-4pm', '12-12am', '8-4pm', '12-12am', '8-4pm'),
		('no', 'S2', 'E2', '07/17/2017-07/23/2017', '9-5pm', '6-12am', '6-12am', '8-4pm', '9-7am', '8-4pm', '9-7am'),
		('yes', 'S3', 'E3', '07/17/2017-07/23/2017', '12-9pm', '12-12am', '12-9pm', '9-7am', '8-4pm','9-7am', '8-4pm'),
		('no', 'S4', 'E4', '07/17/2017-07/23/2017', '11-6pm', '6-12am', '12-12am', '8-4pm', '8-4pm', '8-4pm', '8-4pm'),
		('no', 'S5', 'E5', '07/17/2017-07/23/2017', '9-7am', '9-7am', '6-12am', '8-4pm', '8-4pm','8-4pm', '8-4pm'),
		('yes', 'S6', 'E6', '07/17/2017-07/23/2017', '9-7am', '6-12am', '12-12am', '8-4pm', '12-12am', '8-4pm', '12-12am'),
		('no', 'S7', 'E7', '07/17/2017-07/23/2017', '8-4pm', '12-9pm', '11-6pm', '8-4pm', '8-4pm','8-4pm', '8-4pm'),
		('yes', 'S8', 'E8', '07/17/2017-07/23/2017', '8-4pm', '12-9pm', '6-12am', '12-12am', '8-4pm','12-12am', '8-4pm'),
		('yes', 'S9', 'E9', '07/17/2017-07/23/2017', '10-8pm', '12-12am', '6-12am', '8-4pm', '12-12am', '8-4pm', '12-12am'),
		('yes', 'S10', 'E10', '07/17/2017-07/23/2017', '12-12am', '6-12am', '6-12am', '12-9pm', '8-4pm', '12-9pm', '8-4pm')";
		mysqli_query($conn,$sqlinsert);
		$sqlinsert="INSERT INTO `surgeries` (`nurseID`, `SurgeryID`, `notes`, `appointmentID`, `results`) VALUES
		('E1', 'SU1', 'Heart transplant', 'A5', 'completed'),
		('E10', 'SU2', 'fractured arm', 'A2', 'completed'),
		('E10', 'SU3', 'knees are broken', 'A10', 'completed'),
		('E10', 'SU4', 'broken arm', 'A7', 'completed'),
		('E1', 'SU5', 'kidney stones were found', 'A1', 'completed'),
		('E1', 'SU6', 'colonoscopy', 'A1', NULL),
		('E1', 'SU7', 'head trauma', 'A2', 'completed'),
		('E1', 'SU8', 'broken back', 'A6', NULL),
		('E10', 'SU9', 'broken legs', 'A10', 'completed'),
		('E10', 'SU10', 'broken hands', 'A2', NULL)";

		mysqli_query($conn,$sqlinsert);
		$sqlquery="SET FOREIGN_KEY_CHECKS=1";
		mysqli_query($conn,$sqlquery);
	}
		header('location: index.html');
	?>