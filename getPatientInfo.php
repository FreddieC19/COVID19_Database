<?php
$result = $connection->query("SELECT * FROM patient p JOIN vaccinelot v ON v.LotNumber = p.VaccineLotNum");
echo "<ul>";
while ($row = $result->fetch()) {
	echo "<li>";
	$name = $row["PatientName"];
	$ohip = $row["OHIPnumber"];
	echo "<a href='showPatient.php?OHIPnum=<?php echo $ohip->OHIPnum; ?>'><?php echo $name?></a>"."</li>";
}
echo "</ul>";
?>