<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="style.css" type="text/css"></head>
<div class ="box">
	<a href ="index.html">Home</a>
</div>
<body>
<form action="operating_room_schedule.php" method="post">
<br>
<div class="box">
  day:
  </div>
  <br>
  <input type="text" name="day"><br>
  <input type="submit" name="submit" value ="submit">
</form>
<?php
include('dbconnect.php');
if(isset($_POST['day'])){
$day=$_POST['day'];
	include('dbconnect.php');
$query="SELECT *, e.name as e_name 
		FROM appointments a 
		INNER JOIN employee e ON e.employeeID=a.employeeID 
		INNER JOIN appointmenttime ap ON ap.appointmentID = a.appointmentID
		INNER JOIN surgeries s ON s.appointmentID = a.appointmentID WHERE ap.day ='".$day."' AND s.results iS NULL";
$result = mysqli_query($conn,$query);
echo
"<table>
<tr>
	<th>surgons name</th>
	<th>day</th>
	<th>date</th>
	<th>time</th>
</tr>";
if ($result->num_rows > 0) {
while ($row = mysqli_fetch_assoc($result)){ //Creates a loop through results
	if ($row){
		echo "<tr><td>".$row["e_name"]."</td><td>".$row["day"]."</td><td>".$row["date"]."</td><td>".$row["time"]."</td></tr>";
	}
else {
	echo "DIDN'T FIND ANYTHING";
}
}
}
echo 
"</table>";

include('dbclose.php'); 
}
?>
</body>
</html>