<!DOCTYPE html>
<html lang="en">
<head>
<title>Vaccine Database</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styleSheet.css">
<style>
table {
  border-collapse: collapse;
  width: 50%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
  background-color: #3b57ff;
  color: white;
}

</style>

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
  <a class = "active" href="patientDatabase.php">Patient Database</a>
  <a href="#about">Worker Database</a>
  <a href="siteInfo.php">Site Information</a>
</div>

<div class="content">

<?php	
	include "connectdb.php";
	
	$OHIPnum = $_GET["OHIPnum"];
	
	$query='SELECT * FROM patient p WHERE p.OHIPnumber ="' . $OHIPnum . '"';
	$result=$connection->query($query);
	
	if($result->rowCount() > 0)
	{
		$query2 = 'SELECT * FROM patient p JOIN vaccinelot v ON p.VaccineLotNum = v.LotNumber WHERE p.OHIPnumber = "' . $OHIPnum . '"';
		$result = $connection->query($query2);
		while ($row = $result->fetch()) {
			$doses=$row["DosesReceived"];
			$lotnum = $row["VaccineLotNum"];
			$site = $row["ShippedTo"];
			$name = $row["PatientName"];
		}
	}
	
?>

<h1>Welcome back, <?php echo $name?></h1>

<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
  overflow:hidden;padding:10px 5px;word-break:normal;}
.tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
  font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
.tg .tg-0lax{text-align:left;vertical-align:top}
</style>
<table class="tg">
<thead>
  <tr>
	<th class="tg-0lax">OHIP Number</th>
    <th class="tg-0lax">Number of Doses</th>
    <th class="tg-0lax">Site Received</th>
    <th class="tg-0lax">Vaccine Lot Number</th>
  </tr>
</thead>
<tbody>
  <tr>
	<td class="tg-0lax"><?php echo $OHIPnum?></td>
	<td class="tg-0lax"><?php echo $doses?></td>
    <td class="tg-0lax"><?php echo $site?></td>
    <td class="tg-0lax"><?php echo $lotnum?></td>
  </tr>
</tbody>
</table>

</div>

</body>
</html>

