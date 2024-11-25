<?php

namespace App\Services;

use App\Models\Game;

class GameService
{
    public function createGame(array $data)
    {
        $game = Game::create($data);
        $this->syncGenres($game, $data['genres']);
        return $game->load('genreNames');
    }

    public function getGames(array $filters)
    {
        $query = Game::with('genreNames');

        if (isset($filters['genres'])) {
            $genres = explode(',', $filters['genres']);
            $query->whereHas('genreNames', function($q) use ($genres) {
                $q->whereIn('genreName', $genres);
            }, '=', count($genres));
        }

        return $query->get();
    }

    public function getGameById($id)
    {
        return Game::with('genreNames')->findOrFail($id);
    }

    public function updateGame(array $data, $id)
    {
        $game = Game::findOrFail($id);
        $game->update($data);
        $this->syncGenres($game, $data['genres']);
        return $game->load('genreNames');
    }

    public function deleteGame($id)
    {
        $game = Game::findOrFail($id);
        $game->delete();
    }

    protected function syncGenres($game, $genres)
    {
        $game->genreNames()->delete();
        foreach ($genres as $genreName) {
            $game->genreNames()->create(['genreName' => $genreName]);
        }
    }
}