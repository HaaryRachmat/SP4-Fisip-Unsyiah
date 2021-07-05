<?php

namespace App\Http\Livewire;

use App\Models\Galeri as ModelsGaleri;
use Livewire\Component;

class Galeri extends Component
{
    public $galeris;
    public function render()
    {
        $this->galeris = ModelsGaleri::all();
        return view('livewire.galeri')->layout('layouts.base');
    }
}
