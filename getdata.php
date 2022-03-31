<?php
	$result = $connection->query("select * from healthcareworker");
	echo "<ol>";
	while ($row = $result->fetch()) {
		echo "<li>";
		echo $row["Name"]." - ".$row["WorkerID"]."</li>";
	}
	echo "</ol>";
?>