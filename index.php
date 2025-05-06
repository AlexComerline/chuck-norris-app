<?php
session_start();

require_once __DIR__ . '/src/Api.php';
require_once __DIR__ . '/src/JokeManager.php';

$api = new Api();
$jokeManager = new JokeManager();

// Reset jokes
if (isset($_POST['reset'])) {
    $jokeManager->resetJokes();
}

// Fetch new joke
if (isset($_POST['get_joke']) && !empty($_POST['category'])) {
    $joke = $api->getJokeByCategory($_POST['category']);
    $jokeManager->addJoke($joke);
}

$categories = $api->getCategories();
$jokes = $jokeManager->getJokes();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chuck Norris Jokes</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h1>Chuck Norris Jokes</h1>
    <form method="POST">
      <div class="form-group">
        <label for="category">Selecciona una categoría:</label>
        <select name="category" id="category">
          <?php foreach ($categories as $cat): ?>
            <option value="<?= htmlspecialchars($cat) ?>"><?= htmlspecialchars($cat) ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="buttons">
        <button type="submit" name="get_joke">Obtener frase</button>
        <button type="submit" name="reset">Eliminar frases</button>
      </div>
    </form>
    <h2>Frases mostradas:</h2>
    <ul id="jokeList">
      <?php foreach ($jokes as $j): ?>
        <li><?= htmlspecialchars($j) ?></li>
      <?php endforeach; ?>
    </ul>
  </div>
  <script src="js/script.js"></script>
</body>
</html>
