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
	<a href="http://localhost/InputOHIP.html" class="signin-link" style=float:right>Sign In</a>
</div>

<div class="content">

<?php
include 'connectdb.php';

$siteName = $_POST['which_site'];
//echo $siteName;
$OHIP = $_POST['OHIPnum'];
//echo "   ".$OHIP;
$lotNum = $_POST['VaccineLot'];
//echo "   ".$lotNum;

$data = [
    'OHIPnumber' => $OHIP,
    'VaccineLotNum' => $lotNum,
];



//MySQL connection details.
$host = 'localhost';
$user = 'root';
$pass = '';
$database = 'coviddb';

//Custom PDO options.
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false
);

//Connect to MySQL and instantiate our PDO object.
$pdo = new PDO("mysql:host=$host;dbname=$database", $user, $pass, $options);

$query='SELECT * FROM vaccinelot v WHERE v.lotNumber ="' . $lotNum . '"';


$result=$connection->query($query);


if($result->rowCount() == 0)
{
	//Create our INSERT SQL query.
	$sql = "INSERT INTO `vaccinelot`(`LotNumber`, `DateProduced`, `ExpiryDate`, `Producer`, `ShippedTo`) VALUES (:LotNumber, null, null, null, :ShippedTo)";

	//Prepare our statement.
	$statement = $pdo->prepare($sql);


	//Bind our values to our parameters (we called them :make and :model).
	$statement->bindValue(':LotNumber', $lotNum);
	$statement->bindValue(':ShippedTo', $siteName);


	//Execute the statement and insert our values.
	$inserted = $statement->execute();


	//Because PDOStatement::execute returns a TRUE or FALSE value,
	//we can easily check to see if our insert was successful.
	if($inserted){
		//echo 'Row inserted!<br>';
	}
}



//Create our INSERT SQL query.
$sql = "INSERT INTO `patient`(`OHIPnumber`, `PatientName`, `Birthday`, `TimeReceived`, `DosesReceived`, `VaccineLotNum`) 
VALUES (:OHIPnumber, null, null, null, 1,:VaccineLotNum)";

//Prepare our statement.
$statement = $pdo->prepare($sql);


//Bind our values to our parameters (we called them :make and :model).
$statement->bindValue(':OHIPnumber', $OHIP);
$statement->bindValue(':VaccineLotNum', $lotNum);


//Execute the statement and insert our values.
$inserted = $statement->execute();


//Because PDOStatement::execute returns a TRUE or FALSE value,
//we can easily check to see if our insert was successful.
if($inserted){
    //echo 'Row inserted!<br>';
}

?>
<h1>Updating your vaccine record...</h1>
<?php	
	$query='SELECT * FROM patient p WHERE p.OHIPnumber ="' . $OHIP . '"';
	$result=$connection->query($query);
	
	if($result->rowCount() > 0)
	{
		$query2 = 'SELECT * FROM patient p JOIN vaccinelot v ON p.VaccineLotNum = v.LotNumber WHERE p.OHIPnumber = "' . $OHIP . '"';
		$result = $connection->query($query2);
		while ($row = $result->fetch()) {
			$doses=$row["DosesReceived"];
			$lotnum = $row["VaccineLotNum"];
			$site = $row["ShippedTo"];
			$name = $row["PatientName"];
		}
	}
	
?>


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
	<td class="tg-0lax"><?php echo $OHIP?></td>
	<td class="tg-0lax"><?php echo $doses?></td>
    <td class="tg-0lax"><?php echo $site?></td>
    <td class="tg-0lax"><?php echo $lotnum?></td>
  </tr>
</tbody>
</table>


</div>

</body>
</html>
