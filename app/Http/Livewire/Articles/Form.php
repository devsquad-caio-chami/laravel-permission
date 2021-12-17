<?php

namespace App\Http\Livewire\Articles;

use App\Models\Article;
use App\Models\Section;
use Illuminate\Support\Collection;
use Livewire\Component;

class Form extends Component
{
    public Article $article;

    public Collection $sections;

    public array $rules = [
        'article.name'       => 'required|max:255',
        'article.section_id' => 'required',
        'article.content'    => 'required|max:2048',
    ];

    public function mount()
    {
        $this->sections = Section::all('id', 'name');

        $this->article ??= new Article();
    }

    public function render()
    {
        return view('livewire.articles.form');
    }

    public function store()
    {
        $this->validate();

        $this->article->save();

        $this->redirectRoute('articles.index');
    }
}
