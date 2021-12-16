<?php

namespace App\Http\Livewire\Sections;

use App\Models\Section;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Lauthz\Facades\Enforcer;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use AuthorizesRequests;

    public function render()
    {
        return view('livewire.sections.index', [
            'sections' => Section::paginate(10),
        ]);
    }

    public function remove(Section $section)
    {
        $this->authorize('delete sections', $section);

        $section->delete();
    }
}
