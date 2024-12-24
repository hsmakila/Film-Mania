<?php
$servername = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbname = 'film_mania';

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbUsername, $dbPassword);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

$keyword = $_POST['keyword'];

$query = <<<'SQL'
    SELECT * FROM faq
    WHERE question LIKE :keyword
    SQL;
$stmt = $conn->prepare($query);
$keywordWithWildcards = '%' . $keyword . '%';
$stmt->bindParam(':keyword', $keywordWithWildcards, PDO::PARAM_STR);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

header("Content-Type: application/json");
echo json_encode($results);
?>