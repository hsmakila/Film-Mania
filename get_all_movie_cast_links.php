<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "film_mania";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM actormovielink";
$result = $conn->query($sql);

$cast = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $cast[] = $row;
    }
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($cast);
?>