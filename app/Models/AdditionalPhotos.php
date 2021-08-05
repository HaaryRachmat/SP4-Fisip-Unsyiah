<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdditionalPhotos extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function galeri()
    {
        return $this->belongsTo(Galeri::class, 'galeri_id', 'id');
    }
}
