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
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $response = array('success' => false, 'message' => 'User already registered. Try to Sign In.');
    } else {
        // $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $insertQuery = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";

        if ($conn->query($insertQuery) === TRUE) {
            $response = array('success' => true, 'message' => 'User registered successfully.');
        } else {
            $response = array('success' => false, 'message' => 'Error registering user: ' . $conn->error);
        }

        $response = array('success' => true);
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}
?>