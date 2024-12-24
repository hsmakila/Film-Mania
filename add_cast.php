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
    $name = $_POST["name"];

    // Insert data into the database
    $sql = "INSERT INTO actor (actor_name) 
            VALUES ('$name')";

    if ($conn->query($sql) === TRUE) {
        $castId = $conn->insert_id; // Get the generated movie ID

        // Construct image file name
        $photoFileName = "c" . $castId . ".jpg";

        // Upload poster image
        if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] === UPLOAD_ERR_OK) {
            move_uploaded_file($_FILES["photo"]["tmp_name"], "Images/Cast/" . $photoFileName);
        }

        header("Location: admin.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>