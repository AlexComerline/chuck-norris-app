<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Chuck Norris Jokes</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Chuck Norris Jokes</h1>

        <label for="category">Selecciona una categoría:</label>
        <select id="category"></select>

        <div class="buttons">
            <button onclick="getJoke()">Obtener frase</button>
            <button onclick="resetJokes()">Eliminar todas las frases</button>
        </div>

        <h2>Frases mostradas:</h2>
        <ul id="jokeList"></ul>
    </div>
    
    <script src="script.js"></script>
</body>
</html>
