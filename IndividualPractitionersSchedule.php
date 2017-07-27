<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="style.css" type="text/css"></head>
<div class ="box">
	<a href ="index.html">Home</a>
</div>
<br>
<body>
	<div class="box">
		<h3>Select a Practioner name to print out Individual schedule</h3>
	</div>
	<form action="individualPractitionersSchedule.php" method="post">
		<div class="box">
			name:
		</div>
		<br>
		<input type="text" name="fname"><br>
		<div class="box">
		day:
		</div>
		<br>
		<input type="text" name ="day"><br>
		<input type="submit" name="submit" value ="submit">
	</form>
	<?php 
	include('dbconnect.php');
	if(isset($_POST['fname'],$_POST['day'])){
		$Practitioner=$_POST['fname'];
		$day=$_POST['day'];  
		$query="SELECT name FROM employee WHERE job <> 'nurse' AND job <> 'janitor' AND name ='".$Practitioner."' ORDER BY name ASC";
		$result = mysqli_query($conn,$query); 
		echo"<table>";
		echo"<tr><th>Physician</th></tr>";
		if($result->num_rows>0){
			while($row = mysqli_fetch_assoc($result)){
				$name = $row["name"]; 
				echo "<tr><td>".$row["name"]."</td></tr>";
			}
			echo"
			<tr>
				<th>patients name</th>
				<th>description</th>
				<th>time</th>
				<th>day</th></tr>";
				$query2 = "SELECT a.time, a.day,p.name,ap.description FROM employee e, appointmenttime a, 
				appointments ap,patient p WHERE a.day ='".$day."' AND e.employeeID = ap.employeeID 
				AND a.appointmentID = ap.appointmentID AND e.job <> 'nurse' AND e.job <> 'janitor' AND ap.patientID = p.patientID AND e.name = '".$Practitioner."';";
				$result2 = mysqli_query($conn,$query2); 
				while($row2 = mysqli_fetch_assoc($result2)){
					echo "<td>".$row2["name"]."</td><td>".$row2["description"]."</td><td>".$row2["time"]."</td><td>".$row2["day"]."</td></tr>";
				}
			}
			else{
				echo "no results bro"; 
			}
			echo 
			"</table>";

			include('dbclose.php');
		} 
		?>
	</body>
	</html>