<!DOCTYPE html>
<html lang="en">
<head>
<title>Vaccine Database</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styleSheet.css">

</head>
<body>

<div class="header">
	<a href="http://localhost/covid_db.php">
		<img src="Logo.png" alt="alternatetext" width="171" height="135" style=float:left>
	</a>
	<h1>COVID-19 Vaccine Database</h1>
</div>

<div class="topnav">
  <a href="covid_db.php">Home</a>
  <a href="InputOHIP.html">Check Vaccination Status</a>
  <a class="active" href="patientDatabase.php">Patient Database</a>
  <a href="workerDatabase.php">Worker Database</a>
  <a href="siteInfo.php">Site Information</a>
</div>

<div class="content">

<h1>Please select which patient's vaccination status you would like to see:</h1>

<?php
	include 'connectdb.php';
	$result = $connection->query("SELECT * FROM patient p JOIN vaccinelot v ON v.LotNumber = p.VaccineLotNum");
	echo "<ul>";
	while ($row = $result->fetch()) {
		echo "<li>";
		$name = $row["PatientName"];
		$OHIPnum = $row["OHIPnumber"];
		echo '<a href="showPatient.php?OHIPnum='. $OHIPnum .'"> ' . $name . ''.'</a>'.'</li>';
	}
	echo "</ul>";
?>

</div>

</body>
</html>
