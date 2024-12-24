<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "film_mania";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$movie_id = $_GET['movie_id'];

$query1 = "DELETE FROM ActorMovieLink WHERE movie_id = '$movie_id'";

if ($conn->query($query1) === TRUE) {
    $query2 = "DELETE FROM movie WHERE movie_id = '$movie_id'";
    if ($conn->query($query2) === TRUE) {
        $response = array('success' => true, 'message' => 'Deleted the movie and links successfully.');
        if (file_exists("Images/Posters/p$movie_id.jpg")) {
            unlink("Images/Posters/p$movie_id.jpg");
        }
    } else {
        $response = array('success' => false, 'message' => 'Links to categories deleted successfully. But unable to delete the movie.');
    }
} else {
    $response = array('success' => false, 'message' => 'Unable to delete movie links with categories.');
}

header('Content-Type: application/json');
echo json_encode($response);

?>