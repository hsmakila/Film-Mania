<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "film_mania";

$movieId = $_GET['movie_id'];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM Movie JOIN Category ON Movie.category_id = Category.category_id WHERE movie_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $movieId);
$stmt->execute();

$result = $stmt->get_result();
$movie = $result->fetch_assoc();

$stmt->close();
$conn->close();

if ($movie) {
    header('Content-Type: application/json');
    echo json_encode($movie);
} else {
    http_response_code(404); // Set response code to indicate not found
    echo json_encode(array("error" => "Movie not found"));
}
?>