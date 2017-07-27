<html>
<head><link rel="stylesheet" href="style.css" type="text/css"></head>
<div class ="box">
	<a href ="index.html">Home</a>
</div>
<?php include('Crud.php');

if(isset($_GET['edit'])) {
	$patientID = $_GET['edit'];
	$edit_state = true;
	$rec = mysqli_query($conn, "SELECT p.address as patientAddress, p.dateOfBirth as patientDateOfBirth, p.name as patientName, p.phoneNumber as patientNumber, p.patientID as patientID, p.sex as patientSex FROM patient as p WHERE patientID = '$patientID'");
	$record = mysqli_fetch_array($rec);

	$patientName = $record['patientName'];
	$patientID = $record['patientID'];
	$patientAddress = $record['patientAddress'];
	$patientDateOfBirth = $record['patientDateOfBirth'];
	$patientNumber = $record['patientNumber'];
	$patientSex = $record['patientSex'];

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
				<th>Patient Address</th>
				<th>Patient Number</th>
				<th>Patient Sex</th>
				<th>Patient Date Of Birth</th>
				<th>Patient ID</th>
				<th colspan="2">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php while($row = mysqli_fetch_array($results)) { ?>
			<tr>
				<td><?php echo $row['patientName'] ?></td>
				<td><?php echo $row['patientAddress'] ?></td>
				<td><?php echo $row['patientNumber'] ?></td>
				<td><?php echo $row['patientSex'] ?></td>
				<td><?php echo $row['patientDateOfBirth'] ?></td>
				<td><?php echo $row['patientID'] ?></td>
				<td>
					<a href="CRUDview.php?edit=<?php echo $row['patientID']; ?>">Edit</a>
				</td>
				<td> 
					<a href="CRUDview.php?delete=<?php echo $row['patientID']; ?>">Delete</a>
				</td>	
			</tr>

			<?php } ?>
		</table>
		<form method="post" action="Crud.php">
			<input type="hidden" name="patienID" value ="<?php echo $patientID ?>">
			<br>
			<div class ="box">
				<label>Patient Name</label>
			</div>
			<input type="text" name="patientName" placeholder=" First Last" value ="<?php echo $patientName?>">	
			<div class ="box">
				<label>Patient Address</label>
			</div>
			<input type="text" name="patientAddress" placeholder=" 123 First Ave." value ="<?php echo $patientAddress ?>">
			<div class ="box">
				<label>Patient Number</label>
			</div>
			<input type="text" name="patientNumber" placeholder="1-222-333-4455" value ="<?php echo $patientNumber ?>">
			<br/><br/>
			<div class ="box">
				<label>Patient Sex</label>
			</div>
			<input type="text" name="patientSex" placeholder="male/female" value ="<?php echo $patientSex ?>">
			<div class ="box">
				<label>Patient Date of Birth</label>
			</div>
			<input type="text" name="patientDateOfBirth" placeholder="mm/dd/yy" value ="<?php echo $patientDateOfBirth ?>">	
			<div class ="box">
				<label>Patient ID</label>
			</div>
			<input type="text" name="patientID" placeholder="P1" value ="<?php echo $patientID ?>">	<br><br>


			<?php if($edit_state == false): ?>
				<button type="submit" name="save">Save</button>
			<?php else: ?>
				<button type="submit" name="edit">Edit</button>
			<?php endif ?>

		</form>
	</body>
	</html>