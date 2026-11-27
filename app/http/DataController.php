<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit('Deze pagina accepteert alleen POST-requests.');
}

require_once __DIR__ . '/../../config/conn.php';

$gameName = trim($_POST['naam'] ?? '');
$genre    = trim($_POST['genre'] ?? '');
$platform = $_POST['platform'] ?? '';
$releasejaar = $_POST['releasejaar'] ?? '';
$status = $_POST['status'] ?? '';
$beoordeling = $_POST['beoordeling'] ?? '';
$errors = [];
if (isset($_FILES['afbeelding'])) {
    $afbeelding = $_FILES['afbeelding'];


    if ($afbeelding['error'] == 0) {
        $name = $afbeelding['name'];
        $type = $afbeelding['type'];
        $data = file_get_contents($afbeelding['tmp_name']);
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
        if (in_array($type, $allowed_types)) {
        } else {
            echo "Invalid file type. Only JPEG, PNG, and GIF are allowed.";
        }
    } else {
        echo "Upload error occurred.";
        die;
    };
} else {
    echo 'is wrong no work';
};
$validPlatforms = ['None', 'PC', 'PlayStation', 'Xbox', 'NintendoSwitch', 'Mobiel'];
$validGenres = ['Actie', 'Avontuur', 'RPG','Shooter', 'Platformer', 'Simulatie', 'Strategie', 'Sport', 'Race', 'Puzzel'];
if (!in_array($platform, $validPlatforms)) {
    $errors[] = 'Invalid Platform';
};
if (!in_array($genre, $validGenres)) {
    $errors[] = 'Invalid Genre';
};

// Releasejaar: hele getal tussen 1950 en 2100 (zelfde als min/max in het formulier)
$releasejaar = filter_var($releasejaar, FILTER_VALIDATE_INT, [
    'options' => ['min_range' => 1950, 'max_range' => 2100],
]);
if ($releasejaar === false) {
    $errors[] = 'Invalid Releasejaar (1950-2100)';
};

// Status: moet een van de opties uit het formulier zijn
$validStatuses = ['Wishlist', 'In bezit', 'Speelt nu', 'Uitgespeeld'];
if (!in_array($status, $validStatuses, true)) {
    $errors[] = 'Invalid Status';
};

// Beoordeling: hele getal tussen 1 en 10
$beoordeling = filter_var($beoordeling, FILTER_VALIDATE_INT, [
    'options' => ['min_range' => 1, 'max_range' => 10],
]);
if ($beoordeling === false) {
    $errors[] = 'Invalid Beoordeling (1-10)';
};

// Stop als er fouten zijn, anders gaat de INSERT gewoon door
if (!empty($errors)) {
    foreach ($errors as $error) {
        echo $error . '<br>';
    }
    exit;
};



$query = "INSERT INTO game (gameName, genre)
          VALUES (:gameName, :genre)";

$statement = $conn->prepare($query);
$statement->execute([
    ':gameName' => $gameName,
    ':genre' => $genre,
]);

header('Location: /gamespark/index.php');
exit;
