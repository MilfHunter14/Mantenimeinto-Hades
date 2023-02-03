<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sneaker extends Model
{
    use HasFactory;
    protected $fillable = ['nombre',
    'marca', 'precio', 'talla', 'stock'];

    public $timestamps = false;

    //Muchos sneakers puede ser vendido en muchas ventas
    public function ventas()
    {
        return $this->belongsToMany(Venta::class);
    }

    //Un sneaker puede tener una o muchos archivos
    public function archivos()
    {
        return $this->hasMany(Archivo::class);
    }
}
