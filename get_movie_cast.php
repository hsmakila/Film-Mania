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

$query = "SELECT Actor.actor_id, Actor.actor_name
          FROM Actor
          INNER JOIN ActorMovieLink ON Actor.actor_id = ActorMovieLink.actor_id
          WHERE ActorMovieLink.movie_id = $movie_id";

$result = $conn->query($query);

$cast = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $cast[] = array(
            'actor_id' => $row['actor_id'],
            'actor_name' => $row['actor_name']
        );
    }
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($cast);
?>