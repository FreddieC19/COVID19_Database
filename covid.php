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
	<a href="http://localhost/covid.php">
		<img src="Logo.png" alt="alternatetext" width="171" height="135" style=float:left>
	</a>
	<h1>COVID-19 Vaccine Database</h1>
</div>

<div class="topnav">
  <a class="active" href="covid.php">Home</a>
  <a href="InputOHIP.html">Check Vaccination Status</a>
  <a href="patientDatabase.php">Patient Database</a>
  <a href="workerDatabase.php">Worker Database</a>
  <a href="siteInfo.php">Site Information</a>
</div>

<div class="content">
<?php
include 'connectdb.php';
?>

	<h1>COVID-19 really stinks... but it can stink less if you get vaccinated!</h1>

	<h2>The Health Department has walk-in opportunities at community immunization clinics for:</h2> <ul>
		<li>Individuals 5 to 11 years old: Moderna, Pfizer, Astra Zeneca or Johnson & Johnson (First or second dose)</li>
		<li>Individuals 12 to 29 years old: Moderna, Pfizer, Astra Zeneca or Johnson & Johnson (First, second or third dose)</li>
		<li>Individuals 30 years and older: Moderna, Pfizer, Astra Zeneca or Johnson & Johnson (First, second or third dose)</li>
	</ul>
	
	<h2>Been Vaccinated?</h2>
	<p>Click below to check your vaccination status:</p>
	<button onclick="document.location='InputOHIP.html'">Check Now</button>
</div>

</body>
</html>
