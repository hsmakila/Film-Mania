<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "film_mania";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $link_movie_id = $_POST["link_movie_id"];
    $link_cast_id = $_POST["link_cast_id"];

    // Insert data into the database
    $sql = "INSERT INTO actormovielink (movie_id, actor_id) VALUES ('$link_movie_id', '$link_cast_id')";

    if ($conn->query($sql) === TRUE) {
        $castId = $conn->insert_id; // Get the generated movie ID

        header("Location: admin.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>