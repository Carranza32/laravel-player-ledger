<?php

namespace App\Livewire;

use App\DTOs\CreatePlayerNoteDTO;
use App\Livewire\Forms\PlayerNoteForm;
use App\Models\User;
use App\Repositories\Contracts\PlayerNoteRepositoryInterface;
use Illuminate\Support\Collection;
use Livewire\Component;
use Flux\Flux;
use Livewire\Attributes\On; 

class PlayerNotes extends Component
{
    public bool $showSuccessToast = false;
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

    public function saveNote(): void
    {
        $this->form->validate();

        $repository = app(PlayerNoteRepositoryInterface::class);

        $repository->create(new CreatePlayerNoteDTO(
            playerId: $this->playerId,
            authorId: auth()->id(),
            content:  $this->form->content,
        ));

        $this->loadNotes();
        $this->form->reset('content');
        
        Flux::toast(variant: 'success', text: 'Nota guardada exitosamente.');
        $this->dispatch('note-saved');
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
