<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit('Deze pagina accepteert alleen POST-requests.');
}

require_once __DIR__ . '/../../config/conn.php';

$gameName = trim($_POST['naam'] ?? '');
$genre    = trim($_POST['genre'] ?? '');
$platform = $_POST['platform'] ?? '';

$validPlatforms = ['None', 'PC','PlayStation','Xbox','NintendoSwitch','Mobiel' ];
$validForm = [];
if (in_array($platform,$validPlatforms)){
echo $platform;
};

die;

$query = "INSERT INTO game (gameName, genre)
          VALUES (:gameName, :genre)";

$statement = $conn->prepare($query);
$statement->execute([
    ':gameName' => $gameName,
    ':genre' => $genre,
]);

header('Location: /gamespark/index.php');
exit;
