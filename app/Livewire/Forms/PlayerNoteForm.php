<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class PlayerNoteForm extends Form
{
    #[Validate('required|string|max:500')]
    public string $content = '';
}
