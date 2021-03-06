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
  <a href="covid.php">Home</a>
  <a class="active" href="InputOHIP.html">Check Vaccination Status</a>
  <a href="patientDatabase.php">Patient Database</a>
  <a href="workerDatabase.php">Worker Database</a>
  <a href="siteInfo.php">Site Information</a>
</div>

<div class="content">
	<h1>Please input your information below:</h1>
 
	 <?php $OHIPnum = $_GET['OHIPnum']; ?>
	 
	<form method="POST" action="updateInfo.php">
		<label for="OHIPnum">OHIP Number:</label><br>
		<input type="text" id="OHIPnum" name="OHIPnum" value=<?php echo $OHIPnum?>><br>

		<p>Please select which site you would like to receive your vaccine at:</p>
		<input type="radio" id="dennys" name="which_site" value="Denny's">
		<label for="dennys">Denny's</label><br>
		<input type="radio" id="donCheadle" name="which_site" value="Don Cheadle Community Centre">
		<label for="donCheadle">Don Cheadle Community Centre</label><br>
		<input type="radio" id="dkCentre" name="which_site" value="Donkey Kong Frozen Ape Centre">
		<label for="dkCentre">Donkey Kong Frozen Ape Centre</label><br>
		<input type="radio" id="stinky" name="which_site" value="Stinky Pete's Fun House">
		<label for="stinky">Stinky Pete's Fun House</label><br>
		<input type="radio" id="UoW" name="which_site" value="University of Whitby">
		<label for="UoW">University of Whitby</label><br>
		<input type="radio" id="jesse" name="which_site" value="Walter White's RV o' Fun">
		<label for="jesse">Walter White's RV o' Fun</label><br>

		<br><label for="VaccineLot">Please enter the vaccine lot number you received:</label><br>
		<input type="text" id="VaccineLot" name="VaccineLot"><br>
		
		<br><label for="name">Please enter your FULL name (First name and Last name):</label><br>
		<input type="text" id="name" name="name"><br>
		
		<br><label for="bday">Please select your date of birth:</label><br>
		<input type="date" id="bday" name="bday"><br>
		
		<br><label for="doseTime">Please enter the date and time the vaccine was received:</label><br>
		<input type="datetime-local" id="doseTime" name="doseTime"><br>

		<br><input type="submit" value="Submit">
	</form>
</div>

</body>
</html>
