<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;

    protected $fillable = [
        'file_name',
        'judul',
        'tanggal',
        'deskripsi'
    ];

    public function getAdditionalPhotos()
    {
        // return $this->hasMany('App\Models\AdditionalPhotos');
        return $this->hasMany(AdditionalPhotos::class, 'galeri_id', 'id');
    }
}
