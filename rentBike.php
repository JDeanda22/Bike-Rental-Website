<?php
if (isset($_GET["id"]) and isset($__GET["renterName"])) {
	die("Error: invalid parameters");
}

$conn = new mysqli("localhost", "root", "", "bikes");
//$sql = "INSERT INTO history (renterName, daterented, bikesid)";
//$sql .= " VALUES ('" . $_GET["renterName"] . "', '" . date("Y/m/d") . "', " . $_GET["id"] . ")";

$stmt = $conn->prepare("INSERT INTO history (renterName, daterented, bikesid) VALUES (?, ?, ?)");
$date = date("Y/m/d");
$stmt->bind_param("ssi", $_GET["renterName"], $date, $_GET["id"]);

if ($stmt->execute() != true) {
    die("Error: " . $conn->error);
}

$sql = "UPDATE bikes SET status='Rented' WHERE id=" . $_GET["id"];
if ($conn->query($sql) === true) {
	echo "Success";
} else {
    die("Error: " . $conn->error);
}
	
?>