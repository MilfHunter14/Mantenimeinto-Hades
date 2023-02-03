<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/* Incluimo la librería para obtener las herramientas necesarias de SoftDeletes */
use Illuminate\Database\Eloquent\SoftDeletes;

class Venta extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $timestamps = false;
    protected $fillable = ['empleado_id', 'fecha_venta', 'forma_pago', 'user_id'];

    //Una venta puede ser hecha por muchas empleados
    public function empleado()
    {
        return $this->belongsTo(Empleado::class);
    }

    //Muchos sneakers puede ser vendido en muchas ventas
    public function sneakers()
    {
        return $this->belongsToMany(Sneaker::class);
    }

    //Una venta puede pertenecer a uno o muchos usuarios
    public function user()
    {
        return $this->belongsTo(User::class);

    }

}
