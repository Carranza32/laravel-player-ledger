<?php

namespace App\DTOs;

readonly class CreatePlayerNoteDTO
{
    public function __construct(
        public int $playerId,
        public int $authorId,
        public string $content,
    ) {}
}