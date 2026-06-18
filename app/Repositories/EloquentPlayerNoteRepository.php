<?php

namespace App\Repositories;

use App\DTOs\CreatePlayerNoteDTO;
use App\Models\PlayerNote;
use App\Repositories\Contracts\PlayerNoteRepositoryInterface;
use Illuminate\Support\Collection;

class EloquentPlayerNoteRepository implements PlayerNoteRepositoryInterface
{
    public function getByPlayer(int $playerId): Collection
    {
        return PlayerNote::with('author')
            ->where('player_id', $playerId)
            ->latest()
            ->limit(50)
            ->get();
    }

    public function countByPlayer(int $playerId): int
    {
        return PlayerNote::where('player_id', $playerId)->count();
    }

    public function create(CreatePlayerNoteDTO $dto): PlayerNote
    {
        return PlayerNote::create([
            'player_id' => $dto->playerId,
            'author_id' => $dto->authorId,
            'content'   => $dto->content,
        ]);
    }
}