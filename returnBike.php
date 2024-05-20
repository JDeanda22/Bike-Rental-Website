<?php
if (!(isset($_GET["id"]))) {
	die("Error: invalid parameters");
}

$conn = new mysqli("localhost", "root", "", "bikes");

$sql = "UPDATE bikes SET status='Available' WHERE id=" . $_GET["id"];
if ($conn->query($sql) === true) {
	echo "Success";
} else {
    die("Error: " . $conn->error);
}
?>