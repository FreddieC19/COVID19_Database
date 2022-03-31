<!DOCTYPE html>
<html lang="en">
<head>
<title>Vaccine Database</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styleSheet.css">
<style>

.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
  width: 60.72%;
}

.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

.tab button:hover {
  background-color: #ddd;
}

.tab button.active {
  background-color: #ccc;
}

.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
  width: 59.55%;
}
</style>
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
  <a href="patientDatabase.php">Patient Database</a>
  <a class="active" href="workerDatabase.php">Worker Database</a>
  <a href="siteInfo.php">Site Information</a>
</div>

<div class="content">
	
	<?php include 'connectdb.php'; ?>
	<h1>Worker Database</h1>
	<h2>Please select your preferred vaccination site:</h2>
	<div class="tab">
		<button class="tablinks" onclick="openSite(event, 'dennys')">Denny's</button>
		<button class="tablinks" onclick="openSite(event, 'donCheadle')">Don Cheadle Community Centre</button>
		<button class="tablinks" onclick="openSite(event, 'dkCentre')">Donkey Kong Frozen Ape Centre</button>
		<button class="tablinks" onclick="openSite(event, 'stinky')">Stinky Pete's Fun House</button>
		<button class="tablinks" onclick="openSite(event, 'UoW')">University of Whitby</button>
		<button class="tablinks" onclick="openSite(event, 'jesse')">Walter White's RV o' Fun</button>
	</div>

	<div id="dennys" class="tabcontent">
		<p> The following workers are at Denny's: </p>
		<?php
			$result = $connection->query("select * from healthcareworker h WHERE h.SiteName = 'Denny\'s'");
			echo "<ul>";
			while ($row = $result->fetch()) {
				echo "<li>";
				echo $row["Name"]." - ".$row["DrOrRN"]."</li>";
			}
			echo "</ul>";
		?>
		
		
	</div>

	<div id="donCheadle" class="tabcontent">
		<p> The following workers are at the Don Cheadle Community Centre: </p>
		<?php
			$result = $connection->query("select * from healthcareworker h WHERE h.SiteName = 'Don Cheadle Community Centre'");
			echo "<ul>";
			while ($row = $result->fetch()) {
				echo "<li>";
				echo $row["Name"]." - ".$row["DrOrRN"]."</li>";
			}
			echo "</ul>";
		?>
		
	</div>

	<div id="dkCentre" class="tabcontent">
		<p> The following workers are at the Donkey Kong Frozen Ape Centre: </p>
		<?php
			$result = $connection->query("select * from healthcareworker h WHERE h.SiteName = 'Donkey Kong Frozen Ape Centre'");
			echo "<ul>";
			while ($row = $result->fetch()) {
				echo "<li>";
				echo $row["Name"]." - ".$row["DrOrRN"]."</li>";
			}
			echo "</ul>";
		?>
		
	</div>
	
	<div id="stinky" class="tabcontent">
		<p> The following workers are at Stinky Pete's Fun House: </p>
		<?php
			$result = $connection->query("select * from healthcareworker h WHERE h.SiteName = 'Stinky Pete\'s Fun House'");
			echo "<ul>";
			while ($row = $result->fetch()) {
				echo "<li>";
				echo $row["Name"]." - ".$row["DrOrRN"]."</li>";
			}
			echo "</ul>";
		?>
	</div>
	
	<div id="UoW" class="tabcontent">
		<p> The following workers are at the University of Whitby: </p>
		<?php
			$result = $connection->query("select * from healthcareworker h WHERE h.SiteName = 'University of Whitby'");
			echo "<ul>";
			while ($row = $result->fetch()) {
				echo "<li>";
				echo $row["Name"]." - ".$row["DrOrRN"]."</li>";
			}
			echo "</ul>";
		?>
		
	</div>
	
	<div id="jesse" class="tabcontent">
		<p> The following workers are at Walter White's RV o' Fun: </p>
		<?php
			$result = $connection->query("select * from healthcareworker h WHERE h.SiteName = 'Walter White\'s RV o\' Fun'");
			echo "<ul>";
			while ($row = $result->fetch()) {
				echo "<li>";
				echo $row["Name"]." - ".$row["DrOrRN"]."</li>";
			}
			echo "</ul>";
		?>
	</div>

	<script>
	function openSite(evt, siteName) {
	  var i, tabcontent, tablinks;
	  tabcontent = document.getElementsByClassName("tabcontent");
	  for (i = 0; i < tabcontent.length; i++) {
		tabcontent[i].style.display = "none";
	  }
	  tablinks = document.getElementsByClassName("tablinks");
	  for (i = 0; i < tablinks.length; i++) {
		tablinks[i].className = tablinks[i].className.replace(" active", "");
	  }
	  document.getElementById(siteName).style.display = "block";
	  evt.currentTarget.className += " active";
	}
	</script>
</div>

</body>
</html>
