<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "film_mania";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($query);

    if ($result->num_rows === 1) {
        $response = array('success' => true);
        $row = $result->fetch_assoc();
        session_start();
        $_SESSION['id'] = $row['id'];
    } else {
        $response = array('success' => false, 'message' => 'Invalid email or password.');
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}
?>