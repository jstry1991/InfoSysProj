<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="style.css" type="text/css"></head>
<body>
	<?php
	include('dbconnect.php');
$query ="SELECT * FROM clinic";
$result = mysqli_query($conn,$query);
echo
"<table>
<tr>
	<th> address</th>
	<th> clinicID</th>
	<th> phoneNumber</th>
	<th> name</th>
</tr>";
if ($result->num_rows > 0) {
while ($row = mysqli_fetch_assoc($result)){ //Creates a loop through results
	if ($row)
		echo "<tr><td>".$row["address"]."</td><td>".$row["clinicID"]."</td><td>".$row["phoneNumber"]."</td><td>".$row["name"]."</td></tr>";
}
}
else {
	echo "DIDN'T FIND ANYTHING";
}
echo 
"</table>";

include('dbclose.php'); 
?>
</body>
</html>