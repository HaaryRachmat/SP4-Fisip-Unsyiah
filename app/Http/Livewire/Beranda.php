<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Beranda extends Component
{
    public function render()
    {
        return view('livewire.beranda')->layout('layouts.base');
    }
}
