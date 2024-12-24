<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "film_mania";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$keyword = $_GET['keyword'];

$sql = "SELECT movie_id, title, release_date, director, runtime_minutes, category_id FROM Movie WHERE title LIKE '%$keyword%'";

if (isset($_GET['category_id']) && is_numeric($_GET['category_id'])) {
    $category_id = intval($_GET['category_id']);
    $sql .= " AND category_id = $category_id";
}

$sql .= " ORDER BY release_date DESC";

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