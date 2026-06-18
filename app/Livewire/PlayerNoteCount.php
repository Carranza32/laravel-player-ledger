<?php

namespace App\Livewire;

use App\Repositories\Contracts\PlayerNoteRepositoryInterface;
use Livewire\Component;
use Livewire\Attributes\On;

class PlayerNoteCount extends Component
{
    public int $playerId;
    public int $count = 0;

    public function mount(int $playerId): void
    {
        $this->playerId = $playerId;
        $this->count = app(PlayerNoteRepositoryInterface::class)->countByPlayer($playerId);
    }

    #[On('note-saved')]
    public function refresh(): void
    {
        $this->count = app(PlayerNoteRepositoryInterface::class)->countByPlayer($this->playerId);
    }

    public function render()
    {
        return view('livewire.player-note-count');
    }
}
