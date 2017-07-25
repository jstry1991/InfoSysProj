<html>
<head><link rel="stylesheet" href="style.css" type="text/css"></head>
<a href ="index.html">Home</a>
<body>
<?php
include('dbconnect.php');
if(isset($_REQUEST['submit'])){
	$query=$_POST['query']; 
	$arr = array($query);
	$mystr = $query;
	$arr = explode(' ',trim($mystr));
	$result=mysqli_query($conn,$query);
	if(in_array("select",$arr)OR in_array("SELECT",$arr))
	{
		echo"<table>";
		$first_row = true;
		while ($row = mysqli_fetch_assoc($result)) {
		if ($first_row) {
			$first_row = false;
			echo "<tr>";
			foreach($row as $header => $values) {
				echo "<th>".$header."</th>";
			}
			echo "</tr>";
		}
		echo "<tr>";
		foreach($row as $header => $values) {
			echo '<td>' .$values . '</td>';
		}
		echo '</tr>';
}
	echo("</table>");
	}
}
include('dbclose.php');
?>
<body>
</html>