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
    $title = $_POST["title"];
    $releaseDate = $_POST["releaseDate"];
    $summary = $_POST["summary"];
    $director = $_POST["director"];
    $runtime = $_POST["runtime"];
    $trailer = $_POST["trailer"];
    $category = $_POST["category"];

    // Insert data into the database
    $sql = "INSERT INTO movie (title, release_date, summary, director, runtime_minutes, trailer_url, category_id) 
            VALUES ('$title', '$releaseDate', '$summary', '$director', $runtime, '$trailer', '$category')";

    if ($conn->query($sql) === TRUE) {
        $movieId = $conn->insert_id; // Get the generated movie ID

        // Construct image file name
        $posterFileName = "p" . $movieId . ".jpg";

        // Upload poster image
        if (isset($_FILES["poster"]) && $_FILES["poster"]["error"] === UPLOAD_ERR_OK) {
            move_uploaded_file($_FILES["poster"]["tmp_name"], "Images/Posters/" . $posterFileName);
        }

        header("admin.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>