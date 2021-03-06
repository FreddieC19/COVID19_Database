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
  width: 23.35%;
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
  width: 22.20%;
}
</style>
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
  <a href="InputOHIP.html">Check Vaccination Status</a>
  <a href="patientDatabase.php">Patient Database</a>
  <a href="workerDatabase.php">Worker Database</a>
  <a class="active" href="siteInfo.php">Site Information</a>
</div>

<div class="content">
	
	<?php include 'connectdb.php'; ?>
	<h1>Site Information</h1>
	<h2>Please select your preferred brand of vaccine</h2>
	<div class="tab">
		<button class="tablinks" onclick="openBrand(event, 'Astra')">Astra Zeneca</button>
		<button class="tablinks" onclick="openBrand(event, 'JandJ')">Johnson & Johnson</button>
		<button class="tablinks" onclick="openBrand(event, 'Moderna')">Moderna</button>
		<button class="tablinks" onclick="openBrand(event, 'Pfizer')">Pfizer</button>
	</div>

	<div id="Astra" class="tabcontent">
		<p> The following sites carry Astra Zeneca vaccines: </p>
		<?php
			$result = $connection->query("select * from vaccinelot v WHERE v.Producer = 'Astra Zeneca'");
			echo "<ul>";
			while ($row = $result->fetch()) {
				echo "<li>";
				echo $row["ShippedTo"]." - ".$row["NumDoses"]." doses are available at this site"."</li>";
			}
			echo "</ul>";
		?>
	</div>

	<div id="JandJ" class="tabcontent">
		<p> The following sites carry Johnson & Johnson vaccines: </p>
		<?php
			$result = $connection->query("select * from vaccinelot v WHERE v.Producer = 'Johnson&Johnson'");
			echo "<ul>";
			while ($row = $result->fetch()) {
				echo "<li>";
				echo $row["ShippedTo"]." - ".$row["NumDoses"]." doses are available at this site"."</li>";
			}
			echo "</ul>";
		?>
	</div>

	<div id="Moderna" class="tabcontent">
		<p> The following sites carry Moderna vaccines: </p>
		<?php
			$result = $connection->query("select * from vaccinelot v WHERE v.Producer = 'Moderna'");
			echo "<ul>";
			while ($row = $result->fetch()) {
				echo "<li>";
				echo $row["ShippedTo"]." - ".$row["NumDoses"]." doses are available at this site"."</li>";
			}
			echo "</ul>";
		?>
	</div>
	
	<div id="Pfizer" class="tabcontent">
		<p> The following sites carry Pfizer vaccines: </p>
		<?php
			$result = $connection->query("select * from vaccinelot v WHERE v.Producer = 'Pfizer'");
			echo "<ul>";
			while ($row = $result->fetch()) {
				echo "<li>";
				echo $row["ShippedTo"]." - ".$row["NumDoses"]." doses are available at this site"."</li>";
			}
			echo "</ul>";
		?>
	</div>

	<script>
	function openBrand(evt, cityName) {
	  var i, tabcontent, tablinks;
	  tabcontent = document.getElementsByClassName("tabcontent");
	  for (i = 0; i < tabcontent.length; i++) {
		tabcontent[i].style.display = "none";
	  }
	  tablinks = document.getElementsByClassName("tablinks");
	  for (i = 0; i < tablinks.length; i++) {
		tablinks[i].className = tablinks[i].className.replace(" active", "");
	  }
	  document.getElementById(cityName).style.display = "block";
	  evt.currentTarget.className += " active";
	}
	</script>
</div>

</body>
</html>
