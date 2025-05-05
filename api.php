<?php
session_start();

header('Content-Type: application/json');

$action = $_GET['action'] ?? '';
$category = $_GET['category'] ?? '';

function fetchFromApi($url) {
    $response = file_get_contents($url);
    return json_decode($response, true);
}

if ($action === 'get_categories') {
    $categories = fetchFromApi('https://api.chucknorris.io/jokes/categories');
    echo json_encode($categories);
    exit;
}

if ($action === 'get_joke' && $category) {
    $jokeData = fetchFromApi("https://api.chucknorris.io/jokes/random?category=" . urlencode($category));
    $joke = $jokeData['value'] ?? 'No joke found.';

    // Save in session
    if (!isset($_SESSION['jokes'])) {
        $_SESSION['jokes'] = [];
    }
    $_SESSION['jokes'][] = $joke;

    echo json_encode([
        'joke' => $joke,
        'all_jokes' => $_SESSION['jokes']
    ]);
    exit;
}

if ($action === 'get_saved_jokes') {
    echo json_encode($_SESSION['jokes'] ?? []);
    exit;
}

echo json_encode(['error' => 'Invalid request']);
