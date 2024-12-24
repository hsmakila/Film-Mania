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
    $query = "DELETE FROM users WHERE id = '$id'";

    if ($conn->query($query) === TRUE) {
        $response = array('success' => true, 'message' => 'User deleted successfully.');
    } else {
        $response = array('success' => false, 'message' => 'Error deleting user: ' . $conn->error);
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

?>