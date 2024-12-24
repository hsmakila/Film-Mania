<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "film_mania";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $query = "SELECT * FROM users WHERE id = '$id'";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    $response = array('success' => true, 'id' => $row['id'], 'name' => $row['name'], 'email' => $row['email'], 'subscribed' => (bool) $row['subscribed']);
} else {
    $response = array('success' => false);
}

header("Content-Type: application/json");
echo json_encode($response);
?>