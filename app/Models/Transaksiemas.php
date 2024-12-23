<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksiemas extends Model
{
    use HasFactory;

    protected $fillable = [
        'produkemas_id',
        'personal_id',
        'quantity',
        'total_price',
        'transaction_photo',
        'transaction_date',
    ];

    public function produkemas()
    {
        return $this->belongsTo(Produkemas::class);
    }

    public function personal()
    {
        return $this->belongsTo(Personal::class);
    }
}
