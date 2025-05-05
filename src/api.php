<?php
require_once 'classes/ChuckNorrisAPI.php';

header('Content-Type: application/json');
$api = new ChuckNorrisAPI();

$action = $_GET['action'] ?? '';

switch ($action) {
    case 'get_categories':
        echo json_encode($api->getCategories());
        break;

    case 'get_joke':
        $category = $_GET['category'] ?? '';
        if ($category) {
            $joke = $api->getRandomJokeByCategory($category);
            echo json_encode(['joke' => $joke]);
        } else {
            echo json_encode(['error' => 'Category required']);
        }
        break;

    case 'get_stored_jokes':
        echo json_encode($api->getStoredJokes());
        break;

    case 'reset_jokes':
        $api->resetJokes();
        echo json_encode(['success' => true]);
        break;

    default:
        echo json_encode(['error' => 'Invalid action']);
        break;
}
