<!DOCTYPE html>
<html>
<body>
	<?php
	include('dbconnect.php');
$query ="SELECT * FROM druginfo";
$result = mysqli_query($conn,$query);
echo
"<table>
<tr>
	<th> cost | </th>
	<th> description | </th>
	<th> drugID | </th>
	<th> name | </th>
	<th> warning | </th>
</tr>";
if ($result->num_rows > 0) {
while ($row = mysqli_fetch_assoc($result)){ //Creates a loop through results
	if ($row)
		echo "<tr><td>".$row["cost"]."</td><td>".$row["description"]."</td><td>".$row["drugID"]."</td><td>".$row["name"]
	."</td><td>".$row["warning"]."</td></tr>";
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