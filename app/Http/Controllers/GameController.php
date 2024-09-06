<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function store(Request $request)
    {
        $game = Game::create($request->only(['name', 'developer']));

        foreach ($request->genres as $genreName) {
            $game->genreNames()->create(['genreName' => $genreName]);
        }

        return response()->json($game->load('genreNames'), 201);
    }

    public function index(Request $request)
    {
    $query = Game::with('genreNames');

    if ($request->has('genres')) {
        $genres = explode(',', $request->genres);
        $query->whereHas('genreNames', function($q) use ($genres) {
            $q->whereIn('genreName', $genres);
        }, '=', count($genres));
    }

    return $query->get();
    }


    public function show($id)
    {
        return Game::with('genreNames')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $game = Game::findOrFail($id);
        $game->update($request->only(['name', 'developer']));

        $game->genreNames()->delete();
        foreach ($request->genres as $genreName) {
            $game->genreNames()->create(['genreName' => $genreName]);
        }

        return response()->json($game->load('genreNames'), 200);
    }

    public function destroy($id)
    {
        $game = Game::findOrFail($id);
        $game->delete();

        return response()->json(null, 204);
    }
}
