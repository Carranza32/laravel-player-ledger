<?php

namespace App\Livewire;

use App\Livewire\Forms\PlayerNoteForm;
use App\Repositories\Contracts\PlayerNoteRepositoryInterface;
use Illuminate\Support\Collection;
use Livewire\Component;

class PlayerNotes extends Component
{
    public PlayerNoteForm $form;
    public Collection $notes;
    public int $playerId;

    public function mount(int $playerId): void
    {
        $this->playerId = $playerId;
        $this->loadNotes();
    }

    private function loadNotes(): void
    {
        $repository = app(PlayerNoteRepositoryInterface::class);
        $this->notes = $repository->getByPlayer($this->playerId);
    }

    public function render()
    {
        return view('livewire.player-notes');
    }
}
