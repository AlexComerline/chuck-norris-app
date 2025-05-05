<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Chuck Norris Jokes</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Chuck Norris Jokes</h1>

    <div>
        <label for="category">Selecciona una categoría:</label>
        <select id="category"></select>
        <button onclick="getJoke()">Obtener frase</button>
        <button onclick="resetJokes()" style="margin-top: 10px; background-color: #e74c3c;">
    Eliminar todas las frases
</button>
    </div>

    <h2>Frases mostradas:</h2>
    <ul id="jokeList"></ul>

    <script>
        async function resetJokes() {
            const res = await fetch('api.php?action=reset_jokes');
            const result = await res.json();

            if (result.success) {
                updateJokeList([]);
            }
        }

        async function loadCategories() {
            const res = await fetch('api.php?action=get_categories');
            const categories = await res.json();
            const select = document.getElementById('category');
            categories.forEach(cat => {
                const option = document.createElement('option');
                option.value = cat;
                option.textContent = cat;
                select.appendChild(option);
            });
        }

        async function getJoke() {
            const category = document.getElementById('category').value;
            const res = await fetch('api.php?action=get_joke&category=' + encodeURIComponent(category));
            const data = await res.json();
            updateJokeList(data.all_jokes);
        }

        async function loadSavedJokes() {
            const res = await fetch('api.php?action=get_saved_jokes');
            const jokes = await res.json();
            updateJokeList(jokes);
        }

        function updateJokeList(jokes) {
            const list = document.getElementById('jokeList');
            list.innerHTML = '';
            jokes.forEach(joke => {
                const li = document.createElement('li');
                li.textContent = joke;
                list.appendChild(li);
            });
        }

        // Init
        loadCategories();
        loadSavedJokes();
    </script>
</body>
</html>
