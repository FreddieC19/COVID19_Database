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
		<img src="https://www.gusd.net//cms/lib/CA01000648/Centricity/Domain/55/Vaccine.png" alt="alternatetext" width="158" height="133" style=float:left>
	</a>
	<h1>Welcome to the COVID-19 Vaccine Database</h1>
</div>

<div class="topnav">
  <a href="covid_db.php">Home</a>
  <a href="InputOHIP.html">Check Vaccination Status</a>
  <a class="active" href="patientDatabase.php">Patient Database</a>
  <a href="#about">Worker Database</a>
  <a href="#about">Site Information</a>
</div>

<div class="content">


<?php
	include 'connectdb.php';
	include 'getPatientInfo.php';
?>

</div>

</body>
</html>
