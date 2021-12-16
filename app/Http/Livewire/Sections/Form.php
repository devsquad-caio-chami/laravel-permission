<?php

namespace App\Http\Livewire\Sections;

use Livewire\Component;
use App\Models\Section;

class Form extends Component
{
    public Section $section;

    public array $rules = [
        'section.name' => 'required|max:255'
    ];

    public function mount()
    {
        $this->section ??= new Section();
    }

    public function render()
    {
        return view('livewire.sections.form');
    }

    public function store()
    {
        $this->validate();

        $this->section->save();

        $this->redirectRoute('sections.index');
    }
}
