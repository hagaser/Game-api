<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title> <!-- There no need look here, there is nothing interesting -->
</head>
<body>
    <h1>This api supports next requests:</h1>
    <h3>1) GET http://127.0.0.1:8000/api/games - get all games in table</h3>
    <h3>2) GET http://127.0.0.1:8000/api/games/{id} - get game by id</h3>
    <h3>3) DELETE http://127.0.0.1:8000/api/games/{id} - delete game by id</h3>
    <h3>4) POST http://127.0.0.1:8000/api/games - add new game (requests JSON)</h3>
    <h3>5) PUT http://127.0.0.1:8000/api/games{id} - update game by id (requests JSON)</h3>
    <h3>6) GET http://127.0.0.1:8000/api/games?genres={genre1},{genre2} - get all games with this geners (can be used more or less genres in link)</h3>
    <h1>Code examples that you can write into the browser console:</h1>
    <h3>1) get all games:</h3>
    <pre>
fetch('http://127.0.0.1:8000/api/games', {
    method: 'GET',
    headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json'
    }
})
.then(response => response.json())
.then(data => console.log('Games in genres:', data))
.catch(error => console.error('Error:', error));
    </pre>
    <h3>2) get game by id:</h3>
    <pre>
const gameId = 3; // your id HERE

fetch(`http://127.0.0.1:8000/api/games/${gameId}`, {
    method: 'GET',
    headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json'
    }
})
.then(response => response.json())
.then(data => console.log('Games in genres:', data))
.catch(error => console.error('Error:', error));
    </pre>
    <h3>3) delete game by id:</h3>
    <pre>
const gameId = 3; // your id HERE

fetch(`/api/games/${gameId}`, {
    method: 'DELETE',
    headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json'
    }
})
.then(response => {
    if (response.ok) {
        console.log('Game deleted successfully');
    } else {
        console.error('Error deleting game:', response.statusText);
    }
})
.catch(error => console.error('Error:', error));
    </pre>
    <h3>4) add new game:</h3>
    <pre>
const gameData = { // your game data HERE
    name: "Some name",
    developer: "Some developer",
    genres: ["Some", "Genres"]
};


fetch('/api/games', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json'
    },
    body: JSON.stringify(gameData)
})
.then(response => response.json())
.then(data => console.log('Game added:', data))
.catch(error => console.error('Error:', error));
    </pre>
    <h3>5) update game by id:</h3>
    <pre>
const gameId = 3; // your id HERE
const updatedGameData = { // your new game data HERE
    name: "Updated Game Name",
    developer: "Updated Developer",
    genres: ["Updated Genre1", "Updated Genre2"]
};


fetch(`/api/games/${gameId}`, {
    method: 'PUT',
    headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json'
    },
    body: JSON.stringify(updatedGameData)
})
.then(response => response.json())
.then(data => console.log('Game updated:', data))
.catch(error => console.error('Error:', error));
    </pre>
    <h3>6) get all games by geners:</h3>
    <pre>
const genres = ["FPS", "Survival"]; // your genres HERE


fetch(`/api/games?genres=${encodeURIComponent(genres.join(','))}`, {
    method: 'GET',
    headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json'
    }
})
.then(response => response.json())
.then(data => console.log('Games in genres:', data))
.catch(error => console.error('Error:', error));
    </pre>
    <h1>The end &#128077;</h1>
</body>
</html>