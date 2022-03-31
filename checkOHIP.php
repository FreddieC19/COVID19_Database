<?php
	include 'connectdb.php';

	$OHIPnum = $_POST["OHIPnumber"];


	$query='SELECT * FROM patient p WHERE p.OHIPnumber ="' . $OHIPnum . '"';


	$result=$connection->query($query);
	

	if($result->rowCount() > 0)
	{
		header("Location: showPatient.php?OHIPnum=".$OHIPnum);
	}
	else
	{
		header("Location: patientInfo.php?OHIPnum=".$OHIPnum);
	}
	echo "</ol>";
?>
