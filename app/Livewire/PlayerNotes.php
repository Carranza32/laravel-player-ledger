<?php

namespace App\Livewire;

use App\Livewire\Forms\PlayerNoteForm;
use App\Models\User;
use App\Repositories\Contracts\PlayerNoteRepositoryInterface;
use Illuminate\Support\Collection;
use Livewire\Component;

class PlayerNotes extends Component
{
    public PlayerNoteForm $form;
    public Collection $notes;
    public int $playerId;
    public $player;

    public function mount(int $playerId, User $player): void
    {
        $this->playerId = $playerId;
        $this->player = $player;
        
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
