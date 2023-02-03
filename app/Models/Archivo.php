<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    use HasFactory;
    protected $fillable = ['sneaker_id', 'ubicacion', 'nombre_original'];

    public function sneaker()
    {
        return $this->belongsTo(Sneaker::class);
    }
}
