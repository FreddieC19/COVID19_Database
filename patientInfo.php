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
  <a class="active" href="InputOHIP.html">Check Vaccination Status</a>
  <a href="#notyet">Patient Database</a>
  <a href="#about">Worker Database</a>
  <a href="#about">Site Information</a>
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

		<br><input type="submit" value="Submit">
	</form>
</div>

</body>
</html>