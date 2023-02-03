<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['nombre', 'apellidos', 'genero', 'telefono', 'calle', 'colonia', 
    'municipio', 'fecha_nac', 'estado_civil', 'email'];
    //protected $guarded =['id'];

    //Un empleado puede hacer muchas ventas
    public function ventas()
    {
        return $this->hasMany(Venta::class);
    }


}

