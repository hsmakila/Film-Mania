<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "film_mania";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$category_id = intval($_GET['category_id']);
$movie_id = intval($_GET['movie_id']);

$sql = "SELECT movie_id, title, release_date, director, runtime_minutes, category_id FROM Movie WHERE category_id = $category_id AND movie_id != $movie_id ORDER BY release_date DESC LIMIT 4";

$result = $conn->query($sql);

$movies = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $movies[] = $row;
    }
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($movies);
?>