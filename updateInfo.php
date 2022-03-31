<?php
include 'connectdb.php';

$siteName = $_POST['which_site'];
$OHIP = $_POST['OHIPnum'];
$lotNum = $_POST['VaccineLot'];
$name = $_POST['name'];
$bday = $_POST['bday'];
$doseTime = $_POST['doseTime'];


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
	$sql = "INSERT INTO `vaccinelot`(`LotNumber`, `DateProduced`, `ExpiryDate`, `Producer`, `ShippedTo`, `NumDoses`) VALUES (:LotNumber, null, null, null, :ShippedTo, null)";

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
VALUES (:OHIPnumber, :PatientName, :Birthday, :TimeReceived, 1,:VaccineLotNum)";

//Prepare our statement.
$statement = $pdo->prepare($sql);


//Bind our values to our parameters (we called them :make and :model).
$statement->bindValue(':OHIPnumber', $OHIP);
$statement->bindValue(':VaccineLotNum', $lotNum);
$statement->bindValue(':PatientName', $name);
$statement->bindValue(':Birthday', $bday);
$statement->bindValue(':TimeReceived', $doseTime);


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
		header("Location: showPatient.php?OHIPnum=".$OHIP);
	}
	
?>