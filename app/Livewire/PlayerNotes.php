<?php

namespace App\Livewire;

use App\DTOs\CreatePlayerNoteDTO;
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

    public function saveNote(): void
    {
        $this->form->validate();

        $repository = app(PlayerNoteRepositoryInterface::class);

        $repository->create(new CreatePlayerNoteDTO(
            playerId: $this->playerId,
            authorId: auth()->id(),
            content:  $this->form->content,
        ));

        $this->dispatch('note-saved', noteId: $note->id);
        
        $this->loadNotes();
        $this->form->reset('content');
    }

    private function loadNotes(): void
    {
        $repository = app(PlayerNoteRepositoryInterface::class);
        $this->notes = $repository->getByPlayer($this->playerId);
    }

    #[On('note-saved')]
    public function onNoteSaved(int $noteId): void
    {
        //TODO:: Mostrar un toast para notificar
    }

    public function render()
    {
        return view('livewire.player-notes');
    }
}
