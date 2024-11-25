<?php

namespace App\Http\Controllers;

use App\Http\Requests\GameRequest;
use App\Services\GameService;
use Illuminate\Http\Request;

class GameController extends Controller
{
    protected $gameService;

    public function __construct(GameService $gameService)
    {
        $this->gameService = $gameService;
    }

    public function store(GameRequest $request)
    {
        $game = $this->gameService->createGame($request->all());
        return response()->json($game, 201);
    }

    public function index(Request $request)
    {
        $games = $this->gameService->getGames($request->all());
        return response()->json($games);
    }

    public function show($id)
    {
        $game = $this->gameService->getGameById($id);
        return response()->json($game);
    }

    public function update(GameRequest $request, $id)
    {
        $game = $this->gameService->updateGame($request->all(), $id);
        return response()->json($game, 200);
    }

    public function destroy($id)
    {
        $this->gameService->deleteGame($id);
        return response()->json(null, 204);
    }
}
