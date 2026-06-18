<?php

namespace App\Repositories\Contracts;

use App\DTOs\CreatePlayerNoteDTO;
use App\Models\PlayerNote;
use Illuminate\Support\Collection;

interface PlayerNoteRepositoryInterface
{
    public function getByPlayer(int $playerId): Collection;
    public function countByPlayer(int $playerId): int;
    public function create(CreatePlayerNoteDTO $dto): PlayerNote;
}