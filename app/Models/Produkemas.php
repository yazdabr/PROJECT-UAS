<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produkemas extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'description',
        'photo', // Include the image_path in fillable
    ];

    // Optionally, you can use an accessor to get the full URL of the image.
    public function getImageUrlAttribute()
    {
        return Storage::url($this->photo); // Get the full URL for the image
    }
    public function transaksiemas()
    {
        return $this->hasMany(Transaksiemas::class);
    }
}

    
