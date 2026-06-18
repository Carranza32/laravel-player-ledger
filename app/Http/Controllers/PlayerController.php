<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class PlayerController extends Controller
{
    public function index(): View
    {
        $players = User::where('id', '!=', auth()->id())->get();

        return view('players.index', ['players' => $players]);
    }

    public function show(User $player): View
    {
        return view('players.show', ['player' => $player]);
    }
}
