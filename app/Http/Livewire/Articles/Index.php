<?php

namespace App\Http\Livewire\Articles;

use App\Models\Article;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class Index extends Component
{
    use AuthorizesRequests;

    public function render()
    {
        return view('livewire.articles.index', [
            'articles' => Article::paginate(10),
        ]);
    }

    public function remove(Article $article)
    {
        $this->authorize('delete articles', $article);

        $article->delete();
    }
}
