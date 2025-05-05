document.addEventListener("DOMContentLoaded", function () {
    loadCategories();
    loadStoredJokes();
});

async function loadCategories() {
    const res = await fetch("api.php?action=get_categories");
    const categories = await res.json();

    const select = document.getElementById("category");
    categories.forEach(category => {
        const option = document.createElement("option");
        option.value = category;
        option.textContent = category;
        select.appendChild(option);
    });
}

async function getJoke() {
    const category = document.getElementById("category").value;
    const res = await fetch("api.php?action=get_joke&category=" + encodeURIComponent(category));
    const data = await res.json();

    if (data.joke) {
        addJokeToList(data.joke);
    }
}

function addJokeToList(joke) {
    const ul = document.getElementById("jokeList");
    const li = document.createElement("li");
    li.textContent = joke;
    ul.appendChild(li);
}

async function loadStoredJokes() {
    const res = await fetch("api.php?action=get_stored_jokes");
    const jokes = await res.json();
    updateJokeList(jokes);
}

function updateJokeList(jokes) {
    const ul = document.getElementById("jokeList");
    ul.innerHTML = "";
    jokes.forEach(joke => {
        const li = document.createElement("li");
        li.textContent = joke;
        ul.appendChild(li);
    });
}

async function resetJokes() {
    const res = await fetch('api.php?action=reset_jokes');
    const result = await res.json();

    if (result.success) {
        updateJokeList([]);
    }
}
