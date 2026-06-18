<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Repositories\Contracts\UserRepositoryInterface;

class PlayerController extends Controller
{
    public function __construct(
        private readonly UserRepositoryInterface $userRepository
    ) {}

    public function index(): View
    {
        $players = $this->userRepository->getAllExcept(auth()->id());

        return view('players.index', ['players' => $players]);
    }

    public function show(User $player): View
    {
        return view('players.show', ['player' => $player]);
    }
}
