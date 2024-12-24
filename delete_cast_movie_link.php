<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "film_mania";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$link_id = $_GET['link_id'];

$query1 = "DELETE FROM ActorMovieLink WHERE link_id = '$link_id'";

if ($conn->query($query1) === TRUE) {
    $response = array('success' => true, 'message' => 'Deleted Link.');
} else {
    $response = array('success' => false, 'message' => 'Unable to delete link.');
}

header('Content-Type: application/json');
echo json_encode($response);

?>