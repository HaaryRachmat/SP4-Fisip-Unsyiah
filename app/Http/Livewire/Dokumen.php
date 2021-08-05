<?php

namespace App\Http\Livewire;

use App\Models\Dokumen as ModelsDokumen;
use Livewire\Component;
use Livewire\WithPagination;

class Dokumen extends Component
{
    use WithPagination;
    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    protected $updateQueryString = ['search'];

    public function render()
    {
        if ($this->search) {
            $dokumens =  ModelsDokumen::where('nama', 'like', '%' . $this->search . '%')->paginate(5);
        } else {
            $dokumens =  ModelsDokumen::latest()->paginate(5);
        }
        return view(
            'livewire.dokumen',
            [
                'dokumens' => $dokumens
            ]
        )->layout('layouts.base');
    }
}
