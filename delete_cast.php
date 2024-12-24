<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "film_mania";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$actor_id = $_GET['cast_id'];

$query1 = "DELETE FROM ActorMovieLink WHERE actor_id = '$actor_id'";

if ($conn->query($query1) === TRUE) {
    $query2 = "DELETE FROM actor WHERE actor_id = '$actor_id'";
    if ($conn->query($query2) === TRUE) {
        $response = array('success' => true, 'message' => 'Deleted the Cast and links successfully.');
        if (file_exists("Images/Cast/c$actor_id.jpg")) {
            unlink("Images/Cast/c$actor_id.jpg");
        }
    } else {
        $response = array('success' => false, 'message' => 'Links to categories deleted successfully. But unable to delete the cast.');
    }
} else {
    $response = array('success' => false, 'message' => 'Unable to delete cast and links.');
}

header('Content-Type: application/json');
echo json_encode($response);

?>