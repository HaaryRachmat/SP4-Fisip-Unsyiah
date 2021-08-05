<?php

namespace App\Http\Livewire;

use App\Models\AdditionalPhotos as ModelsAdditionalPhotos;
use Livewire\Component;

class AdditionalPhotos extends Component
{
    public $galeri_id;

    // protected $listener = [
    //     'galeriId',
    // ];

    // public function galeriId($id)
    // {
    //     $this->galeri_id = $id;
    // }

    public function render()
    {
        return view(
            'livewire.additional-photos',
            [
                "additionalPhotos" => ModelsAdditionalPhotos::where('galeri_id', $this->galeri_id)->get()
            ]
        );
    }
}
