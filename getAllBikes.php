<?php
$conn = new mysqli("localhost", "root", "", "bikes");

if ($conn->connect_error) {
	die("DB Connect error: " . $conn->conect_error);
}

$jsonString = "[";

$sql = "SELECT * FROM bikes";
$result = $conn = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
		$jsonString .= '{"id": ' . $row["id"] .  ",";
        $jsonString .= '"description": "' . $row["description"] . '",';
		$jsonString .= '"imagename": "' . $row["imagename"] . '",';
		$jsonString .= '"size": ' . $row["size"] . ',';
		$jsonString .= '"color": "' . $row["color"] . '",';
		$jsonString .= '"status": "' . $row["status"] . '"},';
    }
}else {
    die("Error: no records in bikes database");
}	
$jsonString = rtrim($jsonString, ",");
$jsonString = $jsonString . "]";
echo $jsonString;
?>